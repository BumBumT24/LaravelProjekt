@extends('layouts.app2')

@section('content')
<div class="container">
<div class="container-header">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <h1>Lista nauczycieli</h1>
    <div class="add-button">
   

    <!-- Formularz wyszukiwania -->
    <div class="input-group">
        <form method="GET" action="{{ route('teachers.index') }}" class="search-form">
            <input type="text" name="search" class="form-control" placeholder="Szukaj po imieniu lub nazwisku" value="{{ request('search') }}">
            <button class="btn btn-primary-a" type="submit">Szukaj</button>
            @if(auth()->user()->role === 'admin' || auth()->user()->role === 'dyrektor')
                <a href="{{ route('teachers.create') }}" class="dosc">Dodaj nauczyciela</a>
            @endif
        </form>
        
    </div>
    </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>L.p.</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
                <tr>
                    <td>{{ ($teachers->currentPage() - 1) * $teachers->perPage() + $loop->iteration }}</td>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->surname }}</td>
                    <td>
                        <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-primary btn-sm">Szczegóły</a>
                        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'dyrektor')
                            <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning btn-sm">Edytuj</a>
                            <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć tego nauczyciela?')">Usuń</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginacja -->
    <div class="paginacja">
        {{ $teachers->links() }} <!-- Wyświetla linki do stron -->
    </div>
    </div>
@endsection
