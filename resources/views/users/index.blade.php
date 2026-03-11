@extends ('layouts.app')
    @section('content')
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Lista de usuarios</h1>
            <a href="{{ route('users.create') }}" class="btn btn-primary">Crear usuario</a>
        </div>
        @foreach($users as $user)
            <div class="card mb-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        @foreach ($user->getRoleNames() as $role)
                            <span class="badge bg-primary">{{ ucfirst($role) }}</span>
                        @endforeach
                    </div>
                    <p class="card-text">{{ Str::limit($user->email, 200) }}</p>
                    <a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-outline-secondary">View</a>

                    @role('admin')
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">Edit</a>
                    @endrole

                    @role('admin')
                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-user-id="{{ $user->id }}">
                                Borrar
                            </button>
                        </form>
                    @endrole
                </div>
            </div>
    @endforeach
@endsection