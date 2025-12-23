<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GTLaravel</title>
</head>
<body>
    <h1>Gestion des tâches</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <h2>Ajouter une tâche</h2>
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div>
            <label>Titre</label><br>
            <input type="text" name="title" value="{{ old('title') }}" required>
        </div>
        <div>
            <label>Description</label><br>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>
        <button type="submit">Ajouter</button>
    </form>

    <h2>Liste</h2>
    <ul>
        @foreach ($tasks as $task)
            <li>
                <strong>{{ $task->title }}</strong>
                — {{ $task->status }}

                @if ($task->status !== 'done')
                    <form method="POST" action="{{ route('tasks.done', $task) }}" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit">Terminer</button>
                    </form>
                @endif

                <form method="POST" action="{{ route('tasks.destroy', $task) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
