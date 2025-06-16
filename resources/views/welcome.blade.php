<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <ul> list of students
        @foreach ($stud as $students)
            <li>{{$students->fullname}} - {{$students->age}} - {{$students->address}} - {{$students->gender}}</li>
        @endforeach

        
    </ul>
    

     <form method="POST" action="{{ route('std.createNew') }}">
        @csrf
        <h2>add students</h2>
        <div>
          <label>fullname</label>
          <input type="text" id="fullname" name="fullname" value="{{ old('fullname') }}">
          @error('fullname')
          <span class="text-danger">{{ $message }}</span>
          @enderror          
        </div>
        <div>
          <label>age</label>
          <input type="number" id="age" name="age" value="{{ old('age') }}">
          @error('age')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div>
            <label>gender</label>
            <input type="text" id="gender" name="gender" value="{{ old('gender') }}">
            @error('gender')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div>
            <label>address</label>
            <input type="text" id="address" name="address" value="{{ old('address') }}">
            @error('address')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        <button type="submit">Submit</button>
      </form>
</body>
</html>