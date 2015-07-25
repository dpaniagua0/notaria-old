<div class="row">
    <!--- Numero Documento Field --->
    <div class="form-group col-sm-6 col-lg-6 col-md-6">
        {!! Form::label('numero_documento', 'Numero Documento:') !!}
        {!! Form::text('numero_documento', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>

    <!--- Fecha Captura Field --->
    <div class="form-group col-sm-6 col-lg-6 col-md-6">
        {!! Form::label('fecha_captura', 'Fecha Captura:') !!}
        {!! Form::text('fecha_captura', null, ['class' => 'form-control date-picker', 'date' => 'date', 'required' => 'required']) !!}
    </div>
</div>
<div class="row">
    <!--- Fecha Llegada Field --->
    <div class="form-group col-sm-6 col-lg-6 col-md-6">
        {!! Form::label('fecha_llegada', 'Fecha Llegada:') !!}
        {!! Form::text('fecha_llegada', null, ['class' => 'form-control date-picker','date' => 'date','required' => 'required']) !!}
    </div>
    <!--- Costo Field --->
    <div class="form-group col-sm-6 col-lg-6 col-md-6">
        {!! Form::label('costo', 'Costo:') !!}
        {!! Form::text('costo', null, ['class' => 'form-control', 'required' => 'required', 'number' => 'number']) !!}
    </div>
</div>
<div class="row">
    <!--- Tipo Documento Field --->
    <div class="form-group col-sm-6 col-lg-6 col-md-6">
        {!! Form::label('tipo_documento', 'Tipo Documento:') !!}


        {!! Form::select('tipo_documento', array('' => 'Seleccionar tipo') + $types, null, ['id' => 'tipo_documento', 'class' => 'form-control chosen-select', 'required' => 'required']) !!}

    </div>
    <!--- User Id Field --->
    <div class="form-group col-sm-6 col-lg-6 col-md-6">
        {!! Form::label('user_id', 'Quien tramita.') !!}

        {!! Form::select('user_id', array('' => 'Seleccionar tramitante') + $users, null, ['id' => 'user_id', 'class' => 'form-control chosen-select', 'required' => 'required']) !!}

    </div>
</div>
<div class="row">

    <!--- Tipo Servicio Field --->
    <div class="form-group col-sm-6 col-lg-6 col-md-6">
        {!! Form::label('tipo_servicio', 'Tipo Servicio:') !!}
        {!! Form::text('tipo_servicio', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>


    <!--- Documento Field --->
    <div class="form-group col-sm-6 col-lg-4 col-md-6">
        {!! Form::label('documento', 'Documento:') !!}
        <input name="documento" type="file" required="required"/>
    </div>
</div>
<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::button('Save', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
</div>

