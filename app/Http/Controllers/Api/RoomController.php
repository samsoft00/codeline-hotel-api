<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;
use phpDocumentor\Reflection\Types\Integer;
use Carbon\Carbon;

class RoomController extends ApiBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function search(Request $request)
    {
        $searchArray = [
            'type'          =>  $request->query('type'),
            'start_date'    =>  Carbon::parse( $request->query('start_date') ),
            'end_date'      =>  Carbon::parse( $request->query('end_date') ),
        ];

        //type, start_date, end_date
        $availableRooms = Room::with(['type', 'capacity', 'hotel'])->where(function($query) use ($searchArray) {
            
            //check for types
            $query->whereHas('type', function($q) use ($searchArray) {
                $q->where('id', $searchArray['type']);
            });

        })->get();

        return $this->respond($availableRooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::with(['type', 'capacity', 'hotel'])->find($id);
        if($room == null){
            return $this->setStatusCode(404)->respond('Resources not found!');
        }
        return $this->respond($room);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
