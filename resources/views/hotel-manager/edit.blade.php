@extends('layout')


@section('content')

<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Edit {{ $hotel->id }} Hotel</strong>
                </div>
                <div class="card-body">

                    <form action="{{ route('hotel-manager.update', $hotel->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label for="hotel-name" class="control-label mb-1">Hotel Name</label>
                            <input id="hotel-name" name="name" type="text" class="form-control valid" value="{{ $hotel->name }}" data-val="true" placeholder="Enter hotel name">
                        </div>

                        <div class="form-group">
                            <label for="hotel-address" class="control-label mb-1">Hotel Address</label>
                            <textarea name="address" id="hotel-address" cols="30" rows="2" class="form-control valid">{{ $hotel->address }}</textarea>
                        </div>  
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="hotel-city" class="control-label mb-1">Hotel City</label>
                                    <input id="hotel-city" name="city" type="text" class="form-control valid" value="{{ $hotel->city }}" data-val="true" placeholder="Enter hotel city">
                                </div>
                                <div class="col-md-6">
                                    <label for="hotel-state" class="control-label mb-1">Hotel State</label>
                                    <input id="hotel-state" name="state" type="text" class="form-control valid" value="{{ $hotel->state }}" data-val="true" placeholder="Enter hotel state">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="hotel-country" class="control-label mb-1">Hotel Country</label>
                                    <input id="hotel-country" name="country" type="text" class="form-control valid" value="{{ $hotel->country }}" data-val="true" placeholder="Enter hotel country">
                                </div>
                                <div class="col-md-6">
                                    <label for="hotel-zipcode" class="control-label mb-1">Hotel Zipcode</label>
                                    <input id="hotel-zipcode" name="zipcode" type="text" class="form-control valid" value="{{ $hotel->zipcode }}" data-val="true" placeholder="Enter hotel zipcode">
                                </div>
                            </div>
                        </div>                         

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="hotel-phone" class="control-label mb-1">Hotel phone number</label>
                                    <input id="hotel-phone" name="phone_number" type="text" class="form-control valid" value="{{ $hotel->phone_number }}" data-val="true" placeholder="Enter hotel phone number">
                                </div>
                                <div class="col-md-6">
                                    <label for="hotel-email" class="control-label mb-1">Hotel email</label>
                                    <input id="hotel-email" name="email" type="text" class="form-control valid" value="{{ $hotel->email }}" data-val="true" placeholder="Enter hotel email">
                                </div>
                            </div>
                        </div>                         

                        <div>
                            <img src="/images/hotel/{{ $hotel->image }}" alt="" style="max-height:200px">
                            <br/>
                        </div>                            
                        
                        <div class="form-group">
                            <label for="hotel-image" class="control-label mb-1">Upload hotel Image</label>
                            <input id="hotel-image" name="image" type="file" class="form-control valid" data-val="true">
                        </div>                        
                    
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Update hotel</button>
                        </div>                        

                    </form>                    
                    
                </div>
            </div>
        </div>


    </div>
</div><!-- .animated -->

@endsection
