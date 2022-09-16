<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    ようこそ！
                    <?php 
                    $user = Auth::user();
                    ?>
                    <a href="{{ route('tweet.mypage') }}" :active="request()->routeIs('tweet.mypage')">
                    {{$user -> name}}
                    </a>
                    さん
                    
                </div>
                <!--<div class="p-6 bg-white border-b border-gray-200">
                    <a href="https://www.dd-mona.com/horikuti-hidetaka-profile/#toc3">堀口さん</a>
                </div>
                -->
            </div>
        </div>
    </div>
    
      
</x-app-layout>
