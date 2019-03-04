@extends('layouts.app')

@section('content')
<div class="container">

    {!! Form::open([ 'method'=>'put', 'route' => ['company.update', $company->id], 'files'=>true ]) !!}

        <div class="form-group">
            {!! Form::label('email', 'Name') !!}:
            {!! Form::text('name', old('name') == '' ? $company->name : old('name') ,['class'=>'form-control', 'placeholder'=>'Enter name']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'E-Mail Address') !!}:
            {!! Form::email('email', old('email') == '' ? $company->email : old('email'),['class'=>'form-control', 'placeholder'=>'Enter email']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('logo', 'Logo') !!}:
            {!! Form::file('logo',['class'=>'form-control']) !!}
            <img src="{{ $company->logo != ''?  url('http://localhost/Mini-CRM/public/storage/'.$company->logo): 'http://worldartsme.com/images/none-clipart-1.jpg' }}" class="rounded-circle"  width="50" height="50">
        </div>

        <div class="form-group">
            {!! Form::label('website', 'Web Site') !!}:
            {!! Form::text('website', old('website') == '' ? $company->website : old('website'),['class'=>'form-control', 'placeholder'=>'Enter Web Site']) !!}
        </div>

       <div class="form-group">
            {!! Form::submit('submit',['class'=>'form-control btn btn-primary',]) !!}
        </div>
    {!! Form::close() !!}

</div>

@endsection
