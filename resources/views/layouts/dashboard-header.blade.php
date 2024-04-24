<header class="flex justify-between items-center h-24 shadow-md bg-white border-b border-gray-200 py-6">
    <div>
        <h1 class="text-xl font-bold text-black ml-64 px-16">Welcome back {{Auth::user()->name ?? 'Tester'}}</h1>
        <p class="font-light text-sm ml-64 px-16">Keep and manage your money easier with paywithfish</p>
    </div>
  <div class="flex px-4">
    <img src="{{ asset('Frame 1171276150.png')}}" alt="frame" class="w-8 h-8">
    <img src="{{ asset('Avatar.png')}}" alt="avatar" class="w-8 h-8 ml-2">
    <form method="POST" action="{{ route('logout')}}">
      @csrf
    <button type="submit" href="" class="font-light text-xs pl-2 pt-2">Logout</button>
    </form>
  </div>
</header>