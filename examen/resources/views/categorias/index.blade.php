@extends('layouts.admin')

@section('header', 'Lista de Categorías')

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('categorias.create') }}" class="btn btn-primary">Nueva Categoría</a>
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
                    <th>Logo</th>
                    <th>Nombre</th>
                    <th>Familia</th>
                    <th>Descripción</th>
                    <th width="150px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>
                            @if($categoria->logo)
                                <img src="{{ asset('storage/' . $categoria->logo) }}" alt="Logo" class="img-thumbnail" width="50" height="50" style="object-fit: cover;">
                            @else
                                <span class="text-muted">Sin logo</span>
                            @endif
                        </td>
                        <td>{{ $categoria->name }}</td>
                        <td>{{ $categoria->familia ? $categoria->familia->name : 'N/A' }}</td>
                        <td>{{ $categoria->description }}</td>
                        <td>
                            <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-sm btn-info">Editar</a>
                            <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar esta categoría?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay categorías registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@stop
