@extends('custom')

@section('content')


<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">

            @include('flash::message')

            <div class="row">
                {!!
                Form::open([
                'route' => 'escrituras.index',
                'method' => 'get',
                'class' => 'search-document',
                'role'=> 'search'
                ])
                !!}
                <div class="input-group">
                    <input class="form-control" type="text" name="search" placeholder="{{ trans('global.titlenumber') }}"/>
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">{{ trans('global.search') }}</button>
                        </span>
                </div>
                {!! Form::close() !!}
            </div>

            <div class="row">
                <h1 class="pull-left">Escrituras</h1>
                <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('escrituras.create') !!}">{{ trans('global.add') }}</a>
            </div>

            <div class="row">
                @if($escrituras->isEmpty())
                <div class="well text-center">No Escrituras found.</div>
                @else
                <table class="table">
                    <thead>
                    <th>Numero Escritura</th>
                    <th>Fecha Entrega</th>
                    <th>Fecha Alta</th>
                    <th>Titular</th>
                    <th>Estado</th>
                    <th>Costo</th>
                    <th>Servicio</th>
                    <th>Action</th>
                    </thead>
                    <tbody>

                    @foreach($escrituras as $escritura)
                    <tr>
                        <td>{!! $escritura->numero_escritura !!}</td>
                        <td>{!! $escritura->fecha_entrega !!}</td>
                        <td>{!! $escritura->fecha_alta !!}</td>
                        <td>{!! $escritura->titular !!}</td>
                        <td>{!! $escritura->estado !!}</td>
                        <td>{!! $escritura->costo !!}</td>
                        <td>{!! $escritura->servicio !!}</td>
                        <td>
                            <a href="{!! route('escrituras.edit', [$escritura->id]) !!}"><i class="fa fa-pencil"></i></a>
                            <a href="{!! route('escrituras.delete', [$escritura->id]) !!}" onclick="return confirm('Are you sure wants to delete this Escritura?')"><i class="fa fa-trash-o"></i></a>
                            <a href="{!! route('escrituras.download', [$escritura->id]) !!}"><i class="fa fa-arrow-circle-down"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $escrituras->render() !!}
                @endif
            </div>
        </div>
    </div>
</div>

@endsection