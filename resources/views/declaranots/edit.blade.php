@extends('custom')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">

            @include('common.errors')

            {!! Form::model($declaranot, ['route' => ['declaranots.update', $declaranot->id], 'method' => 'patch']) !!}

            @include('declaranots.fields')

            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection
