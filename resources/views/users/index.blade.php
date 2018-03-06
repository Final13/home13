@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registered users</div>
                    <div class="card-header"><a href="{{ route('add-user') }}">Create new user</a></div>
                    <div class="card-body">
                        @foreach($users as $user)
                            {{ $user->first_name }}
                            {{ $user->last_name }}
                            <a href="{{ route('delete-user', ['id' => $user->id]) }}">Delete</a>
                            <a href="{{ route('edit-user', ['id' => $user->id]) }}">Edit</a><br />
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
