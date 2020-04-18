@extends('layout.default')
@section('content')
        <div class="row slightly-lit">
            <div class="col-md-12">
                <h4>Pick a Category.</h4>
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">Category GANG!</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @forelse($categories as $category)
                        <td>
                            <a class="btn btn-primary align-middle" role="button" href="{{ route('category', ['slug' => $category->slug]) }}"
                               data-toggle="tooltip" data-placement="top" title="{{ $category->description }}">{{ $category->name }}</a>
                        </td>
                            @if($loop->iteration % 4 === 0)
                    </tr>
                    <tr>
                            @endif
                        @empty
                            <td>Yikes, there are no categories to display!</td>
                        @endforelse
                    </tr>
                    </tbody>
                </table>
        </div>
    </div>
    @endsection
