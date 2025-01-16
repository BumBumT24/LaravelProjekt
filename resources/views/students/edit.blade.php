@extends('layouts.app2')

@section('title', 'Edytuj ucznia')

@section('content')
<h1 class="h1">Edytuj ucznia</h1>
<div class="containerr">
    
    <form action="{{ route('students.update', $student->id) }}" method="POST" class="form">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="name" class="tyt">Imię: </label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $student->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="surname"class="tyt">Nazwisko: </label>
            <input type="text" name="surname" id="surname" class="form-control @error('surname') is-invalid @enderror" value="{{ old('surname', $student->surname) }}" required>
            @error('surname')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="class_id" class="tyt">Klasa: </label>
            <select name="class_id" id="class_id" class="form-control @error('class_id') is-invalid @enderror" required>
                <option value="" disabled>Wybierz klasę</option>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}" {{ old('class_id', $student->class_id) == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                @endforeach
            </select>
            @error('class_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Zaktualizuj ucznia</button>
        <a href="{{ route('students.index') }}" class="btn btn-warning btn-sm">Powrót</a>
    </form>
</div>
@endsection
