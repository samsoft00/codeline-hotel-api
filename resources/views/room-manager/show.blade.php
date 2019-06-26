@extends('layout')


@section('content')

<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Room Details</strong>
                </div>
                <div class="card-body">
                    
                
                    <a class="btn btn-warning" href="{{ route('room-manager.edit', $room->id) }}">Edit Hotel</a>
                
                    <table class="table table-borderless">
                        <tr>
                            <th>Room Name</th>
                            <td>{{ $room->name }}</td>
                        </tr>
                        <tr>
                            <th>Room Capacity</th>
                            <td>{{ $room->capacity->name }}</td>
                        </tr>
                        <tr>
                            <th>Room Type</th>
                            <td>{{ $room->type->type }}</td>
                        </tr>
                        <tr>
                            <th>Room Image</th>
                            <td>
                                <img src="/images/hotel/{{$room->image}}" />
                            </td>
                        </tr>                                                                                                                                                              
                    </table>                    
                    
                </div>
            </div>
        </div>


    </div>
</div><!-- .animated -->    

@endsection