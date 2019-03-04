@extends('layouts.app')

@section('content')
<div class="container">

    {!! Form::open(['route' => 'company.store', 'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name') !!}:
            {!! Form::text('name', old('name'),['class'=>'form-control', 'placeholder'=>'Enter name']) !!}
            @if ($errors->has('name'))
                <div class="alert alert-danger">{{$errors->first('name')}}</div>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('email', 'E-Mail Address') !!}:
            {!! Form::email('email', old('email'),['class'=>'form-control', 'placeholder'=>'Enter email']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('logo', 'Logo') !!}:
            {!! Form::file('logo',['class'=>'form-control']) !!}
            @if ($errors->has('logo'))
                <div class="alert alert-danger">{{$errors->first('logo')}}</div>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('website', 'Web Site') !!}:
            {!! Form::text('website', old('website'),['class'=>'form-control', 'placeholder'=>'Enter Web Site']) !!}
        </div>

       <div class="form-group">
            {!! Form::submit('submit',['class'=>'form-control btn btn-primary',]) !!}
        </div>
    {!! Form::close() !!}

</div>
@endsection
