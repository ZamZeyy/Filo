@extends('layouts.app')

@section('content')
    <div class='m-auto w-4/8 py-24'>
        <div class='text-center'>
            <h1 class='text-4xl uppercase bold text-white'>
                Upload a new item
            </h1>
        </div>
    </div>
    <div class='flex justify-center'>
        <form action="/items/{{ $item->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class ='block'>
                <input 
                type="text" 
                class='block shadow-5xl mb-3 p-2 w-80 placeholder-gray-400'
                name='name' value="{{ $item->name }}">
                    
                   <div class='uppercase bold text-white mb-3 p-1' >
                     <input type="radio"  name="category" value="phone">
                        <label for="vehicle1"> Phone</label><br>
                     <input type="radio"  name="category" value="pet">
                        <label for="vehicle2"> Pet</label><br>
                        <input type="radio"  name="category" value="others">
                     <label for="vehicle3"> others</label><br> 
                    </div> 

                <input 
                type="text" 
                class='block shadow-5xl mb-10 p-2 w-80 placeholder-gray-400'
                name='place' name='name' value="{{ $item->place }}">

                <input 
                type="text" 
                class='block shadow-5xl mb-10 p-2 w-80 placeholder-gray-400'
                name='datefound' name='name' value="{{ $item->datefound }}">

                <input 
                type="text" 
                class='block shadow-5xl mb-10 p-2 w-80 placeholder-gray-400'
                name='description' name='name' value="{{ $item->description }}">

                <button type='submit' class='bg-gradient-to-r from-red-400 to-indigo-500 hover:from-indigo-500 hover:to-green-500 block shadow 5xl mb-10 w-80 h-10 uppercase font-bold'>
                    <h1 class='text-2xl'>submit</h1>
                </button>
            </div>
        </form>
    </div>

@endsection