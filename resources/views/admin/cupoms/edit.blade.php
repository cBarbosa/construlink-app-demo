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
        <h2>Pedido: #{{ $order->id }} - R$ {{ $order->total }}</h2>
        <h3>Cliente: #{{ $order->client->user->name }}</h3>
        <h4>Data: #{{ $order->created_at }}</h4>
        <p>
            <strong>Entregar em:</strong><br/>
            {{ $order->client->address }}<br/>
            {{ $order->client->city }}/{{ $order->client->state }}<br/>
            {{ $order->client->zipcode }}
        </p>

        {!! Form::model($order, ['route'=>['admin.cupoms.store', $order->id]]) !!}

        <div class="form-group">
            {!! Form::label('Status', 'Status:') !!}
            {!! Form::select('status', $list_status, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Entregador', 'Entregador:') !!}
            {!! Form::select('user_deliveryman_id', $deliveryman, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@endsection