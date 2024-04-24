<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Feedback;
use App\Helpers\Countries;
use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class DashboardController extends Controller
{
    public $url = "https://api.figma.com/v1";

    protected string $clientID;

    protected string $clientSecret;

    protected string $access_token;

    public function __construct()
    {
        // $this->setConstant();
        // $this->checkConstant();
        // $this->setAccessToken();
    }

    protected function setConstant()
    {
        $this->clientSecret = config('services.figma.client_secret');
        $this->clientID = config('services.figma.client_id');
    }

    protected function checkConstant()
    {
        if (empty($this->clientID) || empty($this->clientSecret)) {
            throw new \Exception('Empty Keys');
        }
    }

    protected function setAccessToken(): void
    {
        try {
            $data = Http::post('https://www.figma.com/oauth/token', [
                'client_id' => $this->clientID,
                'client_secret' => $this->clientSecret,
                'redirect_uri' => config('services.redirect'),
                'code' => 'AUTHORIZATION_CODE', // Replace with the actual authorization code
                'grant_type' => 'authorization_code'
            ])->json();

            dd($data);
        } catch(Exception $e) {
            dd($e->getMessage());
        }
    }


    public function index()
    {
        return view('dashboard');
    }

    public function createProject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_name' => 'required|string',
            'country' => 'required',
            'link' => 'required',
            'expiry_date' => 'required|after_or_equal:today',
            'question' => 'required',
            'users' => 'required',
            'instructions' => 'required'
        ]);

        $user = auth()->user();
        $questions = $request->question;

        // Check if validation fails
    if ($validator->fails()) {
        // Return JSON response with validation errors
        return back()->withErrors($validator->messages());
    }

        $project = Project::create([
            'fullname' => $request->fullname,
            'country' => $request->country,
            'project_name' => $request->project_name,
            'link' => $request->link,
            'expiry_date' => $request->expiry_date,
            'embed_code' => $request->link,
            'user_id' => auth()->id(),
            'users' => json_encode($request->users),
            'instructions' => $request->instructions
        ]);

        foreach ($questions as $question) {
            Question::create([
                'question' => $question,
                'user_id' => $user->id,
                'project_id' => $project->id
            ]);
        }

        if (is_null($user->figma_token) || Carbon::now() >= $user->figma_expire_time) {
            session('project_id', $project->id);
            return Socialite::driver('figma')->redirect();
        }

        return redirect()->route('dashboard.index');

    }

    public function overview()
    {
        return view('overview-dashboard');
    }

    public function review(Request $request)
    {
        if (Feedback::where('user_id', Auth::id())->where('project_id', $request->projectId)->exists()) {
            return back()->withErrors(['error' => 'You already reviewed this project']);
        }
        Feedback::create([
            'feeling' => $request->feeling,
            'feature' => $request->feature,
            'search' => $request->search,
            'guidance' => $request->guidance,
            'impression' => $request->impression,
            'feedback' => $request->feedback,
            'user_id' => Auth::id(),
            'project_id' => $request->projectId,
            'rating' => $request->rating,
        ]);

        return redirect('dashboard-overview');
    }

    public function deleteProject(Request $request)
    {
        Project::where('id',$request->project_id)->delete();

        return redirect('dashboard');
    }

    public function viewProject($id)
    {
        $result = [];
        $project = Project::find($id);
        $answers = Answer::with(['user', 'question'])
        ->get()
        ->groupBy(['user_id', 'question_id']);

    
        if ($project->user_id != auth()->id()) {
            abort(403);
        }
        // foreach ($answers as $answer) {
        //     $answer->load('question');
        // }
        return view('projects.show', compact('answers'));
    }

    public function getEmbed(Request $request)
    {
        $protoLink = $request->protoUrl;

        $validator = Validator::make(['url' => $protoLink], [
            'url' => ['required', 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?\?.*starting-point-node-id=\d+/']
        ]);

        if ($validator->fails()) {
            // URL is invalid
            return back()->withErrors(['error' => $validator->messages()]);
        } else {
            return $protoLink;
        }

    }

    public function getRequest($endpoint, $user)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$user->figma_token,
            'Content-type' => 'application/json',
        ])->get($endpoint);

        return $response->json();
    }

    public function postRequest($endpoint, $data)
    {
        $response = Http::withHeaders([
            'Content-type' => 'application/json',
        ])->post($endpoint, $data);

        return $response->json();
    }

    public function viewProto($id)
    {
        $project = Project::where('id', $id)->first();
        $user = User::where('id', $project->user_id)->first();
        $link = $project->embed_code;
        $questions = $project->questions;
        $embedUrl = "https://www.figma.com/embed?embed_host=share&url=" . urlencode($link);
        return view('prototype', compact('embedUrl', 'questions'));
    }

    public function startProto()
    {

        return view('prototype');
    }

    public function getFigmaFile($url, $user)
    {
        $fileId = basename(dirname(parse_url($url, PHP_URL_PATH)));
        $endpoint = $this->url.'/files/'.$fileId;
        dd($this->getRequest($endpoint, $user));
    }

    public function token()
    {
        $url = "https://www.figma.com/oauth?".config('services.figma.client_id');
        $this->getRequest($url, auth()->user());
    }

    public function submitAnswer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'answers' => 'required',
            'rating' => 'required'
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }

        $answers = $request->answers;
        $questionIds = $request->question_ids;

        foreach ($answers as $index => $answer) {
            $questionId = $questionIds[$index]; 

            Answer::create([
                'answer' => $answer,
                'user_id' => Auth::id(),
                'question_id' => $questionId,
                'project_id' => $request->project_id,
                'rating' => $request->rating
            ]);
        }

        return redirect()->route('dashboard.overview');
    }
}
