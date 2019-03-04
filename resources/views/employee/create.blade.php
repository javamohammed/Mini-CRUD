@extends('layouts.app')

@section('content')
<div class="container">

    {!! Form::open(['route' => 'employee.store']) !!}

        <div class="form-group">
            {!! Form::label('first_name', 'First Name') !!}:
            {!! Form::text('first_name', old('first_name'),['class'=>'form-control', 'placeholder'=>'Enter your first name']) !!}
            @if ($errors->has('first_name'))
                <div class="alert alert-danger">{{$errors->first('first_name')}}</div>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('last_name', 'Last Name') !!}:
            {!! Form::text('last_name', old('last_name'),['class'=>'form-control', 'placeholder'=>'Enter your last name']) !!}
            @if ($errors->has('last_name'))
                <div class="alert alert-danger">{{$errors->first('last_name')}}</div>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('email', 'E-Mail Address') !!}:
            {!! Form::email('email', old('email'),['class'=>'form-control', 'placeholder'=>'Enter email']) !!}
            @if ($errors->has('email'))
                <div class="alert alert-danger">{{$errors->first('email')}}</div>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('phone', 'Phone') !!}:
            {!! Form::text('phone', old('phone'),['class'=>'form-control', 'placeholder'=>'Enter phone']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('id_company', 'Company') !!}:
            {!! Form::select('id_company', $companies,'null',['class'=>'form-control', 'placeholder'=>'select company']) !!}
            @if ($errors->has('id_company'))
                <div class="alert alert-danger">{{$errors->first('id_company')}}</div>
            @endif
        </div>

       <div class="form-group">
            {!! Form::submit('submit',['class'=>'form-control btn btn-primary',]) !!}
        </div>
    {!! Form::close() !!}

</div>
@endsection
