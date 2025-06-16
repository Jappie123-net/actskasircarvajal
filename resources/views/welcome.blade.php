<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <ul>
        @foreach ($stud as $students)
            <li>{{$students->fullname}} - {{$students->age}} - {{$students->address}} - {{$students->gender}}</li>
        @endforeach
    </ul>
    
</body>
</html>