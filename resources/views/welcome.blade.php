@extends('layout.default')
@section('content')
    <div class="jumbotron">
        <div class="container">
            @if (session()->has('error'))
            <div class="alert alert-danger custom-danger" role="alert">
                {{ session()->get('error') }}
            </div>
            @endif
                @if (session()->has('success'))
                    <div class="alert alert-success custom-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
            <h1 class="display-1">Blessed Quizzer</h1>
            <h1 class="display-4">The Better Wizard of Bezzerwizzer®</h1>
            <p>Sure, it's using a low-effort Bootstrap template, but what it lacks in design, it delivers on a richer trivia night for your Discord Gang.</p>
            <p><a class="btn btn-primary btn-lg" href="{{ url('/login') }}" role="button">Log In with Discord</a></p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Quizzical Questions</h2>
                <p>We have the same wonderful Bezzerwizzer® categories you've come to expect. </p>
            </div>
            <div class="col-md-4">
                <h2>Awesome Answers</h2>
                <p>Keep it as easy, challenging, up-to-date or retro as you want. No more stale questions you already know the answer to.</p>
            </div>
            <div class="col-md-4">
                <h2>Works Cited</h2>
                <p>Every answer has a URL you can visit to verify the correctness of the question or player's answer.</p>
            </div>
        </div>

        <hr>

    </div> <!-- /container -->
    @endsection
