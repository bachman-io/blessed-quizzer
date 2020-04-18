@extends('layout.default')
@section('content')
    <div class="row slightly-lit">
        <div class="col-md-12">
            <h4>Ask The Question.</h4>
            <table class="table table-dark">
                <thead>
                @forelse($category->questions as $question)
                <tr>
                    <th scope="col">Category: {{ $category->name }}</th>
                </tr>
                    <tr>
                        <td>{{ $question->question_text }}</td>
                    </tr>
                    <tr>
                        <td><a class="btn btn-primary" onclick="document.getElementById('question_answer').style.display = 'block';">Click to Show Answer</a></td>
                    </tr>
                    <tr id="question_answer" style="display:none;">
                        <td><p>{{ $question->answer_text }}</p>
                            <p><a class="btn btn-primary" href="{{ $question->source_url }}">Source: {{ $question->source_url }}</a></p>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>Yikes, there are no questions in this category!</td>
                    </tr>
                @endforelse
                </thead>
                <tbody>
                <tr>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
