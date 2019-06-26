@extends('layout')


@section('content')

<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Hotel Details</strong>
                </div>
                <div class="card-body">
                    
                    <a class="btn btn-warning" href="{{ route('hotel-manager.edit', $hotel->id) }}">Edit Hotel</a>
                    
                    <table class="table table-borderless">
                        <tr>
                            <th>Name</th>
                            <td>{{ $hotel->name }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $hotel->address }}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{ $hotel->city }}</td>
                        </tr>
                        <tr>
                            <th>State</th>
                            <td>{{ $hotel->state }}</td>
                        </tr>  
                        <tr>
                            <th>Country</th>
                            <td>{{ $hotel->country }}</td>
                        </tr>
                        <tr>
                            <th>Zipcode</th>
                            <td>{{ $hotel->zipcode }}</td>
                        </tr>   
                        <tr>
                            <th>Phone Number</th>
                            <td>{{ $hotel->phone_number }}</td>
                        </tr>
                        <tr>
                            <th>Email Address</th>
                            <td>{{ $hotel->email }}</td>
                        </tr>
                        <tr>
                            <th>Hotel Image</th>
                            <td>
                                <img src="/images/hotel/{{$hotel->image}}" style="max-height:80px" />
                            </td>
                        </tr>                                                                                                                                                              
                    </table>
                </div>
            </div>
        </div>


    </div>
</div><!-- .animated -->    

@endsection