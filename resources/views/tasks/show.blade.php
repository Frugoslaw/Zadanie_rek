@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item active">Tasks</li>
        <li class="breadcrumb-item active">Details</li>
    </ol>
    <div class="row">
        <div class="card">
            <div class="card-header">Szczegóły zadania</div>
            <div class="card-body">
                <h5 class="card-title">{{ $task->name }}</h5>
                <p class="card-text"><strong>Opis:</strong> {{ $task->description ?? 'Brak' }}</p>
                <p class="card-text"><strong>Priorytet:</strong> {{ ucfirst($task->priority) }}</p>
                <p class="card-text"><strong>Status:</strong> {{ ucfirst($task->status) }}</p>
                <p class="card-text"><strong>Termin wykonania:</strong> {{ $task->due_date->format('Y-m-d') }}</p>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Powrót</a>
            </div>
        </div>
    </div>
@endsection
