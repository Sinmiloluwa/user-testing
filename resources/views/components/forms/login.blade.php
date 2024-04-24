        <!-- Modal content -->
        <x-modal>
        <div class="px-16 flex flex-col items-center justify-center">
            <h1 class="text-xl font-bold mb-4">Log in</h1>
            <p class="mb-4">Lorem ipsum dolor sit amet.</p>
            <form action="{{ route('login') }}" method="POST">
                @csrf
            <div class="flex flex-col w-full">
                <input type="email" placeholder="Enter your email" class="border border-black rounded-md px-16 py-2 focus:outline-none focus:border-black mb-4 text-center font-light text-sm" name="email">
                <input type="password" placeholder="Enter your password" class="border border-black rounded-md px-16 py-2 focus:outline-none focus:border-black mb-4 text-center font-light text-sm" name="password">
                <button class="bg-black hover:bg-gray-100 text-white py-2 px-16 border border-black rounded-md mb-4 text-center font-light text-sm">Log in</button>
                </form>
                <div class="flex items-center justify-center">
                <a href="{{ route('google.login') }}" class="bg-white hover:bg-gray-100 text-black py-2 px-16 border border-black rounded-md flex items-center justify-center space-x-2 mb-2">
                        <img src="Google.png" alt="Logo" class="w-6 h-6"> <!-- Adjust width and height as needed -->
                        <span>Login with Google</span>
                    </a>
                </div>                  
                <p class="py-4 font-light text-sm text-center">Forgot your password?</p>
                <p class="py-2 font-light text-center text-sm">Don't have an account? <a href="#">Signup</a></p>
            </div>
        </div>
        </x-modal>