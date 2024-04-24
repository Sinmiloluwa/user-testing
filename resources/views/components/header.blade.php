<header class="bg-white-700 py-4">
    <div class="container mx-auto flex justify-between items-center px-6">
        <div class="flex items-center">
            <img src="logo.png" alt="Company Logo" class="h-10 w-auto mr-4">
            <h1 class="text-xl font-bold text-white">Logo</h1>
        </div>
        <nav class="flex items-center">
            <a href="#" class="text-black px-3 hover:text-black">Home</a>
            <a href="#" class="text-black px-3 hover:text-black">Benefits</a>
            <a href="#" class="text-black px-3 hover:text-black">Features</a>
            @auth
                <span class="text-black px-3 hover:text-black">Welcome, {{ Auth::user()->name }}</span>
                <a href="{{ Auth::check() && Auth::user()->user_type == 'designer' ? route('dashboard.index') : route('dashboard.overview') }}" class="bg-white hover:bg-opacity-75 border text-black-700 py-2 px-4 rounded-md">View Dashboard</a>
            @else
                <button id="openModals" class="bg-white hover:bg-opacity-75 border text-black-700 py-2 px-4 rounded-md">Sign Up</button>
                <button id="openModal" class="bg-black hover:bg-opacity-75  text-white py-2 px-4 rounded-md ml-2">Start Testing Now</button>
            @endauth
        </nav>
    </div>
</header>
<hr>