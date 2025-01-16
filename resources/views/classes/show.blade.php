@extends('layouts.app2')

@section('title', 'Szczegóły klasy')

@section('content')
<div class="container">
    <h1 class="h1">Szczegóły klasy</h1>
    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Nazwa:</strong> {{ $class->name }}</p>
        </div>
    </div>

    <h2 class="tyt">Lista uczniów</h2>
    @if ($class->students->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Imię</th>
                    <th>Nazwisko</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($class->students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->surname }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Brak uczniów w tej klasie.</p>
    @endif

    <a href="{{ route('classes.index') }}" class="btn btn-primary btn-sm">Powrót do listy klas</a>
</div>
@endsection
