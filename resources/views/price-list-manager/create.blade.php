@extends('layout')


@section('content')

<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Create Price</strong>
                </div>
                <div class="card-body">

                    <form action="{{ route('price-list-manager.store') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="price-list-name" class="control-label mb-1">Price</label>
                            <input id="price-list-name" name="price" type="text" class="form-control valid" value="{{ old('price') }}" data-val="true" placeholder="Enter room type">
                        </div>

                        <div class="form-group">
                            <label for="room-type-id" class="control-label mb-1">Room Type</label>
                            <select name="room_type_id" id="room-type-id" class="form-control">
                                <option value="" selected disabled>Select Room Type</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" @if( old('room_type_id')  == $type->id) selected="selected" @endif>
                                        {{ $type->type }}</option>
                                @endforeach
                            </select>
                        </div>                        
                        
                        <div>
                            <button id="room-button" type="submit" class="btn btn-lg btn-info btn-block">Create New Price</button>
                        </div>                        

                    </form>                    
                    
                </div>
            </div>
        </div>


    </div>
</div><!-- .animated -->

@endsection
