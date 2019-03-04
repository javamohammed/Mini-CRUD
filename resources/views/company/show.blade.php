@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Name Company: <br>{{ $company->name }}</h5>
    <h6 class="card-subtitle mb-2 text-muted"> <img src="{{ $company->logo != ''?  url('http://localhost/Mini-CRM/public/storage/'.$company->logo): 'http://worldartsme.com/images/none-clipart-1.jpg' }}" class="rounded-circle"  width="50" height="50"></h6>
    <p class="card-text">Email : {{ $company->email }}</p>
    <a href="{{url()->previous() }}" class="btn btn-dark">Back</a>
  <a href="http://{{$company->website}}" class="btn btn-warning">Web Site</a>
  </div>
</div>

</div>

@endsection
