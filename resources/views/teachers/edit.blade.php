@extends('layouts.app2')

@section('title', 'Edytuj nauczyciela')

@section('content')
    <h1 class="h1">Edytuj nauczyciela: {{ $teacher->name }} {{ $teacher->surname }}</h1>
    <div class="containerr">

    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST" class="formm">
        @csrf
        @method('PUT')

        <!-- Sekcja 1: Edycja imienia i nazwiska -->
        <div class="form-group">
            <label for="name" class="tyt">Imię: </label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $teacher->name }}" required>
        </div>

        <div class="form-group">
            <label for="surname" class="tyt">Nazwisko: </label>
            <input type="text" name="surname" id="surname" class="form-control" value="{{ $teacher->surname }}" required>
        </div>

        <!-- Sekcja 2: Usuwanie przedmiotów -->
        <div class="form-group">
            <label for="remove_subjects" class="tyt">Usuń przedmioty, które nauczyciel uczy: </label>
            <select name="remove_subjects[]" id="remove_subjects" class="form-control" multiple>
                @foreach ($assignedSubjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Sekcja 3: Dodawanie nowych przedmiotów -->
        <div class="form-group">
            <label for="add_subjects" class="tyt">Dodaj przedmioty, które nauczyciel może uczyć: </label>
            <select name="add_subjects[]" id="add_subjects" class="form-control" multiple>
                @foreach ($unassignedSubjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Zaktualizuj nauczyciela</button>
        <a href="{{ route('teachers.index') }}" class="btn btn-warning btn-sm">Powrót</a>

    </form>
</div>
@endsection
