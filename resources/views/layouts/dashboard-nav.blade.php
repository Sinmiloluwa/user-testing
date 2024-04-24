<div class="fixed flex flex-col w-64 h-screen bg-black text-white p-4">
    <a href="#" class="flex items-center mt-4 mb-8">
      <img src="{{ asset('Vector 6.png')}}" class="px-2" alt="vector">
      <span class="text-xl font-bold">Your App</span>
    </a>
    <ul class="flex flex-col space-y-2 mt-4">
      @if(Auth::check() && Auth::user()->user_type == 'user')
      <li class="px-4 py-2 rounded-md hover:bg-gray-700 bg-white text-black">
      
        <a href="{{ route('dashboard.overview') }}" class="flex items-center">
          <img src="{{ asset('Vector 6.png')}}" class="px-2" alt="vector">
          <span class="font-light">Overview</span>
          </a>
      </li>
      @else
      <li class="px-4 py-2 rounded-md hover:bg-gray-700 bg-white text-black active">
        <a href="{{ route('dashboard.index')}}" class="flex items-center">
          <img src="{{ asset('Vector 6.png')}}" class="px-2" alt="vector">
          <span class="font-light">Dashboard</span>
        </a>
      </li>
      @endif
      </ul>
  </div>