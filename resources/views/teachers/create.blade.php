@extends('layouts.app2')

@section('content')
    <h1 class="h1">Dodaj nowego nauczyciela</h1>
    <div class="containerr">
    <form action="{{ route('teachers.store') }}" method="POST" class="form">
        @csrf
        <div class="form-group">
            <label for="name" class="tyt">Imię</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="surname" class="tyt">Nazwisko</label>
            <input type="text" name="surname" id="surname" class="form-control" required>
        </div>

        <!-- Wybór wielu przedmiotów -->
        <div class="form-group">
            <label for="subjects" class="tyt">Przedmioty</label>
            <select name="subjects[]" id="subjects" class="form-control" multiple required>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Dodaj nauczyciela</button>
        <a href="{{ route('teachers.index') }}" class="btn btn-warning btn-sm">Powrót</a>

    </form>
    </div>
@endsection
