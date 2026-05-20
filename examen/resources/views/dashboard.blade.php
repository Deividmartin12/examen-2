@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Módulo Administrativo</h1>
@stop

@section('content')
    <p>Bienvenido al de panel de control (Dashboard). Aquí integraremos los CRUDs.</p>
@stop

@section('css')
    {{-- Agrega estilos extra aquí --}}
@stop

@section('js')
    <script> console.log('Dashboard cargado!'); </script>
@stop
