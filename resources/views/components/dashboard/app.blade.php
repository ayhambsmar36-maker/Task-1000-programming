@props([
    'title' => 'لوحة تحكم',
    'header' => config('app.name') ,
    'class' => 'container',

])
@extends('adminlte::page')
@section('title',$title)
@section('content_header')
    <h1 style="padding: 5px; font-size: 30px; margin:5px 20px; color: #0a0a0a">{{$header}}  </h1>
@stop
@section('content')

    <div class="{{ $class }}">
            @if(session()->has('messeage'))
<x-auth-session-status class="mb-4" :status="session('messeage')" />
@endif
        {{ $slot }}
    </div>
@stop
