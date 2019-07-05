<?php

namespace App\Http\Controllers\Api;

use App\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use phpDocumentor\Reflection\Types\Integer;

class RoomController extends ApiBaseController
{

    /**
     * Method to expose room images
     */

     public function display(String $filename){
        $path = public_path('images/hotel') . '/' . $filename;

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::with(['type.cost', 'capacity', 'hotel'])->get();
        return $this->respond($rooms);
    }
 
    public function search(Request $request)
    {
        $request->validate([
            'type'          =>  'required',
            'start_date'    =>  'required',
            'end_date'      =>  'required'
        ]);
        
        $searchArray = [
            'type'          =>  $request->query('type'),
            'start_date'    =>  Carbon::parse( $request->query('start_date') ),
            'end_date'      =>  Carbon::parse( $request->query('end_date') ),
        ];

        //type, start_date, end_date
        $availableRooms = Room::with(['type.cost', 'capacity', 'hotel'])->where(function($query) use ($searchArray) {
            
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
        $room = Room::with(['type', 'type.cost', 'capacity', 'hotel'])->find($id);
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
