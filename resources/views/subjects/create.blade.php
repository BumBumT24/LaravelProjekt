@extends('layouts.app2')

@section('content')
    <h1 class="h1">Dodaj nowy przedmiot</h1>
    <div class="containerr">
    <form action="{{ route('subjects.store') }}" method="POST" class="form">
        @csrf
        <div class="form-group">
            <label for="name" class="tyt">Nazwa przedmiotu</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <!-- Wybór wielu nauczycieli -->
        <div class="form-group">
            <label for="teachers" class="tyt">Nauczyciele</label>
            <select name="teachers[]" id="teachers" class="form-control" multiple required>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }} {{ $teacher->surname }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Dodaj przedmiot</button>
        <a href="{{ route('subjects.index') }}" class="btn btn-warning btn-sm">Powrót</a>

    </form>
    </div>
@endsection
