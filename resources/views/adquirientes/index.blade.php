@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Adquirientes</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('adquirientes.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($adquirientes->isEmpty())
                <div class="well text-center">No Adquirientes found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Nombre</th>
			<th>Rfc</th>
			<th>Curp</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($adquirientes as $adquiriente)
                        <tr>
                            <td>{!! $adquiriente->nombre !!}</td>
					<td>{!! $adquiriente->rfc !!}</td>
					<td>{!! $adquiriente->curp !!}</td>
                            <td>
                                <a href="{!! route('adquirientes.edit', [$adquiriente->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('adquirientes.delete', [$adquiriente->id]) !!}" onclick="return confirm('Are you sure wants to delete this Adquiriente?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection