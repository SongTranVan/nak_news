@extends('layout.master')

@section('title', 'View a ticket')

@section('content')
<div class="container col-md-8 col-md-offset-2 mt-5">
    <div class="card">
        <div class="card-header ">
            <h5 class="float-left">{{ $ticket->title }}</h5>
            <div class="clearfix"></div>
        </div>
        <div class="card-body">
            <p> <strong>Status</strong>: {{ $ticket->status ? 'Pending' : 'Answered' }}</p>
            <p> {{ $ticket->content }} </p>
            <a href="{{ route('edit_a_ticket', ['slug' => $ticket->slug]) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('delete_a_ticket', ['slug' => $ticket->slug]) }}" method="post" class="float-left">
                @csrf
                <div>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
            <div class="clearfix"></div>
            @foreach ($comments as $comment)
            <div class="card mt-3">
                <div class="card-body">
                    {{ $comment->content }}
                </div>
            </div>
            @endforeach
            <div class="card mt-3">
                <form method="post" action="{{ route('create_new_comment') }}">
                    @foreach($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach

                    @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $ticket->id }}">
                    <input type="hidden" name="post_type" value="App\Ticket">
                    <fieldset>
                        <legend class="ml-3">Reply</legend>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <textarea class="form-control" rows="3" id="content" name="content"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="reset" class="btn btn-danger">Cancel</button>
                                <button type="submit" class="btn btn-primary">Post</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection