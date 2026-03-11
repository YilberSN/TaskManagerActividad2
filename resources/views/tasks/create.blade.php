@extends ('layouts.app')

@section('content')
    <h1>Crear tarea</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error) 
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Título</label>
            <input name="title" class="form-control" value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Prioridad</label>
            <select class="form-select" aria-label="Priority select" name="priority">
                <option value="LOW" selected>Baja</option>
                <option value="MEDIUM">Media</option>
                <option value="HIGH">Alta</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="description" rows="6" class="form-control">{{ old('description') }}</textarea>
        </div>
        <button class="btn btn-primary">Guardar</button>
    </form>
@endsection