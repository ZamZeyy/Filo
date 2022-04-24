@extends('layouts.app')

@section('content')
    <div class='m-auto w-4/8 py-24'>
        <div class='text-center'>
            <h1 class='text-4xl upercase bold text-white'>
                Claim an item
            </h1>
        </div>
    </div>
    <div class='flex justify-center'>
        <form action="/claims" method="POST" enctype="multipart/form-data">
            @csrf
            <div class ='block'>
                
                <input 
                type="integer" 
                class='block shadow-5xl mb-3 p-2 w-80 placeholder-gray-400'
                name='item_id' placeholder="Item ID.">
                
                <input 
                type="text" 
                class='block shadow-5xl mb-3 p-2 w-80 placeholder-gray-400'
                name='reason' placeholder="Reason/Evidance...">
                
                
                
                

                <button type='submit' class='bg-gradient-to-r from-red-400 to-indigo-500 hover:from-indigo-500 hover:to-green-500 block shadow 5xl mb-10 w-80 h-10 uppercase font-bold'>
                    <h1 class='text-2xl'>submit</h1>
                </button>
            </div>
        </form>
    </div>

@endsection