@extends('custom')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">

            @include('common.errors')

            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}

            @include('users.fields')

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
