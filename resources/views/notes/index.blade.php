@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Notes</div>

                <div class="card-body">
                    <a href="{{ route('notes.create') }}" class="link-primary">Add Note</a>
                    @if(count($notes) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($notes as $note)
                                <tr>
                                    <td>{{ $note->title }}</td>
                                    <td>{{ $note->content }}</td>
                                    <td>
                                        <div style="display: flex;">
                                            <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-warning" role="button">Edit</a>
                                            <span>&emsp;</span>
                                            <form action="{{ route('notes.destroy', $note->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-rounded">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <div>You don't have any notes yet.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection