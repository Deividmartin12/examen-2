@extends('adminlte::page')

@section('title', 'Mi Panel')

@section('content_header')
    <h1>@yield('header', 'Dashboard')</h1>
@stop

@section('content')
    @yield('content')
@stop

@section('css')
    @livewireStyles
@stop

@section('js')
    @livewireScripts
@stop