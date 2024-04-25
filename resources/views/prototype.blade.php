@extends('layouts.app')

@section('content')

<div class="flex h-screen bg-slate-900">
  @include('layouts.dashboard-nav')

  <div class="flex flex-col flex-1">
    <header class="flex justify-between items-center h-24 shadow-md bg-white border-b border-gray-200 py-6">
        <div>
            <h1 class="text-xl font-bold text-black ml-64 px-16">Welcome back Hakim!</h1>
            <p class="font-light text-sm ml-64 px-16">Keep and manage your money easier with paywithfish</p>
        </div>
      <div class="flex px-4">
        <img src="{{ asset('Frame 1171276150.png')}}" alt="frame" class="w-8 h-8">
        <img src="{{ asset('Avatar.png')}}" alt="avatar" class="w-8 h-8 ml-2">
      </div>
    </header>
    <main class="flex flex-col flex-1 mt-4 ml-64">
        @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
            <p class="font-bold">Oops</p>
            @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif
        <div class="flex flex-row justify-between px-16 pt-12">
            <div class="reports">
                <h3 class="text-xl font-bold text-black">Prototype Test</h3>
            </div>
        </div>
        <div class="flex justify-center mt-4 mb-4">
            <iframe style="border: 1px solid rgba(0, 0, 0, 0.1);" width="800" height="450" src="{{$embedUrl}}" allowfullscreen></iframe>
        </div>
        
        <div class="flex flex-row justify-between px-16 pt-12">
            <div class="reports">
                <h3 class="text-xl font-bold text-black">Submit your answers</h3>
            </div>
        </div>
        <div class="px-16 pt-12">
        <form method="POST" action="{{ route('submit.answer')}}" id="questionForm">
            @csrf
            <div class="grid gap-12 mb-6 md:grid-cols-2" id="questionFields">
                @php
                    $urlPath = $_SERVER['REQUEST_URI'];

                    // Extract the number from the URL using string manipulation
                    $number = basename($urlPath);
                @endphp
                <input type="hidden" name="project_id" value="{{$number}}" /> <!-- Hidden input field to store question ID -->
                @foreach($questions as $question)
                @php
                    $project = $question->project;
                @endphp
                <div>
                    <label for="question{{$loop->index}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{$question->question}}</label>
                    <input type="text" id="question{{$loop->index}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Input answer" name="answers[]" required />
                        <input type="hidden" name="question_ids[]" value="{{$question->id}}" /> <!-- Hidden input field to store question ID -->
                </div>
                @endforeach
            </div>
        
            <button type="button" style="background-color: black" class="hover:bg-opacity-75 text-white py-2 px-4 rounded-md ml-2" id="rateId">Continue</button>
            <div id="rateModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
              <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                  <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
            
                <!-- Modal Content -->
                <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                  <button id="closeRateModal" class="close absolute top-0 right-0 p-2">
                    <svg class="h-6 w-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                  <p>Rate this design</p>
                  <div class="mx-auto flex items-center justify-center h-12 w-12">
            
                    <div class="rating text-center">
                      <input type="radio" name="rating" class="mask mask-star" value="1"/>
                      <input type="radio" name="rating" class="mask mask-star" value="2" checked/>
                      <input type="radio" name="rating" class="mask mask-star" value="3"/>
                      <input type="radio" name="rating" class="mask mask-star" value="4"/>
                      <input type="radio" name="rating" class="mask mask-star" value="5"/>
                    </div>
                  </div>
                  <div class="mt-5 sm:mt-6">
                    <button type="submit" id="closeRateModal" style="background-color: black" class="w-full bg-black inline-flex justify-center hover:bg-opacity-75 text-white py-2 px-4 rounded-md ml-2">
                      Submit
                    </button>
                  </div>
                </div>
              </div>
            </div>
        </form>
        </div>
    </main>
</div>

<!-- Modal -->
<div id="myModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>
  
      <!-- Modal Content -->
      <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
        <div>
          <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
            <button id="closeModal" class="close absolute top-0 right-0 p-2">
              <svg class="h-6 w-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
            <!-- Heroicon name: outline/check -->
            <p class="font-bold font-xl">Instructions</p>
            <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
          </div>
          <div class="mt-3 text-center sm:mt-5">
            {!! $project->instructions !!}
        </div>
        <div class="mt-5 sm:mt-6">
          <button type="button" id="closeModal" style="background-color: black" class="w-full bg-black inline-flex justify-center hover:bg-opacity-75 text-white py-2 px-4 rounded-md ml-2">
            Continue
          </button>
        </div>
      </div>
    </div>
  </div>
  
  <script>
      // Check if modal has been shown before
      const modalShown = localStorage.getItem('modalShown');
      console.log(modalShown);
  
      if (!modalShown) {
          // Show the modal if it hasn't been shown before
          document.getElementById('myModal').classList.remove('hidden');
          console.log('ok');
  
          // Close modal and set flag when user clicks continue
          document.getElementById('closeModal').addEventListener('click', function() {
              localStorage.setItem('modalShown', true);
              document.getElementById('myModal').classList.add('hidden');
          });
      }

      // Get the modal
    var modal = document.getElementById("rateModal");
  
  // Get the button that opens the modal
  var btn = document.getElementById("rateId");

  // Get the <span> element that closes the modal
  var span = document.getElementById("closeRateModal");

  // When the user clicks the button, open the modal
  btn.onclick = function() {
    console.log('event');
    modal.classList.remove('hidden');
  };

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
        modal.classList.add('hidden');
        console.log(modal);
  };

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
        if (event.target == modal) {
          modal.classList.add('hidden');
          modal.classList.remove('fixed');
          modalOverlay.classList.add('hidden');
        }
      }
  </script>
  
@endsection

<script>
    window.onload = function() {
    var iframe = document.querySelector('iframe');

    // Add a listener for changes in the URL hash fragment
    iframe.contentWindow.addEventListener('hashchange', function() {
        // Check if the hash fragment ends with the ID of the end node
        var hash = iframe.contentWindow.location.hash;
        var endNodeId = 'END_NODE_ID'; // Replace with the ID of your end node
        if (hash.endsWith(endNodeId)) {
            // User has reached the end node
            console.log('User has reached the end node');
            // You can trigger any desired action here, such as showing a message or navigating to another page
        }
    });
};
</script>
