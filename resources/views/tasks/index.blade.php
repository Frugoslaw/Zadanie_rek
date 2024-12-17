@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item active">Tasks</li>
        <li class="breadcrumb-item active">Index</li>
    </ol>
    <div class="row">
        <div class="card">
            <div class="card-header">Lista Tasków</div>
            <div class="card-body">
                <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Dodaj nowe zadanie</a>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nazwa</th>
                            <th>Priorytet</th>
                            <th>Status</th>
                            <th>Termin wykonania</th>
                            <th>Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tasks as $task)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $task->name }}</td>
                                <td>{{ ucfirst($task->priority) }}</td>
                                <td>{{ ucfirst($task->status) }}</td>
                                <td>{{ $task->due_date }}</td>
                                <td>
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edytuj</a>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Usuń</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Brak zadań do wyświetlenia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $tasks->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
