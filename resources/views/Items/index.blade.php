@extends('layouts.app')

@section("content")
    <div class='m-auto w-4/5 py-24'>
        <div class='text-center'>
            <h1 class='text-5xl uppercase bold text-white'> 
                Items 
            </h1>
        </div>
        
        @if (Auth::user())
            <div class="pt-10">
                <a 
                    href="items/create"
                    class="border-b-2 pb-2 border-dotted italic text-gray-500">
                    Add a new Item &rarr;
                </a>
                <div class="pt-10">
                    <a 
                        href="claims"
                        class="border-b-2 pb-2 border-dotted italic text-red-500">
                        Claim an item &rarr;
                    </a>
            </div>
            @else
                <p class="py-12 text-white italic">
                    Please login to add a new Item.
                </p>
        @endif
    
        <div class='w-5/6 py-10'>
            @foreach ($items as $item)
            <div class= "m-auto">
                @if (isset(Auth::user()->id) && Auth::user()->id == $item->user_id)
                <div class='float-right'>
                    <a href="items/{{ $item->id }}/edit"
                      class ='border-b-2 pb-2 border-dotted font-bold italic text-green-500'>
                      Edit &rarr;>
                    </a>  
                    <form action="/items/{{ $item->id }}" class="pt-3" method="POST">
                        @csrf
                        @method('delete')
                        <button 
                            type="submit"
                            class="border-b-2 pb-2 border-dotted italic text-red-500">
                                Delete &rarr;
                        </button>
                    </form>
                  </div>
                    @elseif ((isset(Auth::user()->id) && Auth::user()->id == '123'))    
                    <div class='float-right'>
                        <a href="items/{{ $item->id }}/edit"
                          class ='border-b-2 pb-2 border-dotted font-bold italic text-green-500'>
                          Edit &rarr;>
                        </a>  
                        <form action="/items/{{ $item->id }}" class="pt-3" method="POST">
                            @csrf
                            @method('delete')
                            <button 
                                type="submit"
                                class="border-b-2 pb-2 border-dotted italic text-red-500">
                                    Delete &rarr;
                            </button>
                        </form>
                      </div>              
                  
                @endif
               



                  <img 
                  src="{{ asset('images/' . $item->image_path) }}" 
                  class='w-4/12 mb-8 shadow=xl' alt="">
                <span class='uppercase text-blue-300 font-bold text-xs '>
                    place found: {{ $item->place }}
                </span>
                <h2 class='text-indigo-400 text-5xl'>
                    {{ $item->name }}
                </h2>
                <p class='text-lg text-blue-300 py-6'>
                    Category: {{ $item->category}}
                <p class='text-lg text-blue-300 py-6'>
                    Date found: {{ $item->datefound}}
                <p class='text-lg text-blue-300 py-6'>
                   Description: {{ $item->description}}
                <p class='text-lg text-blue-300 py-6'>
                    ItemID: {{ $item->id}}
                
                </p>
                <hr class='mt-4 mb-8'>
            </div>
            @endforeach
        </div>
        <div>
            
        </div>
    </div>
    <div>
        
        {{-- {!! $items->links() !!} --}}
          
    </div>

@endsection