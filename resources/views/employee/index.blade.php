@extends('layouts.app')

@section('content')

<div class="container">
@include('flash::message')
<a  class="btn btn-primary" href="{{ route('employee.create')}}">{{ trans('messages.add')}}</a>
    <br>

   <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">{{ trans('messages.first_name')}}</th>
      <th scope="col">{{ trans('messages.last_name')}}</th>
      <th scope="col">{{ trans('messages.email')}}</th>
      <th scope="col">{{trans('messages.phone')}}</th>
      <th scope="col">Company</th>
      <th scope="col">Actions</th>
      <th scope="col">#</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($employees as $employee)
        <tr>
        <th scope="row">{{ $employee['id'] }}</th>
        <td>{{ $employee['first_name'] }}</td>
        <td>{{ $employee['last_name'] }}</td>
        <td>{{ $employee['email'] }}</td>
        <td>{{ $employee['phone'] }}</td>
        <td>{{ $employee['company']['name'] }}</td>
        <td>
            <a class="btn btn-info" href="{{Route('employee.show',['id'=>$employee['id']])}}">{{ trans('messages.show')}}</a>

            <a class="btn btn-success" href="{{Route('employee.edit',['id'=>$employee['id']])}}">{{ trans('messages.edit')}}</a>
        </td>
        <td>
             {!! Form::open([ 'method'=>'delete', 'route' => ['employee.destroy', $employee['id']]]) !!}
            <button class="btn btn-danger" href="{{Route('employee.destroy',['id'=>$employee['id']])}}">{{ trans('messages.delete')}}</button>
            {!! Form::close() !!}
        </td>
        </tr>
    @endforeach

  </tbody>
</table>

</div>

@endsection
