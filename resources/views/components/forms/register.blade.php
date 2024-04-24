        <!-- Modal content -->
        <x-modals>
            <div class="px-16 flex flex-col items-center justify-center">
                <h1 class="text-xl font-bold mb-4">Register</h1>
                <p class="mb-4">Lorem ipsum dolor sit amet.</p>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                <div class="flex flex-col w-full">
                    <select name="user_type" id="user-type" class="border border-black rounded-md px-8 py-2 focus:outline-none focus:border-black mb-4 text-sm text-center">
                        <option value="1" class="text-sm">Which user are you?</option>
                        @foreach($userTypes as $userType)
                        <option value="{{$userType->value}}" class="text-sm">{{$userType->value}}</option>
                        @endforeach
                    </select>
                    <input type="text" placeholder="Enter your name" class="border border-black rounded-md px-16 py-2 focus:outline-none focus:border-black mb-4 text-center font-light text-sm" name="name">
                    <input type="email" placeholder="Enter your email" class="border border-black rounded-md px-16 py-2 focus:outline-none focus:border-black mb-4 text-center font-light text-sm" name="email">
                    <input type="password" placeholder="Enter your password" class="border border-black rounded-md px-16 py-2 focus:outline-none focus:border-black mb-4 text-center font-light text-sm" name="password">
                    <button class="bg-black hover:bg-gray-100 text-white py-2 px-16 border border-black rounded-md mb-4 text-center font-light text-sm">Sign Up</button>
                    </form>
                    <div class="flex items-center justify-center">
                    <a href="{{ route('google.login') }}" class="bg-white hover:bg-gray-100 text-black py-2 px-16 border border-black rounded-md flex items-center justify-center space-x-2 mb-2">
                            <img src="Google.png" alt="Logo" class="w-6 h-6"> <!-- Adjust width and height as needed -->
                            <span>Login with Google</span>
                        </a>
                    </div>                  
                    <p class="py-2 font-light text-center text-sm">Have an account? <a href="#" id="myModal">Login</a></p>
                </div>
            </div>
            </x-modals>