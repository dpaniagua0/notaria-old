@extends('custom')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">

            @include('common.errors')

            {!! Form::model($concepto, ['route' => ['conceptos.update', $concepto->id], 'method' => 'patch']) !!}

            @include('conceptos.fields')

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
