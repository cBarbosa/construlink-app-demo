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
        <h3>Editando Cliente: {{$client->user->name}}</h3>

        @include('errors.check')

        {!! Form::model($client, ['route'=>['admin.clients.update', $client->id]]) !!}

        @include('admin.clients._form')

        <div class="form-group">
            {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}

        </div>

        {!! Form::close() !!}

    </div>

@endsection