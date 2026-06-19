<<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Student Management System') }}</title>

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand" href="{{ route('dashboard') }}">
                Student Management System
            </a>

            @auth
                <div class="navbar-nav ms-auto">
                   
<a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-bold text-warning' : '' }}"
   href="{{ route('dashboard') }}">
    Dashboard
</a>

                   <a class="nav-link {{ request()->routeIs('students.*') ? 'active fw-bold text-warning' : '' }}"
                      href="{{ route('students.index') }}">
                        Students
                    </a>

                    <a class="nav-link {{ request()->routeIs('batches.*') ? 'active fw-bold text-warning' : '' }}"
                        href="{{ route('batches.index') }}">
                          Batches
                    </a>
                      
                    

                    <a class="nav-link {{ request()->routeIs('students.create') ? 'active fw-bold text-warning' : '' }}"
   href="{{ route('students.create') }}">
    Add Student
</a>

<a class="nav-link {{ request()->routeIs('batches.create') ? 'active fw-bold text-warning' : '' }}"
   href="{{ route('batches.create') }}">
    Add Batch
</a>

                    <form method="POST" action="{{ route('logout') }}" class="ms-3">
                        @csrf


                    <span class="navbar-text text-white me-3">
                        Welcome, {{ Auth::user()->name }}
                    </span>

                        <button type="submit" class="btn btn-danger btn-sm">
                            Logout
                        </button>
                    </form>

                </div>
            @else
                <div class="navbar-nav ms-auto">

                    <a class="nav-link" href="{{ route('login') }}">
                        Login
                    </a>

                    <a class="nav-link" href="{{ route('register') }}">
                        Register
                    </a>

                </div>
            @endauth

        </div>
    </nav>

    <main class="py-4">
        <div class="container">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>