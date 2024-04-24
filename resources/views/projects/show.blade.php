@extends('layouts.app')

@section('content')
<div class="flex h-screen bg-slate-900">
   @include('layouts.dashboard-nav')

  <div class="flex flex-col flex-1">
    <header class="flex justify-between items-center h-24 shadow-md bg-white border-b border-gray-200 py-6">
        <div>
            <h1 class="text-xl font-bold text-black ml-64 px-16">Welcome back {{Auth::user()->name ?? 'Tester'}}</h1>
            <p class="font-light text-sm ml-64 px-16">Keep and manage your money easier with paywithfish</p>
        </div>
      <div class="flex px-4">
        <img src="{{ asset('Frame 1171276150.png')}}" alt="frame" class="w-8 h-8">
        <img src="{{ asset('Avatar.png')}}" alt="avatar" class="w-8 h-8 ml-2">
      </div>
    </header>
    <main class="flex flex-col flex-1 mt-4 ml-64">
      {{-- <div class="flex flex-row justify-between px-16 pt-12">
          <div class="reports">
              <h3 class="text-xl font-bold text-black">Project Reviews</h3>
          </div>
          <div class="filter justify-end">
              <button type="button" class="flex items-center px-3 rounded-md  focus:outline-gray-500 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  <span class="mr-1">Filter</span>
                  <span class="ml-2"><img src="{{ asset('regular-icon.png') }}" alt=""></span>
              </button>
          </div>
      </div> --}}

    
      <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Reviews</h2>
                <p class="mb-8 font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Explore all reviews for this project</p>
            </div> 
            <div class="flex flex-wrap -mx-4">
                @foreach ($answers as $userId => $userAnswers)
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-4">
                        <div class="border rounded-lg p-4">
                            @foreach ($userAnswers as $questionId => $answers)
                                <div class="mt-4 pt-4">
                                    <ul class="mt-2">
                                        @foreach ($answers as $answer)
                                        @php
                                            $userName = $answers[0]->user->name;
                                        @endphp
                                            <li class="mb-2">
                                                <p><strong>Answer:</strong> {{ $answer->answer }}</p>
                                                <p><strong>Question:</strong> {{ $answer->question->question }}</p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                            <div class="border-t mt-4 pt-4">
                                {{$userName}}
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>            
      </section>