@extends('custom')

@section('content')

{{ print_r($user->role_id) }}
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">

            @include('common.errors')

            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch', 'class' => 'new-user']) !!}

            @include('users.fields')

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@section('app-js')
<script type="text/javascript">
    $(function(){

        $(".chosen-select").chosen();

        $.validator.setDefaults({ ignore: ":hidden:not(select)" })
        $("form.new-user").validate();

    });
</script>
@endsection