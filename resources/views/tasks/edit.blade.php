@extends ('layouts.app')

@section('content')
    <h1>Editar tarea</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Título</label> 
            <input name="title" class="form-control" value="{{ old('title', $task->title) }}"> </div>

            <div class="mb-3">
                <label class="form-label">Prioridad</label>
                <select class="form-select" aria-label="Priority select" name="priority">
                    <option value="LOW" {{ old('priority', $task->priority) == 'LOW' ? 'selected' : '' }}>Baja</option>
                    <option value="MEDIUM" {{ old('priority', $task->priority) == 'MEDIUM' ? 'selected' : '' }}>Media</option>
                    <option value="HIGH" {{ old('priority', $task->priority) == 'HIGH' ? 'selected' : '' }}>Alta</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="description" rows="6" class="form-control">{{ old('description', $task->description) }}</textarea>
            </div>
        <button class="btn btn-primary">Actualizar</button>
    </form>
@endsection