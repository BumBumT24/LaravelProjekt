@extends('layouts.app2')

@section('title', 'Edytuj klasę')

@section('content')
    <h1 class="h1">Edytuj klasę</h1>
    <div class="containerr">
    <form action="{{ route('classes.update', $class->id) }}" method="POST" class="form">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="name" class="tyt">Nazwa klasy: </label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $class->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Zaktualizuj klasę</button>
        <a href="{{ route('classes.index') }}" class="btn btn-warning btn-sm">Powrót</a>

    </form>
</div>
@endsection
