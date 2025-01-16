@extends('layouts.app2')

@section('title', 'Edytuj przedmiot')

@section('content')
    <h1 class="h1">Edytuj przedmiot: {{ $subject->name }}</h1>

<div class="containerr">

    <form action="{{ route('subjects.update', $subject->id) }}" method="POST" class="formm">
        @csrf
        @method('PUT')

        <!-- Sekcja 1: Edycja nazwy przedmiotu -->
        <div class="form-group">
            <label for="name" class="tyt">Nazwa przedmiotu: </label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $subject->name }}" required>
        </div>

        <!-- Sekcja 2: Usuwanie nauczycieli przypisanych do przedmiotu -->
        <div class="form-group">
            <label for="remove_teachers" class="tyt">Usuń nauczycieli przypisanych do przedmiotu: </label>
            <select name="remove_teachers[]" id="remove_teachers" class="form-control" multiple>
                @foreach ($assignedTeachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }} {{ $teacher->surname }}</option>
                @endforeach
            </select>
        </div>

        <!-- Sekcja 3: Dodawanie nauczycieli, którzy nie uczą tego przedmiotu -->
        <div class="form-group">
            <label for="add_teachers" class="tyt">Dodaj nauczycieli do przedmiotu: </label>
            <select name="add_teachers[]" id="add_teachers" class="form-control" multiple>
                @foreach ($unassignedTeachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }} {{ $teacher->surname }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Zaktualizuj przedmiot</button>
        <a href="{{ route('subjects.index') }}" class="btn btn-warning btn-sm">Powrót</a>

    </form>
@endsection
