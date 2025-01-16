@extends('layouts.app2')

@section('content')
<div class="container">
    <!-- Kontener dla nagłówka i formularza -->
    <div class="container-header">
        <!-- Nagłówek po lewej -->
        <h1>Lista ocen</h1>
        
        <!-- Przyciski po prawej stronie -->
        <div class="add-button">
            

            <!-- Formularz wyszukiwania obok -->
            <form method="GET" action="{{ route('oceny.index') }}" class="search-form">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Szukaj po nauczycielu, przedmiocie, uczniu lub ocenie" value="{{ request('search') }}">
                    <button class="btn btn-primary-a" type="submit">Szukaj</button>
                    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'nauczyciel' || auth()->user()->role === 'dyrektor')
                    <a href="{{ route('oceny.create') }}" class="dosc">Dodaj ocenę</a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>L.p.</th>
                <th>Uczeń</th>
                <th>Przedmiot</th>
                <th>Nauczyciel</th>
                <th>Ocena</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($oceny as $ocena)
                <tr>
                    <td>{{ ($oceny->currentPage() - 1) * $oceny->perPage() + $loop->iteration }}</td>
                    <td>{{ $ocena->student->name }} {{ $ocena->student->surname }}</td>
                    <td>{{ $ocena->subject->name }}</td>
                    <td>{{ $ocena->teacher->name }} {{ $ocena->teacher->surname }}</td>
                    <td>{{ $ocena->ocena }}</td>
                    <td>
                        <a href="{{ route('oceny.show', $ocena->id) }}" class="btn btn-primary btn-sm">Szczegóły</a>
                        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'nauczyciel' || auth()->user()->role === 'dyrektor')
                            <a href="{{ route('oceny.edit', $ocena->id) }}" class="btn btn-warning btn-sm">Edytuj</a>
                            <form action="{{ route('oceny.destroy', $ocena->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć tę ocenę?')">Usuń</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    


<div class="paginacja">
    {{ $oceny->links() }} <!-- Wyświetla linki do stron -->
</div>
</div>
@endsection
