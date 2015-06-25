@extends('custom')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">


            @include('flash::message')

            <div class="row">
                <h1 class="pull-left">Permissions</h1>
                <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('permissions.create') !!}">Add New</a>
            </div>

            <div class="row">
                @if($permissions->isEmpty())
                <div class="well text-center">No Permissions found.</div>
                @else
                <table class="table">
                    <thead>
                    <th>Name</th>
                    <th>Display Name</th>
                    <th>Description</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>

                    @foreach($permissions as $permission)
                    <tr>
                        <td>{!! $permission->name !!}</td>
                        <td>{!! $permission->display_name !!}</td>
                        <td>{!! $permission->description !!}</td>
                        <td>
                            <a href="{!! route('permissions.edit', [$permission->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="{!! route('permissions.delete', [$permission->id]) !!}" onclick="return confirm('Are you sure wants to delete this Permission?')"><i class="glyphicon glyphicon-remove"></i></a>
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