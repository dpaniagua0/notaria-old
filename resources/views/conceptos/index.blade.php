@extends('custom')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">

            @include('flash::message')

            <div class="row">
                <h1 class="pull-left">Conceptos</h1>
                <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('conceptos.create') !!}">Add New</a>
            </div>

            <div class="row">
                @if($conceptos->isEmpty())
                <div class="well text-center">No Conceptos found.</div>
                @else
                <table class="table">
                    <thead>
                    <th>Concepto</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>

                    @foreach($conceptos as $concepto)
                    <tr>
                        <td>{!! $concepto->concepto !!}</td>
                        <td>
                            <a href="{!! route('conceptos.edit', [$concepto->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="{!! route('conceptos.delete', [$concepto->id]) !!}" onclick="return confirm('Are you sure wants to delete this Concepto?')"><i class="glyphicon glyphicon-remove"></i></a>
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