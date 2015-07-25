<div class="row">
    <!--- Name Field --->
    <div class="form-group col-sm-6 col-lg-6 col-md-6">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>

    <!--- Email Field --->
    <div class="form-group col-sm-6 col-lg-6 col-md-6">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
</div>
<div class="row">
    <!--- Password Field --->
    <div class="form-group col-sm-6 col-lg-6 col-md-6">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', array('class' => 'form-control', 'required' => 'required')) !!}
    </div>
    <!--- Password Field --->
    <div class="form-group col-sm-6 col-lg-6 col-md-6">
        {!! Form::label('confirm_password', 'Confirm Password:') !!}
        {!! Form::password('confirm_password', array('class' => 'form-control', 'required' => 'required', 'equalTo' => '#password')) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6 col-lg-6 col-md-6">
        {!! Form::label('role_id', 'Rol.') !!}

        {!! Form::select('role_id', array('' => 'Seleccionar rol') + $roles, null, ['id' => 'role_id', 'class' => 'form-control chosen-select', 'required' => 'required']) !!}

    </div>
</div>




<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>
