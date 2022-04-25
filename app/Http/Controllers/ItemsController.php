<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        //$items = Item::all();
        return view('items/index',[
            'items' => $items
        ]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //methords we use on $request
        $request->validate([
            'name' => 'required',
            'category' => 'required|string',
            'place' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'

        ]);
        
        
        $newImageName = time().'-'. $request-> name.'.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        
        
        $item = Item::create([
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'place' => $request->input('place'),
            'datefound' => $request->input('datefound'),
            'description' => $request->input('description'),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id


        ]);
        // $item = new Item;
        // $item->name = $request->input('name');
        // $item->category = $request->input('category');
        // $item->place = $request->input('place');
        // $item->datefound = $request->input('datefound');
        // $item->description = $request->input('description');
        // $item->save();
        return redirect('/items');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        
        return view('items.edit')->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Item::where('id',$id)
            ->update([    
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'place' => $request->input('place'),
            'datefound' => $request->input('datefound'),
            'description' => $request->input('description')
            ]);
            return redirect('/items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);

        $item->delete();

        return redirect('/items');
    }
}
