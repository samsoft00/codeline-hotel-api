<?php

namespace App\Http\Controllers\Admin;

use App\Price;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RoomType;

class PriceListManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = Price::with('type')->get();
        return view('price-list-manager.index',compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = RoomType::all();
        return view('price-list-manager.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'price'  =>  'required',
            'room_type_id'      =>  'required|unique:price',
        ]);

        Price::create([
            'price'  =>  $request->input('price'),
            'room_type_id' =>  $request->input('room_type_id'),
        ]);

        return redirect()->route('price-list-manager.index')->with('success','You have successfully add price.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        return view('price-list-manager.show', compact('price'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        $types = RoomType::all();
        return view('price-list-manager.edit', compact(['price', 'types']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
        $request->validate([
            'price'  =>  'required',
            'room_type_id'      =>  'required',
        ]);

        $price->update([
            'price'  =>  $request->input('price'),
            'room_type_id' =>  $request->input('room_type_id'),
        ]);

        return redirect()->route('price-list-manager.index')->with('success','Price updated successfully');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        $price->delete();
        return redirect()->back()->with('success', 'Price has been deleted Successfully');
    }
}
