@extends('custom')

@section('content')


<div class="row">
	<div class="col-lg-12">
		<div class="wrapper wrapper-content">

			@include('flash::message')

			<div class="row">
				<h1 class="pull-left">Declaranots</h1>
				<a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('declaranots.create') !!}">Add New</a>
			</div>

			<div class="row">
				@if($declaranots->isEmpty())
				<div class="well text-center">No Declaranots found.</div>
				@else
				<table class="table">
					<thead>
					<th>Numero Escritura</th>
					<th>Domicilio Numero</th>
					<th>Colonia</th>
					<th>Municipio Localidad</th>
					<th>Entidad Federativa</th>
					<th>Codigo Postal</th>
					<th>Concepto</th>
					<th>Enajenacion</th>
					<th>Valor Operacion</th>
					<th>Iva Causado</th>
					<th>Isr Causado</th>
					<th>Exento</th>
					<th>Fecha Elaboracion</th>
					<th>Domicilio Numero Adq</th>
					<th>Colonia Adq</th>
					<th>Municipio Adq</th>
					<th>Entidad Adq</th>
					<th>Correo Adq</th>
					<th>Codigo Postal Adq</th>
					<th>Fecha Firma Adq</th>
					<th>Complemento Adq</th>
					<th>Declaranot Adq</th>
					<th>Impuestos Adq</th>
					<th>Facturas Adq</th>
					<th>Isai Adq</th>
					<th width="50px">Action</th>
					</thead>
					<tbody>

					@foreach($declaranots as $declaranot)
					<tr>
						<td>{!! $declaranot->numero_escritura !!}</td>
						<td>{!! $declaranot->domicilio_numero !!}</td>
						<td>{!! $declaranot->colonia !!}</td>
						<td>{!! $declaranot->municipio_localidad !!}</td>
						<td>{!! $declaranot->entidad_federativa !!}</td>
						<td>{!! $declaranot->codigo_postal !!}</td>
						<td>{!! $declaranot->concepto !!}</td>
						<td>{!! $declaranot->enajenacion !!}</td>
						<td>{!! $declaranot->valor_operacion !!}</td>
						<td>{!! $declaranot->iva_causado !!}</td>
						<td>{!! $declaranot->isr_causado !!}</td>
						<td>{!! $declaranot->exento !!}</td>
						<td>{!! $declaranot->fecha_elaboracion !!}</td>
						<td>{!! $declaranot->domicilio_numero_adq !!}</td>
						<td>{!! $declaranot->colonia_adq !!}</td>
						<td>{!! $declaranot->municipio_adq !!}</td>
						<td>{!! $declaranot->entidad_adq !!}</td>
						<td>{!! $declaranot->correo_adq !!}</td>
						<td>{!! $declaranot->codigo_postal_adq !!}</td>
						<td>{!! $declaranot->fecha_firma_adq !!}</td>
						<td>{!! $declaranot->complemento_adq !!}</td>
						<td>{!! $declaranot->declaranot_adq !!}</td>
						<td>{!! $declaranot->impuestos_adq !!}</td>
						<td>{!! $declaranot->facturas_adq !!}</td>
						<td>{!! $declaranot->isai_adq !!}</td>
						<td>
							<a href="{!! route('declaranots.edit', [$declaranot->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
							<a href="{!! route('declaranots.delete', [$declaranot->id]) !!}" onclick="return confirm('Are you sure wants to delete this Declaranot?')"><i class="glyphicon glyphicon-remove"></i></a>
						</td>
					</tr>
					@endforeach
					</tbody>
				</table>
				@endif
			</div>
		</div>
	</div>
</div>

@endsection