@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item active">Tasks</li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <div class="row">
        <div class="card">
            <div class="card-header">Edytuj zadanie</div>
            <div class="card-body">
                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nazwa zadania</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $task->name }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Opis</label>
                        <textarea id="description" name="description" class="form-control">{{ $task->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="priority" class="form-label">Priorytet</label>
                        <select id="priority" name="priority" class="form-select" required>
                            @foreach ($priorities as $value => $label)
                                <option value="{{ $value }}"
                                    {{ old('priority', $task->priority ?? '') === $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>

                        <label for="priority" class="form-label">Status</label>
                        <select id="status" name="status" class="form-select" required>
                            @foreach ($statuses as $value => $label)
                                <option value="{{ $value }}"
                                    {{ old('status', $task->status ?? '') === $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="due_date" class="form-label">Termin wykonania</label>
                        <input type="date" id="due_date" name="due_date" class="form-control"
                            value="{{ $task->due_date }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Zaktualizuj</button>
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Powrót</a>
                </form>
            </div>
        </div>
    </div>
@endsection
