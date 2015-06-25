@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($adquiriente, ['route' => ['adquirientes.update', $adquiriente->id], 'method' => 'patch']) !!}

        @include('adquirientes.fields')

    {!! Form::close() !!}
</div>
@endsection
