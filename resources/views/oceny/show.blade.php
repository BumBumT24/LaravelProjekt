@extends('layouts.app2')

@section('content')
<div class="container">
    <h1 class="h1">Szczegóły oceny</h1>
    <p class="tyt"><strong>Nauczyciel:</strong> {{ $ocena->teacher->name }} {{ $ocena->teacher->surname }}</p>
    <p class="tyt"><strong>Przedmiot:</strong> {{ $ocena->subject->name }}</p>
    <p class="tyt"><strong>Uczeń:</strong> {{ $ocena->student->name }} {{ $ocena->student->surname }}</p>
    <p class="tyt"><strong>Ocena:</strong> {{ $ocena->ocena }}</p>

    <a href="{{ route('oceny.index') }}" class="btn btn-primary btn-sm">Powrót</a>
</div>
@endsection
