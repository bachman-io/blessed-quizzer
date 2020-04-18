
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A site for viewing and submitting new Bezzerwizzer questions">
    <meta name="author" content="Collin Bachman">
    <title>{{ $title }} -- Blessed Quizzer</title>

    <link rel="canonical" href="https://bezz.bachman.io">

    <link rel="stylesheet" type="text/css" href="/css/app.css" />
</head>
<body>

<div class="container">
    @isset($user)
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-1">Blessed Quizzer</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>{{ $user->name }}'s Better Wizard of Bezzerwizzer®</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('layout.navigation')
        </div>
    </div>
    @endisset
    <main role="main">
        @yield('content')
    </main>
</div>
<footer class="container">
    <p>&copy; 2020 Collin Bachman | Bezzerwizzer is a registered trademark of Mattel Games</p>
</footer>
<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>
