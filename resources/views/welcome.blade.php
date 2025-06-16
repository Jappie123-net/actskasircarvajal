<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>john airol management</title>

    <!-- Bootstrap CSS (for styling) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
    @if(Auth::check())
    <div class="mb-3 text-end">
        <span class="me-2">Hello, {{ Auth::user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-sm btn-outline-secondary">Logout</button>
        </form>
    </div>
@endif
<div class="container">
    <h1 class="mb-4">Student List</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Student Table -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Fullname</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($stud as $student)
            <tr>
                <form method="POST" action="{{ route('std.update', $student->id) }}">
                    @csrf
                    <td><input type="text" name="fullname" class="form-control" value="{{ $student->fullname }}" required></td>
                    <td><input type="number" name="age" class="form-control" value="{{ $student->age }}" required></td>
                    <td><input type="text" name="gender" class="form-control" value="{{ $student->gender }}" required></td>
                    <td><input type="text" name="address" class="form-control" value="{{ $student->address }}" required></td>
                    <td>
                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        <a href="{{ route('std.delete', $student->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </form>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Add New Student Form -->
    <div class="card mt-5">
        <div class="card-header bg-success text-white">Add New Student</div>
        <div class="card-body">
            <form method="POST" action="{{ route('std.createNew') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Fullname</label>
                    <input type="text" class="form-control" name="fullname" value="{{ old('fullname') }}">
                    @error('fullname') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Age</label>
                    <input type="number" class="form-control" name="age" value="{{ old('age') }}">
                    @error('age') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <input type="text" class="form-control" name="gender" value="{{ old('gender') }}">
                    @error('gender') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                    @error('address') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-success">Add Student</button>
            </form>
        </div>
    </div>
</div>
    

</body>
</html>
