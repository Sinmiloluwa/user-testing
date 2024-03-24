<div id="myModal" class="hidden fixed z-50 inset-0 overflow-y-auto flex items-center justify-center">
    <div class="flex items-center justify-center min-h-screen">
      <div class="relative bg-white rounded-lg p-4">
        <!-- Close button -->
        <button id="closeModal" class="absolute top-0 right-0 p-2">
          <svg class="h-6 w-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
        <!-- Modal content -->
        <div class="px-16 flex flex-col items-center justify-center">
            <h1 class="text-xl font-bold mb-4">Log in</h1>
            <p class="mb-4">Lorem ipsum dolor sit amet.</p>
            <form action="{{ route('login') }}" method="POST">
                @csrf
            <div class="flex flex-col w-full">
                <select name="user-type" id="user-type" class="border border-black rounded-md px-8 py-2 focus:outline-none focus:border-black mb-4 text-sm text-center">
                    <option value="1" class="text-sm">Which users are you?</option>
                    @foreach($userTypes as $userType)
                    <option value="{{$userType->value}}" class="text-sm">{{$userType->value}}</option>
                    @endforeach
                </select>
                <input type="email" placeholder="Enter your email" class="border border-black rounded-md px-16 py-2 focus:outline-none focus:border-black mb-4 text-center font-light text-sm" name="email">
                <input type="password" placeholder="Enter your password" class="border border-black rounded-md px-16 py-2 focus:outline-none focus:border-black mb-4 text-center font-light text-sm" name="password">
                <button class="bg-black hover:bg-gray-100 text-white py-2 px-16 border border-black rounded-md mb-4 text-center font-light text-sm">Log in</button>
                </form>
                <div class="flex items-center justify-center">
                    <button class="bg-white hover:bg-gray-100 text-black py-2 px-16 border border-black rounded-md flex items-center justify-center space-x-2 mb-2">
                        <img src="Google.png" alt="Logo" class="w-6 h-6"> <!-- Adjust width and height as needed -->
                        <span>Login with Google</span>
                      </button>
                </div>                  
                <p class="py-4 font-light text-sm text-center">Forgot your password?</p>
                <p class="py-2 font-light text-center text-sm">Don't have an account? <a href="#">Signup</a></p>
            </div>
        </div>
        
      </div>
    </div>
</div>