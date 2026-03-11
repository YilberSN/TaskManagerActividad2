<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Gestor de tareas</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">Gestor de tareas</a>
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('tasks.index') }}">Tareas</a></li>
                    @endauth
                    @role('admin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Usuarios</a></li>
                    @endrole
                </ul>
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrarse</a></li>
                    @else
                        <li class="nav-item">
                            <span class="nav-link">Hola, {{ Auth::user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">Cerrar sesión</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <div class="container py-4">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div> 
            @endif
                
            @yield('content')
        </div>

        <div class="modal fade" id="deleteModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Confirmar eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    ¿Seguro que quieres borrar este registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="button" id="confirmDelete" class="btn btn-danger">
                        Borrar
                    </button>
                </div>
                </div>
            </div>
        </div>

        <script id="delete_script">
            document.addEventListener('DOMContentLoaded', function () {
                let formToSubmit;
                document.querySelectorAll('[data-bs-target="#deleteModal"]').forEach(button => {
                    button.addEventListener('click', function () {
                        formToSubmit = this.closest('form');
                    });
                });
                document.getElementById('confirmDelete').addEventListener('click', function () {
                    formToSubmit.submit();
                });
            });
        </script>

    </body>
</html>