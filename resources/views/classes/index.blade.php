@extends('layouts.app2')

@section('title', 'Lista klas')

@section('content')
<div class="container">
<div class="container-header">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
        <h1>Lista klas</h1>
        
        <form method="GET" action="{{ route('classes.index') }}" class="search-form">
            <div class="input-group">
                <!-- Formularz wyszukiwania -->
                <input type="text" name="search" class="form-control" placeholder="Szukaj po klasie" value="{{ request('search') }}">
                <button class="btn btn-primary-a" type="submit">Szukaj</button>
                @if(auth()->user()->role === 'admin' || auth()->user()->role === 'dyrektor')
                    <a href="{{ route('classes.create') }}" class="dosc">Dodaj nową klasę</a>
                @endif
            </div>
        </form>
        </div>
        
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>L.p.</th>
                <th>Nazwa</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $class)
                <tr>
                    <td>{{ ($classes->currentPage() - 1) * $classes->perPage() + $loop->iteration }}</td>
                    <td>{{ $class->name }}</td>
                    <td>
                        <a href="{{ route('classes.show', $class->id) }}" class="btn btn-primary btn-sm">Szczegóły</a>
                        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'dyrektor')
                            <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-warning btn-sm">Edytuj</a>
                            <form action="{{ route('classes.destroy', $class->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć tę klasę?')">Usuń</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Paginacja -->
    <div class="paginacja">
        {{ $classes->links() }} 
    </div>
    </div>
@endsection
