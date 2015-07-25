@extends('custom')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">

            @include('common.errors')

            {!! Form::model($escritura, [
                'route' => ['escrituras.update', $escritura->id],
                'method' => 'patch',
                'files' => true,
                'class' => 'new-title'
            ]) !!}

            @include('escrituras.fields')

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@section('app-js')
<script type="text/javascript">
    $(function(){
        var options = {
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        };
        APP.generateDatePicker(options);

        $(".chosen-select").chosen();

        $.validator.setDefaults({ ignore: ":hidden:not(select)" })
        $("form.new-title").validate();

    });
</script>
@endsection