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
        <h3>Editando Produto: {{$product->name}}</h3>

        @include('errors.check')

        {!! Form::model($product, ['route'=>['admin.products.update', $product->id]]) !!}

        @include('admin.products._form')

        <div class="form-group">
            {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}

        </div>

        {!! Form::close() !!}

    </div>

@endsection