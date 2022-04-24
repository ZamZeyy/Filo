<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Claim;


class ClaimsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $claims = Claim::all();
    
        return view('claims/index',[
            'claims' => $claims
        ]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('claims.create');
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
            'item_id' => 'required',
            'reason' => 'required',
            

        ]);
        
        
        
        
        
        
        $claim = Claim::create([
            'item_id' => $request->input('item_id'),
            'reason' => $request->input('reason'),
            'user_id' => auth()->user()->id,
            'email' => auth()->user()->email


        ]);
      
        return redirect('/claims');
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
         $claim = Claim::find($id);
        
         return view('claims.edit')->with('claim', $claim);
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
        $claim = Claim::where('id',$id)
            ->update([    
                'item_id' => $request->input('item_id'),
                'reason' => $request->input('reason'),
                'user_id' => auth()->user()->id
            ]);
            return redirect('/claims');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $claim = Claim::find($id);

         $claim->delete();


         return redirect('/claims');
    }
}
