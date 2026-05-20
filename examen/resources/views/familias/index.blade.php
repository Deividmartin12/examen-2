@extends('layouts.admin')

@section('header', 'Lista de Familias')

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('familias.create') }}" class="btn btn-primary">Nueva Familia</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th width="150px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($familias as $familia)
                    <tr>
                        <td>{{ $familia->id }}</td>
                        <td>{{ $familia->name }}</td>
                        <td>{{ $familia->description }}</td>
                        <td>
                            <a href="{{ route('familias.edit', $familia) }}" class="btn btn-sm btn-info">Editar</a>
                            <form action="{{ route('familias.destroy', $familia) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar esta familia?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No hay familias registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@stop
