@extends('layouts.app')

@section('content')
<div class="flex h-screen bg-slate-900">
    <div class="fixed flex flex-col w-64 h-screen bg-black text-white p-4">
      <a href="#" class="flex items-center mt-4 mb-8">
        <img src="{{ asset('Vector 6.png')}}" class="px-2" alt="vector">
        <span class="text-xl font-bold">Your App</span>
      </a>
      <ul class="flex flex-col space-y-2 mt-4">
        <li class="px-4 py-2 rounded-md hover:bg-gray-700 bg-white text-black">
          <a href="#" class="text-sm font-light">Dashboard</a>
        </li>
        <li class="px-4 py-2 rounded-md hover:bg-gray-700">
            <a href="#" class="text-sm font-light">Overview</a>
          </li>
          <li class="px-4 py-2 rounded-md hover:bg-gray-700">
            <a href="#" class="text-sm font-light">Post Projects</a>
          </li>
        <li class="px-4 py-2 rounded-md hover:bg-gray-700">
          <a href="#" class="text-sm font-light">Settings</a>
        </li>
        </ul>
    </div>

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
    <main class="flex flex-col items-center justify-center mt-4 ml-64 h-screen">
        <div>
            <img src="{{ asset('Rectangle.png') }}" alt="" class="pl-8">
            <p class="py-8 font-light text-center">No available test at the moment, <br> you can come back later</p>
        </div>
    </main>