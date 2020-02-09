@extends('books.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Simple Book Management CRUD Application</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-success " href="{{ route('books.create') }}"> Add Book</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if(sizeof($books) > 0)
        <form class="form-inline md-form mr-auto mb-4" action="{{ route('books.index') }}" method="GET">
            <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-rounded btn-sm my-0" type="submit"><i class="fa fa-search"></i></button>
        </form>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>@sortablelink('Title')</th>
                <th>@sortablelink('Author')</th>
                <th width="160px"></th>
            </tr>
            @foreach ($books as $book)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>
                        <form action="{{ route('books.destroy',$book->id) }}" method="POST">

                            <a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <div class="alert alert-alert">Start Adding to the Database.</div>
    @endif



@endsection