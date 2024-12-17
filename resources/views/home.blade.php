@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Lista Zadań</h1>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <form action="{{ route('home') }}" method="GET">
                    @csrf
                    <!-- Filtrowanie po priorytecie -->
                    <div class="mb-3">
                        <label for="priority" class="form-label">Priorytet</label>
                        <select name="priority" class="form-select">
                            <option value="">Wybierz priorytet</option>
                            @foreach (\App\Constants\TaskConstants::PRIORITY as $key => $value)
                                <option value="{{ $key }}" {{ request('priority') == $key ? 'selected' : '' }}>
                                    {{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Filtrowanie po statusie -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="">Wybierz status</option>
                            @foreach (\App\Constants\TaskConstants::STATUS as $key => $value)
                                <option value="{{ $key }}" {{ request('status') == $key ? 'selected' : '' }}>
                                    {{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Filtrowanie po dacie od -->
                    <div class="mb-3">
                        <label for="due_date_from" class="form-label">Termin od</label>
                        <input type="date" name="due_date_from" class="form-control"
                            value="{{ request('due_date_from') }}">
                    </div>

                    <!-- Filtrowanie po dacie do -->
                    <div class="mb-3">
                        <label for="due_date_to" class="form-label">Termin do</label>
                        <input type="date" name="due_date_to" class="form-control" value="{{ request('due_date_to') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Filtruj</button>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            @foreach ($tasks as $task)
                <div class="col-md-4 mb-4">
                    <div class="card {{ $task->status == 'done' ? 'bg-light' : '' }}">
                        <h5 class="card-header">{{ $task->name }}</h5>
                        <div class="card-body">
                            <!-- Nazwa zadania -->

                            <!-- Priorytet -->
                            <p class="card-text">
                                <strong>Priorytet:</strong>
                                {{ \App\Constants\TaskConstants::PRIORITY[$task->priority] ?? 'Nieznany' }}
                            </p>


                            <!-- Status -->
                            <p class="card-text">
                                <strong>Status:</strong>
                                {{ ucfirst($task->status) }}
                            </p>

                            <!-- Termin -->
                            <p class="card-text">
                                <strong>Termin:</strong>
                                {{ \Carbon\Carbon::parse($task->due_date)->format('d-m-Y') }}
                            </p>


                            <!-- Przycisk Rozpocznij / Zakończ -->
                            <div class="d-flex justify-content-between">
                                @if ($task->status == 'to-do')
                                    <form action="{{ route('tasks.start', $task->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Rozpocznij</button>
                                    </form>
                                @elseif($task->status == 'in progress')
                                    <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Zakończ</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $tasks->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
