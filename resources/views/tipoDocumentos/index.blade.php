@extends('custom')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">

            @include('flash::message')

            <div class="row">
                <h1 class="pull-left">TipoDocumentos</h1>
                <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('tipoDocumentos.create') !!}">Add New</a>
            </div>

            <div class="row">
                @if($tipoDocumentos->isEmpty())
                <div class="well text-center">No TipoDocumentos found.</div>
                @else
                <table class="table">
                    <thead>
                    <th>Tipo</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>

                    @foreach($tipoDocumentos as $tipoDocumento)
                    <tr>
                        <td>{!! $tipoDocumento->tipo !!}</td>
                        <td>
                            <a href="{!! route('tipoDocumentos.edit', [$tipoDocumento->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="{!! route('tipoDocumentos.delete', [$tipoDocumento->id]) !!}" onclick="return confirm('Are you sure wants to delete this TipoDocumento?')"><i class="glyphicon glyphicon-remove"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection