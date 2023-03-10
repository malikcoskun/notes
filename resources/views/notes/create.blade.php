@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Note</div>
                
                <div class="card-body">
                    <form action="{{ route('notes.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter note title">
                        </div>
                        <div class="form-group">
                            <label for="content">Body</label>
                            <textarea type="text" name="content" id="content" class="form-control" placeholder="Enter note body"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection