@extends('layouts.app2')

@section('title', 'Dodaj ucznia')

@section('content')
<h1 class="h1">Dodaj nowego ucznia</h1>
<div class="containerr">
    
    <form action="{{ route('students.store') }}" method="POST" class="form">
        @csrf
        <div class="form-group ">
            <label for="name" class="tyt">Imię</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label for="surname" class="tyt">Nazwisko</label>
            <input type="text" name="surname" id="surname" class="form-control @error('surname') is-invalid @enderror" value="{{ old('surname') }}" required>
            @error('surname')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label for="class_id" class="tyt">Klasa</label>
            <select name="class_id" id="class_id" class="form-control @error('class_id') is-invalid @enderror" required>
                <option value="" disabled selected>Wybierz klasę</option>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                @endforeach
            </select>
            @error('class_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Dodaj ucznia</button>
        <a href="{{ route('students.index') }}" class="btn btn-warning btn-sm">Powrót</a>
    </form>
</div>
@endsection
