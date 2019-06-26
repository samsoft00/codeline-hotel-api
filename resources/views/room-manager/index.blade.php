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
                                <th>Room Name</th>
                                <th>Hotel ID</th>
                                <th>Room Type</th>
                                <th>Room Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rooms as $room)
                                <tr>
                                    <td>{{ $room->id }}</td>
                                    <td>{{ $room->name }}</td>
                                    <td>{{ $room->hotel->id }}</td>
                                    <td>{{ $room->type->type }}</td>
                                    <td style="max-width:100px">
                                        <img src="/images/hotel/{{$room->image}}" style="max-height:80px" />
                                    </td>
                                    <td>
                                        <a href="/admin/room-manager/{{ $room->id }}" class="btn btn-success">View</a> 
                                        <a href="/admin/room-manager/{{ $room->id }}/edit" class="btn btn-warning">Edit</a> 
                                            
                                        <form action="{{ route('room-manager.destroy', $room->id)}}" method="post">
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
