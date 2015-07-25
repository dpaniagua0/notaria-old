@extends('custom')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">
            @include('common.errors')

            {!! Form::open([
                'route' => 'escrituras.store',
                'class' => 'new-title',
                'files' => true,
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
