@extends('layout.default')
@section('content')
    <div class="row slightly-lit">
        <div class="col-md-12">
            <h4>Submit a Question</h4>
            @if ($errors->any())
                <div class="alert alert-danger custom-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <p>Your question should meet the following criteria:</p>
            <ul>
                <li>It should match both the <strong>category</strong> and its <strong>description</strong></li>
                <li>It should be based off a <strong>real, publicly-known, objective fact</strong>, not your or someone else's opinion, an inside joke or meme, confidential or private information about you/friends/family/companies, etc.</li>
                <li>The source of the question must be either a <strong>primary source</strong> or <strong>a source known for its expertise</strong> on the subject; Wikipedia is acceptable in general, but is discouraged if the page is a stub.</li>
            </ul>
            <form action="{{ route('new_question') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option value="0" selected>-Select Category-</option>
                    @forelse($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }} -- {{ $category->description }}</option>
                    @empty
                        <option disabled>-No Categories Available-</option>
                    @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="question_text">Question</label>
                    <textarea class="form-control" id="question_text" name="question_text" rows="3" placeholder="Who was the first U.S President, known as a general in the American Revolution?"></textarea>
                </div>
                <div class="form-group">
                    <label for="answer_text">Answer</label>
                    <textarea class="form-control" id="answer_text" name="answer_text" rows="3" placeholder="George Washington (April 30, 1789 - March 4, 1797)"></textarea>
                </div>
                <div class="form-group">
                    <label for="question_text">Source URL</label>
                    <input type="url" class="form-control" id="question_text" name="source_url" placeholder="https://en.wikipedia.org/wiki/List_of_presidents_of_the_United_States">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
