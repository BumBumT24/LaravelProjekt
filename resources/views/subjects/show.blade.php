@extends('layouts.app2')

@section('title', 'Szczegóły przedmiotu')

@section('content')
<div class="container">

    <h1 class="h1">Szczegóły przedmiotu</h1>

    <div class="card mb-4">
        <div class="card-body">
            <p class="tyt"><strong> {{ $subject->name }}</strong></p>
        </div>
    </div>

    <h2 class="tyt">Nauczyciele</h2>
    @if ($subject->teachers->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Imię </th>
                    <th>Nazwisko</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subject->teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->name}}</td>
                        <td>{{ $teacher->surname}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Brak nauczycieli przypisanych do tego przedmiotu.</p>
    @endif

    <a href="{{ route('subjects.index') }}" class="btn btn-primary btn-sm">Powrót do listy przedmiotów</a>

    </div>


@endsection
