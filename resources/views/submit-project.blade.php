@extends('layouts.app')

@section('content')
<div class="flex h-screen bg-slate-900">
   @include('layouts.dashboard-nav')

   <div class="flex flex-col flex-1 pb-4">
    <div class="flex flex-col flex-1">
        @include('layouts.dashboard-header')
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
            <p class="font-bold">Oops</p>
            <p>{{$error}}</p>
        </div>
        
        @endforeach
    @endif
<main class="flex flex-col mt-4 ml-64 px-4">
   <form method="POST" action="{{ route('create-project') }}" id="myForm">
    @csrf
        <div class="grid gap-12 mb-6 md:grid-cols-2">
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full name*</label>
                <input type="text" id="first_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="John" name="N" required />
            </div>
            <div>
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project name*</label>
                <input type="text" id="last_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Doe" name="project_name" required />
            </div>
            <div>
                <label for="country"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country*</label>
                    <select id="countries" name="country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a country</option>
                        @php
                            $countriesHelper = new App\Helpers\Countries();
                            $countries = $countriesHelper::$countries;
                            $countryNames = array_values($countries);
                            foreach ($countryNames as $countryName) {
                                @endphp
                                <option value="{{$countryName}}">{{$countryName}}</option>
                                @php
                            }
                            
                        @endphp
                      </select>
            </div>
            <div>
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Project link*</label>
                <input type="url" id="link"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="https://xyz.com" name="link" required />
            </div>
            <div>
                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End Date*</label>
                <input type="date" id="website"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="expiry_date" required />
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="my_select">Select an option <span class="font-xs font-light text-gray-500">(You can select multiple users)</span></label>
                <div class="relative">
                    <select multiple name="users[]" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500" style="display: flex; flex-wrap: wrap;">
                        @php
                            $users = App\Models\User::where('user_type', 'user')->get();
                        @endphp
                        @foreach($users as $user)
                            <option value="{{$user->id}}" style="flex-basis: 25%;">{{$user->name}}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div>
                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instructions</label>
                <script>
                    tinymce.init({
                      selector: 'textarea',
                      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                    });
                  </script>
                  <textarea name="instructions" placeholder="- View each page on the figma modal">

                  </textarea>
            </div>

            <div>
        
            </div>
        </div>
        

    <div class="flex flex-col mt-4">
        <header>
            <p class="font-bold text-2xl">Questions</p>
        </header>
        <div class="grid gap-12 mb-6 md:grid-cols-2 py-4" id="questionFields">
            <!-- Initial question field -->
            <div>
                <label for="Question" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Question*</label>
                <input type="text" id="question_1"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Input question" name="question[]" required />
            </div>
        </div>
    </div>
    <button type="button" id="addQuestionBtn">Add More</button> <!-- Button to add more question fields -->
    <button type="submit" style="background-color: black" class="hover:bg-opacity-75 text-white py-2 px-4 rounded-md ml-2" id="createButton">Submit</button>

    </form>
</main>

</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script>
      new TomSelect('#select-role', {
        maxItems: 3,
      });
    </script>
<script>
   document.getElementById('selectedValues').addEventListener('change', function() {
    var selectedOptions = Array.from(this.selectedOptions).map(option => option.text);
    document.getElementById('selectedValuesDisplay').innerText = selectedOptions.join(', ');
});

</script>
<script>
    document.getElementById('myForm').addEventListener('submit', function(event) {
    var linkInput = document.getElementById('link');
    var linkValue = linkInput.value.trim(); // Trim any leading or trailing spaces
    
    // Check if the URL starts with "https://"
    var hasHttps = linkValue.startsWith("https://");
    
    // Check if the URL contains "figma.com"
    var hasFigmaDomain = linkValue.includes("figma.com");
    
    // Check if the URL contains "starting-point-node-id="
    var hasStartingPointNodeId = linkValue.includes("starting-point-node-id=");
    
    // If any of the checks fail, prevent form submission
    if (!hasHttps || !hasFigmaDomain || !hasStartingPointNodeId) {
        event.preventDefault();
        alert('Please enter a valid Figma URL');
    }
});




</script>


<script>
   const selectElement = document.getElementById("my_select");
const displayDiv = document.getElementById("selected_option");

selectElement.addEventListener("change", function() {
    const selectedValue = this.value;
    const selectedText = this.options[this.selectedIndex].text;
    displayDiv.textContent = `Selected option: ${selectedText}`;
});


</script>

<script>
    document.getElementById("addQuestionBtn").addEventListener("click", function() {
        var questionFieldsContainer = document.getElementById("questionFields");
        var questionCount = questionFieldsContainer.querySelectorAll("div").length;

        var newQuestionField = document.createElement("div");
        newQuestionField.innerHTML = `
            <div>
                <label for="question${questionCount + 1}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Question ${questionCount + 1}</label>
                <input type="url" id="question${questionCount + 1}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Input question" name="answers[]" required />
            </div>
        `;
        questionFieldsContainer.appendChild(newQuestionField);
    });
</script>
@endsection


