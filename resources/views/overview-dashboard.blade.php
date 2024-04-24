@extends('layouts.app')

@section('content')

<div class="flex h-screen bg-slate-900">
  @include('layouts.dashboard-nav')

  <div class="flex flex-col flex-1">
   @include('layouts.dashboard-header')
    <main class="flex flex-col flex-1 mt-4 ml-64">
        <div class="flex flex-row justify-between px-16 pt-12">
            <div class="reports">
                <h3 class="text-xl font-bold text-black">Overview</h3>
            </div>
        </div>
        @php
        $projects = App\Models\Answer::where('user_id', Auth::id())->select('project_id')
                  ->groupBy('project_id')
                  ->get();
        $completed = $projects->count();
      @endphp

        <div class="flex flex-row justify-around px-16 py-12">
            <div class="flex flex-row border border-black rounded-md p-3">
                <div class="flex flex-col">
                    <img src="fluent_person-28-filled.png" alt="" class="w-4 h-4 bg-gray">
                    <h4 class="py-4">Total number of <br> completed reviews</h4>
                </div>
                <div class="relative w-40 h-24 pl-12">
                    <div class="radial-progress" style="--value:{{$completed}};" role="progressbar">{{$completed}}</div>
                  </div>
            </div>

            <div class="flex flex-row border border-black rounded-md p-3">
                <div class="flex flex-col">
                    <img src="fluent_person-28-filled.png" alt="" class="w-4 h-4 bg-gray">
                    <h4 class="py-4">Total number of <br> completed tests</h4>
                </div>
                <div class="relative w-40 h-24 pl-12">
                    <div class="radial-progress text-green-500" style="--value:40;" role="progressbar">40</div>
                  </div>
            </div>

            <div class="flex flex-row border border-black rounded-md p-3">
                <div class="flex flex-col">
                    <img src="fluent_person-28-filled.png" alt="" class="w-4 h-4 bg-green fill-green">
                    <h4 class="py-4">Total number of <br> missed invites</h4>
                </div>
                <div class="relative w-40 h-24 pl-12">
                    <div class="radial-progress text-error" style="--value:5;" role="progressbar">5</div>
                  </div>
            </div>
        </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-8">
        <div class="py-3 border border-gray-400 px-3 rounded-md border-t-1 border-l-1 border-r-1 border-b-0">
            List of Projects
          </div>
        <div class="pb-4 bg-white dark:bg-gray-900 flex justify-between">
          <label for="table-search" class="sr-only">Search</label>
          <div class="relative mt-1">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
              </svg>
            </div>
            <input type="text" id="table-search" class="block pt-3 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
          </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Project
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Project link
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Expires in 
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Action
                  </th>
                </tr>
            </thead>
            <tbody>
                @php
                 $projects = App\Models\Project::where('status', true)
                  ->whereRaw('JSON_CONTAINS(users, ?)', ['"3"'])
                  ->get();
                @endphp
                @foreach($projects as $project)
                <tr class="bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                  <td class="w-4 p-4">
                      <div class="flex items-center">
                          <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                          <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                      </div>
                  </td>
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$project->user->name}}
                  </th>
                  <td class="px-6 py-4">
                    {{$project->project_name}}
                  </td>
                  <td class="px-6 py-4">
                      <a class="text-blue" href="{{$project->link}}">{{$project->link}}</a>
                  </td>
                  <td class="px-6 py-4">
                    @php
                        $expiryDate = \Carbon\Carbon::parse($project->expiry_date);
                        $differenceInDays = ceil(\Carbon\Carbon::now()->diffInDays($expiryDate));
                        if ($differenceInDays > 0) {
                            echo $differenceInDays . ' days';
                        } elseif ($differenceInDays < 0) {
                            echo abs($differenceInDays) . ' days ago';
                        } else {
                            echo 'Today';
                        }
                    @endphp
                </td>
                  <td class="px-4 py-2 bg-green text-green-500">
                    @php
                    $answer = App\Models\Answer::where('user_id', Auth::id())->where('project_id', $project->id)->first();
                    if ($answer) {
                       $status = 'Done';
                    } else {
                      $status = "Pending";
                    }
                  @endphp
                    <span class="px-2 rounded-2xl {{ $status == 'Done' ? 'text-green-400 bg-green-100' : 'bg-red-100 text-red-500' }}">
                        {{ $status }}
                    </span>
                </td>

                <td class="px-4 py-2 bg-green text-green-500">
                  <div class="flex flex-row">
                      @if($status == 'Pending')
                      <a href="{{ route('open-figma', $project->id)}}" class="bg-white text-black font-light text-sm border py-3 rounded-md ml-2 px-6">View</a>
                      @endif
                  </div>
              </td>
              
              </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<script>
  // Get the modal
  const modal = document.getElementById('myModal');
  const modalOverlay = document.getElementById('modalOverlay');

  // Get the button that opens the modal
  const buttons = document.querySelectorAll('.openModalButton');

  buttons.forEach(btn => {
    btn.addEventListener('click', function() {
        const projectId = this.getAttribute('data-project-id');
        modal.classList.remove('hidden');
        console.log(projectId);
        document.getElementById('projectIdInput').value = projectId;
        modalOverlay.classList.remove('hidden');
    });
});

// Close modal when clicking on close button
document.querySelector('.close').addEventListener('click', function() {
    modal.classList.add('hidden');
    modalOverlay.classList.add('hidden');
});

// Close modal when clicking on modal overlay
modalOverlay.addEventListener('click', function() {
    modal.classList.add('hidden');
    modalOverlay.classList.add('hidden');
});
</script>



@endsection