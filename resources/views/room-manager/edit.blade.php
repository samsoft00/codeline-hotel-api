@extends('layout')


@section('content')

<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Edit {{ $room->name }} Room</strong>
                </div>
                <div class="card-body">

                    <form action="{{ route('room-manager.update', $room->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                                <label for="room-name" class="control-label mb-1">Room Name</label>
                                <input id="room-name" name="name" type="text" class="form-control valid" value="{{ $room->name }}" data-val="true" placeholder="Enter room name">
                            </div>
                            <div class="form-group">
                                <label for="hotel-id" class="control-label mb-1">Select Hotel</label>
                                <select name="hotel_id" id="hotel-id" class="form-control">
                                    <option value="" selected>Select Hotel</option>
                                    @foreach ($hotels as $hotel)
                                        <option value="{{ $hotel->id }}" @if($hotel->id == $room->hotel->id) selected="selected" @endif>
                                            {{ $hotel->name }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <div class="form-group">
                                <label for="room-type" class="control-label mb-1">Room Type</label>
                                <select name="room_type_id" id="room-type" class="form-control">
                                    <option value="" selected>Select Roomt Type</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}" @if($type->id == $room->type->id) selected="selected" @endif>
                                            {{ $type->type }}</option>
                                    @endforeach
                                </select>                            
                            </div>  
                            
                            <div class="form-group">
                                <label for="room-type" class="control-label mb-1">Room Capacity</label>
                                <select name="room_capacity_id" id="room-capacity" class="form-control">
                                    <option value="" selected>Select Room Capacity</option>
                                    @foreach ($capacity as $cap)
                                        <option value="{{ $cap->id }}" @if($cap->id == $room->capacity->id) selected="selected" @endif>
                                            {{ $cap->name }}</option>
                                    @endforeach
                                </select>                            
                            </div> 

                            <div>
                                <img src="/images/hotel/{{ $room->image }}" alt="" style="max-height:200px">
                                <br/>
                            </div>                            
                            
                            <div class="form-group">
                                <label for="room-image" class="control-label mb-1">Upload Room Image</label>
                                <input id="room-image" name="image" type="file" class="form-control valid" data-val="true">
                            </div>                        
                        
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Add Room</button>
                        </div>                        

                    </form>                    
                    
                </div>
            </div>
        </div>


    </div>
</div><!-- .animated -->

@endsection
