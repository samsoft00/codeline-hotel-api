@extends('layout')


@section('content')

<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Manage Price</strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S/No</th>
                                <th>Price</th>
                                <th>Room Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prices as $price)
                                <tr>
                                    <td>{{ $price->id }}</td>
                                    <td>{{ '$'.$price->price }}</td>
                                    <td>{{ $price->type->type }}</td>
                                    <td>
                                        <a href="{{ route('price-list-manager.edit', $price->id) }}" class="btn btn-warning">Edit</a> 
                                            
                                        <form action="{{ route('price-list-manager.destroy', $price->id)}}" method="post">
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
