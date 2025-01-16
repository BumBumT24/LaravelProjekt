@extends('layouts.app2')

@section('title', 'Dodaj klasę')

@section('content')
    <h1 class="h1">Dodaj nową klasę</h1>
    <div class="containerr">
    <form action="{{ route('classes.store') }}" method="POST" class="form">
        @csrf
        <div class="form-group mb-3">
            <label for="name" class="tyt">Nazwa klasy</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Dodaj klasę</button>
        <a href="{{ route('classes.index') }}" class="btn btn-warning btn-sm">Powrót</a>

    </form>
    </div>
@endsection
