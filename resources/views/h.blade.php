@extends('layouts.app')
@section("content")

<div class='m-auto w-4/5 py-24'>
    <div class='text-center'>
        <h1 class='text-5xl uppercase bold text-white'> 
            FiLo 
        </h1>
    </div>
</div>    
 
 <body>
     
   
    <div class='text-center m-auto w-4/5 py-13'>
    
        <h1 class='text-1xl  bold text-white'> 
            Everyday, hundreds and thousands of valuable items are lost from home, trains, and airports
            etc. Many of those lost items are never returned to their owners because it is just very difficult
            to link a lost item to the owner. This is where we step in, FiLo (Find-the-Lost).
            so far we are limited to Only three categories of items: pets, phone and others.
        </h1>
        <div>
            <a href="/items" 
            class = 'text-1xl  bold text-white w-4/5 py-10 text-green-500'>
                Click here to access the Items!
            
             </a>
        </div>
    </div>

    
    
</body>
@endsection