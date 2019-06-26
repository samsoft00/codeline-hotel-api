@extends('layout')


@section('content')

<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Data Table</strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S/No</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Country</th>
                                <th>Zipcode</th>
                                <th>Phone Number</th>
                                <th>Email Address</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hotels as $hotel)
                                <tr>
                                    <td>{{ $hotel->id }}</td>
                                    <td>{{ $hotel->name }}</td>
                                    <td>{{ $hotel->address }}</td>
                                    <td>{{ $hotel->city }}</td>
                                    <td>{{ $hotel->state }}</td>
                                    <td>{{ $hotel->country }}</td>
                                    <td>{{ $hotel->zipcode }}</td>
                                    <td>{{ $hotel->phone_number }}</td>
                                    <td>{{ $hotel->email }}</td>
                                    <td style="max-width:100px">
                                        <img src="/images/hotel/{{$hotel->image}}" style="max-height:80px" />
                                    </td>
                                    <td>
                                        <a href="{{ route('hotel-manager.show', $hotel->id) }}" class="btn btn-success">View</a> 
                                        <a href="{{ route('hotel-manager.edit', $hotel->id) }}" class="btn btn-warning">Edit</a> 
                                            
                                        {{-- <form action="{{ route('hotel-manager.destroy', $hotel->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form> --}}
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
