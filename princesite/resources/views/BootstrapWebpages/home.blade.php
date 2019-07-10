@extends('layouts.app')

@section('title', 'Home Page')



@section('content')
<div class="hero text-center">
    <div class="container">
        <h1 class="display-1">{{ trans('messages.HEAD_TITLE') }}</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <p class="lead">{{ trans('messages.BRIEF_DESC') }}</p>
                <div class="btn btn-primary">{{ trans('messages.BRIEF_DETAIL') }}</div>
            </div>
        </div>
    </div>
</div>
<div class="linux">
    <div class="container-fluid">
        <!-- A fluid container that uses the full width -->
        <div class="row">
            <div class="col-sm-6 linux-title">
                <h2>Linux</h2>
            </div>
            <div class="col-md-6">
                <p>{{ trans('messages.LINUX_INTRO') }}</p>
            </div>
        </div>
    </div>
</div>
<div class="nginx">
    <div class="container">
        
        <div class="row">
            <div class="">
                <h2>Nginx</h2>
            </div>
            <div class="col-md-6">
                <p></p>
            </div>
        </div>
    </div>
</div>
<div class="MySQL">
    <div class="container">
        <div class="row">
            <div class="">
                <h2>MySQL</h2>
            </div>
            <div class="col-md-6">
                <p></p>
            </div>
        </div>
    </div>
</div>
<div class="php">
    <div class="container">
        <div class="row">
            <div class="">
                <h2>PHP</h2>
            </div>
            <div class="col-md-6">
                <p></p>
            </div>
        </div>
    </div>
</div>

@endsection