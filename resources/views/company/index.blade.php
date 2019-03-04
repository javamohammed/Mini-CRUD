@extends('layouts.app')

@section('content')
@push('js')
<script>
    function ConfirmDelete()
        {
        var x = confirm("Are you sure you want to delete?");
        if (x)
            return true;
        else
            return false;
        }
</script>
@endpush
<div class="container">
@include('flash::message')

<a  class="btn btn-primary" href="{{ route('company.create')}}">{{ trans('messages.add')}}</a>
    <br>

   <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
    <th scope="col">{{trans('messages.name')}}</th>
      <th scope="col">{{ trans('messages.email')}}</th>
      <th scope="col">{{ trans('messages.website')}}</th>
      <th scope="col">Logo</th>
      <th scope="col">Actions</th>
      <th scope="col">#</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($companies as $company)
        <tr>
        <th scope="row">{{ $company->id }}</th>
        <td>{{ $company->name }}</td>
        <td>{{ $company->email }}</td>
        <td>{{ $company->website }}</td>
        <td> <img src="{{ $company->logo != ''?  url('http://localhost/Mini-CRM/public/storage/'.$company->logo): 'http://worldartsme.com/images/none-clipart-1.jpg' }}" class="rounded-circle"  width="50" height="50"></td>
        <td>
        <a class="btn btn-info" href="{{Route('company.show',['id'=>$company->id])}}">{{ trans('messages.show')}}</a>

            <a class="btn btn-success" href="{{Route('company.edit',['id'=>$company->id])}}">{{ trans('messages.edit')}}</a>
        </td>
        <td>
             {!! Form::open([ 'method'=>'delete', 'route' => ['company.destroy', $company->id]]) !!}
            <button class="btn btn-danger" href="{{Route('company.destroy',['id'=>$company->id])}}">{{ trans('messages.delete')}}</button>
            {!! Form::close() !!}
        </td>
        </tr>
    @endforeach

  </tbody>
</table>
{{$companies->links()}}
</div>

@endsection
