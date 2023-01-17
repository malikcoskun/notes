@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Note</div>
                
                <div class="card-body">
                    <form action="{{ route('notes.update', $note->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $note->title }}">
                        </div>
                        <div class="form-group">
                            <label for="content">Body</label>
                            <textarea type="text" name="content" id="content" class="form-control">{{ $note->content }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection