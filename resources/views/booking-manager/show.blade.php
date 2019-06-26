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
                    
                    <a class="btn btn-warning" href="{{ route('booking-manager.edit', $booking->id) }}">Edit Hotel</a>
                    
                    <table class="table table-borderless">
                        <tr>
                            <th>Room Name</th>
                            <td>{{ $booking->room->name }}</td>
                            <th>Start Date</th>
                            <td>{{ $booking->date_start }}</td>
                            <th>End Date</th>
                            <td>{{ $booking->date_end }}</td>
                        </tr>
                        <tr>
                            <th>Customer's Name</th>
                            <td>{{ $booking->customer->first_name." ".$booking->customer->last_name }}</td>
                            <th>Customer's Email</th>
                            <td>{{ $booking->customer->email }}</td>
                            <th>Customer's Phone</th>
                            <td>{{ $booking->customer->phone }}</td>
                        </tr>
                        <tr>
                            <th>Room Image</th>
                            <td colspan="3">
                                <img src="/images/hotel/{{$booking->room->image}}" />
                            </td>
                        </tr>                                                                                                                                                              
                    </table>
                </div>
            </div>
        </div>


    </div>
</div><!-- .animated -->    

@endsection