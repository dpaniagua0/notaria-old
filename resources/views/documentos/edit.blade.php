@extends('custom')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">

            @include('common.errors')

            {!! Form::model($documento, [
                'route' => ['documentos.update', $documento->id],
                'method' => 'patch',
                'files' => true,
                'class' => 'new-document'
            ]) !!}

            @include('documentos.fields')

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
        $("form.new-document").validate();

    });
</script>
@endsection