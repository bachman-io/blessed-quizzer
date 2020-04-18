@extends('layout.default')
@section('content')
    <div class="row slightly-lit">
        <div class="col-md-12">
            <h4>Your Own Questions</h4>
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col">Category</th>
                    <th scope="col">Question</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($user->questions as $question)
                <tr>
                        <td>
                            {{ $question->category->name }}
                        </td>
                        <td>
                            {{ $question->question_text }}
                        </td>
                        <td>
                            {{ $question->status }}
                        </td>
                        <td>
                            &nbsp;
                        </td>
                </tr>
                    @empty
                <tr>
                        <td colspan="4">Yikes, there are no questions to display!</td>
                </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
