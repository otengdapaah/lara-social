@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts by {{ $user->name }}</div>
                <hr>
                <div class="card-body">
                    @foreach($user->messages as $message)
                        <h5>{{ $message->user->name }}</h5>
                        {{ $message->body }}
                        <br>
                        <small>{{ $message->created_at->diffForHumans() }}</small>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
