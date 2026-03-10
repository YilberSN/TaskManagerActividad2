@extends ('layouts.app')
    @section('content')
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Tareas</h1>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Crear tarea</a>
        </div>
        @foreach($tasks as $task)
            <div class="card mb-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">{{ $task->title }}</h5>
                        <span class="badge {{ $task->priority == 'HIGH' ? 'bg-danger' : ($task->priority == 'MEDIUM' ? 'bg-warning' : 'bg-secondary') }}">
                            {{ $task->priority }}
                        </span>
                    </div>
                    <p class="card-text">{{ Str::limit($task->description, 200) }}</p>
                    <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-outline-secondary">View</a>

                    @can('update', $task)
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Edit</a>
                    @endcan

                    @can('delete', $task)
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this task?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    @endcan
                </div>
            </div>
    @endforeach
@endsection