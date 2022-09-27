<!-- resources/views/tweet/index.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Comments') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <table class="text-center w-full border-collapse">
            <thead>
              <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">comment</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($comments as $comment)

              
              <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">

                <h4 class="text-left  text-lg text-grey-dark"><span class="font-bold">{{$comment->user->name}}</span>さんがコメントしました</h4>          

                <div class="flex mt-6 mb-6">
                      <h4 class="text-left  text-lg text-grey-dark">{{$comment->tweet->tweet}}</h4>
                            　>>>　
                      <h3 class="text-left font-bold text-lg text-grey-dark">{{$comment->comment}}</h3>
                </div>

                  
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

