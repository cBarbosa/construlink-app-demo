<?php
/**
 * Created by PhpStorm.
 * User: Charles
 * Date: 20/05/2016
 * Time: 10:48
 */
 ?>
<div class="form-group">
    {!! Form::label('Código', 'Código:') !!}
    {!! Form::text('code', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Valor', 'Valor:') !!}
    {!! Form::text('value', null, ['class'=>'form-control']) !!}
</div>