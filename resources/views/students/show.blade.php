@extends('layouts.app2')

@section('title', 'Szczegóły ucznia')

@section('content')
<div class="container">

    <h1 class="h1">Szczegóły ucznia</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Imię:</strong> {{ $student->name }}</p>
            <p><strong>Nazwisko:</strong> {{ $student->surname }}</p>
            <p><strong>Klasa:</strong> {{ $student->studentClass->name ?? 'Brak' }}</p>

            <!-- Lista ocen -->
            <h3 class="tyt">Oceny</h3>

            @php
                // Grupowanie ocen według przedmiotów
                $groupedGrades = $student->oceny->groupBy('subject.name');
            @endphp

            <div class="grades-container">
                @forelse ($groupedGrades as $subjectName => $grades)
                    <div class="grade-card">
                        <h4 class="subject-title">{{ $subjectName }}</h4>
                        <ul>
                            @foreach ($grades as $ocena)
                                <li>
                                    <p><strong>Ocena:</strong> {{ $ocena->ocena }}</p>
                                    <p><strong>Nauczyciel:</strong> {{ $ocena->teacher->name ?? 'Brak' }} {{ $ocena->teacher->surname ?? 'Brak' }}</p>
                                    <p><strong>Data dodania:</strong> 
                                        @if ($ocena->created_at)
                                            {{ $ocena->created_at->format('d-m-Y') }}
                                        @else
                                            Brak daty
                                        @endif
                                    </p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @empty
                    <p>Brak ocen dla tego ucznia.</p>
                @endforelse
            </div>
        </div>
    </div>
    <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">Powrót do listy</a>
</div>


@endsection
