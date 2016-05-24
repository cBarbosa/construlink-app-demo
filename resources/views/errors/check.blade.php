<?php
/**
 * Created by PhpStorm.
 * User: Charles
 * Date: 20/05/2016
 * Time: 10:52
 */
?>
@if($errors->any())
    <ul class="alert">
        @foreach($errors->all() as $error)
            <li>{{ $error  }}</li>
        @endforeach
    </ul>
@endif
