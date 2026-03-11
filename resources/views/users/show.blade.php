@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Información del usuario</h4>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Nombre</div>
                <div class="col-md-9">{{ $user->name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Email</div>
                <div class="col-md-9">{{ $user->email }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Rol</div>
                <div class="col-md-9">
                    @foreach ($user->getRoleNames() as $role)
                        <span class="badge bg-primary">{{ ucfirst($role) }}</span>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card-footer text-start">
            <a href="{{ route('users.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
</div>
@endsection