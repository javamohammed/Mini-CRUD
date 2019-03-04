@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">First Name: {{ $employee->first_name }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">Last Name: {{ $employee->last_name }} </h6>
    <p class="card-text">Email : {{ $employee->email }}</p>
    <p class="card-text">Phone : {{ $employee->phone }}</p>
    <p class="card-text">Company : {{ $employee->company['name'] }}</p>
    <a href="{{url()->previous() }}" class="btn btn-dark">Back</a>
  </div>
</div>

</div>

@endsection
