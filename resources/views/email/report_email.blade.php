<!DOCTYPE html>
<html>
<head>
    <title>Last 10 Registered Users</title>
</head>
<body>
    <h1>Last 10 Registered Users</h1>
    <ul>
        @foreach($users as $user)
            <li>{{ $user->name }} ({{ $user->email }})</li>
        @endforeach
    </ul>
</body>
</html>
