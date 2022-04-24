@extends('layouts.app')

@section("content")
    <div class='m-auto w-4/5 py-24'>
        <div class='text-center'>
            <h1 class='text-5xl uppercase bold text-white'> 
                Claims 
            </h1>
        </div>
        
        @if (Auth::user())
            <div class="pt-10">
                <a 
                    href="claims/create"
                    class="border-b-2 pb-2 border-dotted italic text-gray-500">
                    Add a new Claim &rarr;
                </a>
            </div>
            @else
                <p class="py-12 text-white italic">
                    Please login to add a new claim.
                </p>
        @endif
    
        <div class='w-5/6 py-10'>
            @foreach ($claims as $claim)
            <div class= "m-auto">
                @if (isset(Auth::user()->id) && Auth::user()->id == $claim->user_id)
                <div class='float-right'>
                    <a href="claims/{{ $claim->id }}/edit"
                      class ='border-b-2 pb-2 border-dotted font-bold italic text-green-500'>
                      Edit &rarr;>
                    </a>  
                    <form action="/claims/{{ $claim->id }}" class="pt-3" method="POST">
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
                        <form action="/claims/{{ $claim->id }}" class="pt-3" method="POST">
                            @csrf
                            @method('delete')
                           {{--  $approve = approved
                            mail((Auth::user()->email,'Claim',$approve))
                             --}}
                            <button 
                                type="submit"
                                class="border-b-2 pb-2 border-dotted italic text-green-500">
                                    Approve &rarr;
                            
                            </button>
                        <form action="/claims/{{ $claim->id }}" class="pt-3" method="POST">
                            @csrf
                            @method('delete')
                            
                            {{-- $deny = 'Your claim has been denied.'; 
                            mail((Auth::user()->email,'Claim',$deny)); --}}
                            
                            <button 
                                type="submit"
                                class="border-b-2 pb-2 border-dotted italic text-red-500">
                                    Deny &rarr;
                            </button>
                        </form>
                      </div>              
                  
                @endif
               



                @if (isset(Auth::user()->id) && Auth::user()->id == $claim->user_id)
                <span class='text-indigo-400 text-5xl '>
                    Item ID: {{ $claim->item_id }}
                </span>
                <p class='text-lg text-blue-300 py-6'>
                   Reason: {{ $claim->reason}}
                
                </p>
                <hr class='mt-4 mb-8'>
                @elseif ((isset(Auth::user()->id) && Auth::user()->id == '123')) 
                <span class='text-indigo-400 text-5xl'>
                    Item ID: {{ $claim->item_id }}
                </span>
                <p class='text-lg text-blue-300 py-6'>
                   Reason: {{ $claim->reason}}
                
                </p>
                <hr class='mt-4 mb-8'>
                @endif
            </div>
            @endforeach
        </div>
        <div>
            
        </div>
    </div>
    <div>
        
       
          
    </div>

@endsection