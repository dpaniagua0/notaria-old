@extends('custom')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">

            @include('flash::message')

            <div class="row">
                {!!
                Form::open([
                'route' => 'documentos.index',
                'method' => 'get',
                'class' => 'search-document',
                'role'=> 'search'
                ])
                !!}
                <div class="input-group">
                    <input class="form-control" type="text" name="search" placeholder="{{ trans('global.documentnumber') }}"/>
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">{{ trans('global.search') }}</button>
                        </span>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="row">
                <h1 class="pull-left">Documentos</h1>
                <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('documentos.create') !!}">
                    {{ trans('global.add') }}
                </a>
            </div>

            <div class="row" class="documents-table">
                @if($documentos->isEmpty())
                <div class="well text-center">No Documentos found.</div>
                @else
                <table class="table table-striped">
                    <thead>
                    <th>Numero Documento</th>
                    <th>Fecha Captura</th>
                    <th>Tipo Documento</th>
                    <th>Fecha Llegada</th>
                    <th>Costo</th>
                    <th>Tipo Servicio</th>
                    <th class="text-center"><i class="fa fa-cogs"></i></th>
                    </thead>
                    <tbody>

                    @foreach($documentos as $documento)
                    <tr>
                        <td>{!! $documento->numero_documento !!}</td>
                        <td>{!! date('F d, Y', strtotime($documento->fecha_captura)) !!}</td>
                        <td>{!! $documento->tipo_documento !!}</td>
                        <td>{!! date('F d, Y', strtotime($documento->fecha_llegada)) !!}</td>
                        <td>$ {!!  number_format($documento->costo,2,'.','') !!}</td>
                        <td>{!! $documento->tipo_servicio !!}</td>
                        <td>
                            <a href="{!! route('documentos.edit', [$documento->id]) !!}"><i class="fa fa-pencil"></i></a>
                            <a href="{!! route('documentos.delete', [$documento->id]) !!}" onclick="return confirm('Are you sure wants to delete this Documento?')"><i class="fa fa-trash-o"></i></a>
                            <a href="{!! route('documentos.download', [$documento->numero_documento]) !!}"><i class="fa fa-arrow-circle-o-down"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $documentos->render() !!}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection