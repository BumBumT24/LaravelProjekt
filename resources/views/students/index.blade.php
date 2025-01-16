@extends('layouts.app2')

@section('content')
<div class="container">
<div class="container-header">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <h1>Lista uczniów</h1>
    <div class="add-button">
        <form method="GET" action="{{ route('students.index') }}" class="search-form">
        
            <!-- Dodanie formularza wyszukiwania -->
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Szukaj po imieniu, nazwisku lub klasie" value="{{ request('search') }}">
                <button class="btn btn-primary-a" type="submit">Szukaj</button>  
                @if(auth()->user()->role === 'admin' || auth()->user()->role === 'dyrektor')
                    <a href="{{ route('students.create') }}" class="dosc">Dodaj ucznia</a>
                @endif     
            </div>
        </form>
    </div>
    </div>

    <table class="table table-bordered">
        <thead class="thead">
            <tr>
                <th>L.p.</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Klasa</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ ($students->currentPage() - 1) * $students->perPage() + $loop->iteration }}</td>
                    <td>{{ $student->name }}</td> <!-- Imię ucznia -->
                    <td>{{ $student->surname }}</td> <!-- Nazwisko ucznia -->
                    <td>{{ $student->studentClass->name ?? 'Brak' }}</td> <!-- Nazwa klasy ucznia -->
                    <td>
                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-primary btn-sm">Szczegóły</a>
                        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'dyrektor')
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edytuj</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć tego ucznia?')">Usuń</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Linki do paginacji -->
    <div class="paginacja">
        {{ $students->links() }} <!-- Wyświetla linki do stron -->
    </div>
    </div>
@endsection
