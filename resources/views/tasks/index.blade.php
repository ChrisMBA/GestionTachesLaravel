@extends('layouts.app')

@section('title', 'Tâches')

@section('content')
<div class="row g-4">
    <div class="col-lg-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Ajouter une tâche</h5>

                <form method="POST" action="{{ route('tasks.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Titre</label>
                        <input class="form-control" type="text" name="title" value="{{ old('title') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="4">{{ old('description') }}</textarea>
                    </div>

                    <button class="btn btn-primary w-100" type="submit">Ajouter</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Liste des tâches</h5>

                @if ($tasks->isEmpty())
                    <p class="text-muted mb-0">Aucune tâche pour le moment.</p>
                @else
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Statut</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td>
                                            <div class="fw-semibold">{{ $task->title }}</div>
                                            @if ($task->description)
                                                <div class="text-muted small">{{ $task->description }}</div>
                                            @endif
                                        </td>
                                        <td>
                                            @php
                                                $label = match($task->status) {
                                                    'todo' => 'À faire',
                                                    'doing' => 'En cours',
                                                    'done' => 'Terminée',
                                                    default => $task->status
                                                };
                                                $badge = match($task->status) {
                                                    'todo' => 'secondary',
                                                    'doing' => 'warning',
                                                    'done' => 'success',
                                                    default => 'light'
                                                };
                                            @endphp
                                            <span class="badge text-bg-{{ $badge }}">{{ $label }}</span>
                                        </td>
                                        <td class="text-end">
                                            @if ($task->status !== 'done')
                                                <form method="POST" action="{{ route('tasks.done', $task) }}" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button class="btn btn-sm btn-outline-success" type="submit">Terminer</button>
                                                </form>
                                            @endif

                                            <form method="POST" action="{{ route('tasks.destroy', $task) }}" class="d-inline"
                                                  onsubmit="return confirm('Supprimer cette tâche ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger" type="submit">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
