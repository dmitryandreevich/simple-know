<?php
/**
 * Created by PhpStorm.
 * User: Dmitry Andreevich
 * Date: 09.07.2018
 * Time: 15:22
 */
?>
@if( count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            <div><strong>{{ $error }}</strong></div>
        @endforeach
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        <strong>{{ session('error') }}</strong>
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success">
        <div><strong>{{ session('success') }}</strong></div>
    </div>
@endif
