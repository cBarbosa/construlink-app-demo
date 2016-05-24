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
        <h3>Novo cliente</h3>

        @include('errors.check')

        {!! Form::open(['route'=>'admin.clients.store', 'class'=>'form']) !!}

        @include('admin.clients._form')

        <div class="form-group">
            {!! Form::submit('Criar cliente', ['class'=>'btn btn-primary']) !!}

        </div>

        {!! Form::close() !!}

    </div>

@endsection