@extends('custom')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">


            @include('common.errors')

            {!! Form::open(['route' => 'conceptos.store']) !!}

            @include('conceptos.fields')

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
