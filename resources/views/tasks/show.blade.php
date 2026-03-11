@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Información de la tarea</h4>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Título</div>
                <div class="col-md-9">{{ $task->title }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Descripción</div>
                <div class="col-md-9">{{ $task->description }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Prioridad</div>
                <div class="col-md-9">
                    <span class="badge {{ $task->priority == 'HIGH' ? 'bg-danger' : ($task->priority == 'MEDIUM' ? 'bg-warning' : 'bg-secondary') }}">
                        {{ $task->priority == 'HIGH' ? 'ALTA' : ($task->priority == 'MEDIA' ? 'bg-warning' : 'BAJA') }}
                    </span>
                </div>
            </div>
        </div>
        <div class="card-footer text-start">
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
</div>
@endsection