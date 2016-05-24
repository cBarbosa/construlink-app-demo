<?php
/**
 * Created by PhpStorm.
 * User: Charles
 * Date: 18/05/2016
 * Time: 18:46
 */
 ?>
@extends('layouts.app')

@section('content')

    <div class="container">
        <h3>Nova Categoria</h3>

        @include('errors.check')

        {!! Form::open(['route'=>'admin.categories.store', 'class'=>'form']) !!}

        @include('admin.categories._form')

        <div class="form-group">
            {!! Form::submit('Criar categoria', ['class'=>'btn btn-primary']) !!}

        </div>

        {!! Form::close() !!}

    </div>

@endsection