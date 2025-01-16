@extends('layouts.app2')

@section('content')
<div class="container">
    <h1 class="h1">Szczegóły nauczyciela</h1>
    <div class="card">
        <div class="card-body">
            <p class="tyt"><strong>Imię i nazwisko:</strong> {{ $teacher->name }}  {{ $teacher->surname }}</p>
            

            <h3 class="tyt">Przedmioty:</h3>
            <table class="table">
            <thead>
                <tr>
                    <th>Nazwy Przedmiotów</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teacher->subjects as $subject)
                    <tr>
                        <td>{{ $subject->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

            <a href="{{ route('teachers.index') }}" class="btn btn-primary btn-sm">Powrót do listy</a>
        </div>
    </div>
@endsection
