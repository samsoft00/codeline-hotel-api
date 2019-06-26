@extends('layout')


@section('content')

<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Edit {{ $roomType->type }}</strong>
                </div>
                <div class="card-body">

                    <form action="{{ route('room-type-manager.update', $roomType->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="room-type-name" class="control-label mb-1">Room Type</label>
                            <input id="room-type-name" name="type" type="text" class="form-control valid" value="{{ $roomType->type }}" data-val="true" placeholder="Enter room type">
                        </div>
                        
                        <div>
                            <button id="room-button" type="submit" class="btn btn-lg btn-info btn-block">Edit Room Type</button>
                        </div>                        

                    </form>                    
                    
                </div>
            </div>
        </div>


    </div>
</div><!-- .animated -->

@endsection
