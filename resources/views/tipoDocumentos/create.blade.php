@extends('custom')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">

            @include('common.errors')

            {!! Form::open(['route' => 'tipoDocumentos.store']) !!}

            @include('tipoDocumentos.fields')

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
