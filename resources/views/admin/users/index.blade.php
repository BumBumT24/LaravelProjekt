@extends('layouts.app2')

@section('content')
<div class="container">
<div class="container-header">
    <h1>Lista użytkowników</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="add-button">
    <form method="GET" action="{{ route('admin.users.index') }}" class="search-form">
        <div class="row">
            <div class="input-group">
                <select name="role" class="form-control" onchange="this.form.submit()">
                    <option value="">Wszystkie</option>
                    <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="nauczyciel" {{ request('role') === 'nauczyciel' ? 'selected' : '' }}>Nauczyciel</option>
                    <option value="user" {{ request('role') === 'user' ? 'selected' : '' }}>User</option>
                </select>
                <input type="text" name="search" class="form-control" placeholder="Szukaj po imieniu lub e-mailu" value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Szukaj</button>
            </div>
        </div>
    </form>
    </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>L.p.</th>
                <th>Imię</th>
                <th>Email</th>
                <th>Rola</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-sm">Edytuj</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="paginacja">
        {{ $users->links() }} <!-- Wyświetla linki do stron -->
    </div>
</div>
@endsection
