@extends('layout')


@section('content')

<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Room Type</strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S/No</th>
                                <th>Room Name</th>
                                <th>Customer's Name</th>
                                <th>Customer's Email</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Total Night</th>
                                <th>Total Price</th>
                                <th>Booking Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->room->name }}</td>
                                    <td>{{ $booking->customer->first_name." ".$booking->customer->last_name }}</td>
                                    <td>{{ $booking->customer->email }}</td>
                                    <td>{{ $booking->date_start }}</td>
                                    <td>{{ $booking->date_end }}</td>
                                    <td>{{ $booking->total_night }}</td>
                                    <td>{{ '$'.$booking->total_price }}</td>
                                    <td>{{ $booking->created_at }}</td>
                                    <td>
                                        <a href="{{ route('booking-manager.show', $booking->id) }}" class="btn btn-success">View</a> 
                                        <a href="{{ route('booking-manager.edit', $booking->id) }}" class="btn btn-warning">Edit</a> 
                                            
                                        <form action="{{ route('booking-manager.destroy', $booking->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div><!-- .animated -->

@endsection
