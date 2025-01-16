@extends('layouts.app2')

@section('title', 'Lista przedmiotów')

@section('content')
<div class="container">
<div class="container-header">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <h1>Lista przedmiotów</h1>
        
        <div class="add-button">
        
        
        <!-- Formularz wyszukiwania -->
        <form method="GET" action="{{ route('subjects.index') }}" class="search-form">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Szukaj po nazwie przedmiotu" value="{{ request('search') }}">
                <button class="btn btn-primary-a" type="submit">Szukaj</button>
                @if(auth()->user()->role === 'admin' || auth()->user()->role === 'dyrektor')
                    <a href="{{ route('subjects.create') }}" class="btn btn-primary">Dodaj nowy przedmiot</a>
                @endif
            </div>
        </form>
    </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>L.p.</th> 
                <th>Nazwa przedmiotu</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
                <tr>
                    <td>{{ ($subjects->currentPage() - 1) * $subjects->perPage() + $loop->iteration }}</td>
                    <td>{{ $subject->name }}</td>
                    <td>
                        <a href="{{ route('subjects.show', $subject->id) }}" class="btn btn-primary btn-sm">Szczegóły</a>
                        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'dyrektor')
                            <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-warning btn-sm">Edytuj</a>
                            <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć ten przedmiot?')">Usuń</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginacja -->
    <div class="paginacja">
        {{ $subjects->links() }} <!-- Wyświetla linki do stron -->
    </div>
    </div>
@endsection
