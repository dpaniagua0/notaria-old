@extends('custom')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">

            @include('common.errors')

            {!! Form::model($tipoDocumento, ['route' => ['tipoDocumentos.update', $tipoDocumento->id], 'method' => 'patch']) !!}

            @include('tipoDocumentos.fields')

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
