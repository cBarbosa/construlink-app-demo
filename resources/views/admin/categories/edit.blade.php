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
        <h3>Editando Categoria: {{$category->name}}</h3>

        @include('errors.check')

        {!! Form::model($category, ['route'=>['admin.categories.update', $category->id]]) !!}

        @include('admin.categories._form')

        <div class="form-group">
            {!! Form::submit('Salvar categoria', ['class'=>'btn btn-primary']) !!}

        </div>

        {!! Form::close() !!}

    </div>

@endsection