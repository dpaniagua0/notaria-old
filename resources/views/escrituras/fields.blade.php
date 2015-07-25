<div class="row">
    <!--- Numero Escritura Field --->
    <div class="form-group col-sm-6 col-lg-6 col-md-6">
        {!! Form::label('numero_escritura', 'Numero Escritura:') !!}
        {!! Form::text('numero_escritura', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>

    <!--- Fecha Entrega Field --->
    <div class="form-group col-sm-6 col-lg-6 col-md-6">
        {!! Form::label('fecha_entrega', 'Fecha Entrega:') !!}
        {!! Form::text('fecha_entrega', null, ['class' => 'form-control date-picker', 'date' => 'date', 'required' => 'required']) !!}
    </div>
</div>
<div class="row">
    <!--- Fecha Alta Field --->
    <div class="form-group col-sm-6 col-lg-6 col-md-6">
        {!! Form::label('fecha_alta', 'Fecha Alta:') !!}
        {!! Form::text('fecha_alta', null, ['class' => 'form-control date-picker', 'date' => 'date', 'required' => 'required']) !!}
    </div>

    <!--- Titular Field --->
    <div class="form-group col-sm-6 col-lg-6 col-md-6">
        {!! Form::label('titular', 'Titular:') !!}
        {!! Form::text('titular', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
</div>
<div class="row">
    <!--- Estado Field --->
    <div class="form-group col-sm-6 col-lg-6 col-md-6">
        {!! Form::label('estado', 'Estado:') !!}
        {!! Form::text('estado', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>

    <!--- Costo Field --->
    <div class="form-group col-sm-6 col-lg-6 col-md-6">
        {!! Form::label('costo', 'Costo:') !!}
        {!! Form::text('costo', null, ['class' => 'form-control', 'required' => 'required', 'number' => 'number']) !!}
    </div>
</div>

<div class="row">
    <!--- Servicio Field --->
    <div class="form-group col-sm-6 col-lg-6 col-md-6">
        {!! Form::label('servicio', 'Servicio:') !!}
        {!! Form::select('servicio', array('' => 'Tipo de servicio', '1' => 'Ordinario', '2' => 'Urgente', '3' => 'Extra urgente'), null, [ 'class' => 'form-control chosen-select', 'required' => 'required']) !!}
    </div>

    <!--- User Id Field --->
    <div class="form-group col-sm-6 col-lg-6 col-md-6">
        {!! Form::label('user_id', 'Quien tramita:') !!}
        {!! Form::select('user_id', array('' => 'Seleccionar tramitante') + $users, null, ['id' => 'user_id', 'class' => 'form-control chosen-select', 'required' => 'required']) !!}

    </div>
</div>
<div class="row">
    <!--- Documento Field --->
    <div class="form-group col-sm-6 col-lg-4 col-md-6">
        {!! Form::label('escritura', 'Escritura:') !!}
        <input name="escritura" type="file" required="required"/>
    </div>
</div>

<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
