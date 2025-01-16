@extends('layouts.app2')

@section('title', 'Edytuj ocenę')

@section('content')
<h1 class="h1">Edytuj ocenę</h1>
<div class="containerr">
    
    <form action="{{ route('oceny.update', $ocena->id) }}" method="POST" class="form">
        @csrf
        @method('PUT')

        <!-- Wybór nauczyciela -->
        <div class="form-group mb-3">
            <label for="teacher_id" class="tyt">Nauczyciel: </label>
            <select name="teacher_id" id="teacher_id" class="form-control @error('teacher_id') is-invalid @enderror" required>
                <option value="" disabled>Wybierz nauczyciela</option>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ old('teacher_id', $ocena->teacher_id) == $teacher->id ? 'selected' : '' }}>
                        {{ $teacher->name }} {{ $teacher->surname }}
                    </option>
                @endforeach
            </select>
            @error('teacher_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Wybór przedmiotu -->
        <div class="form-group mb-3">
            <label for="subject_id" class="tyt">Przedmiot: </label>
            <select name="subject_id" id="subject_id" class="form-control @error('subject_id') is-invalid @enderror" required>
                <option value="" disabled>Wybierz przedmiot</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ old('subject_id', $ocena->subject_id) == $subject->id ? 'selected' : '' }}>
                        {{ $subject->name }}
                    </option>
                @endforeach
            </select>
            @error('subject_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Wybór ucznia -->
        <div class="form-group mb-3">
            <label for="student_id" class="tyt">Uczeń: </label>
            <select name="student_id" id="student_id" class="form-control @error('student_id') is-invalid @enderror" required>
                <option value="" disabled>Wybierz ucznia</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" {{ old('student_id', $ocena->student_id) == $student->id ? 'selected' : '' }}>
                        {{ $student->name }} {{ $student->surname }}
                    </option>
                @endforeach
            </select>
            @error('student_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Ocena -->
        <div class="form-group mb-3">
            <label for="ocena" class="tyt">Ocena: </label>
            <input type="number" name="ocena" id="ocena" class="form-control @error('ocena') is-invalid @enderror" value="{{ old('ocena', $ocena->ocena ?? 2) }}">
            @error('ocena')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Przyciski -->
        <button type="submit" class="btn btn-primary">Zaktualizuj ocenę</button>
        <a href="{{ route('oceny.index') }}" class="btn btn-warning btn-sm">Powrót</a>
    </form>
</div>
@endsection
