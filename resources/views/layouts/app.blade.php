<!DOCTYPE html>
<html>
<head>
    <title>MyVote</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">MyVote</a>
        <div>
            <a class="btn btn-sm btn-outline-light" href="/login">Login</a>
            <a class="btn btn-sm btn-outline-light" href="/logout">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>
</body>
</html>
