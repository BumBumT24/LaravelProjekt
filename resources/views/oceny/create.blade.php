@extends('layouts.app2')

@section('content')
<h1 class="h1">Dodaj ocenę</h1>
<div class="containerr">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('oceny.store') }}" method="POST" class="form">
        @csrf
        <div class="form-group">
            <label for="teacher_id" class="tyt">Nauczyciel</label>
            <select name="teacher_id" id="teacher_id" class="form-control">
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }} {{ $teacher->surname }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="subject_id" class="tyt">Przedmiot</label>
            <select name="subject_id" id="subject_id" class="form-control">
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="student_id" class="tyt">Uczeń</label>
            <select name="student_id" id="student_id" class="form-control">
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }} {{ $student->surname }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="ocena" class="tyt">Ocena</label>
            <input type="number" name="ocena" id="ocena" class="form-control" min="1" max="6" required>
        </div>
        <button type="submit" class="btn btn-primary">Dodaj</button>
        <a href="{{ route('oceny.index') }}" class="btn btn-warning btn-sm">Powrót</a>

    </form>
</div>
@endsection
