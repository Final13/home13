@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Registered users
                        <a style="float:right;" href="{{ route('add-user') }}">Create new user</a>
                    </div>
                    <div class="card-body">

                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">To Birthday</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->daysToBirthday() }}</td>
                                <td class="actions">
                                    <a style="margin-right: 20px;" href="{{ route('edit-user', ['id' => $user->id]) }}"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="{{ route('delete-user', ['id' => $user->id]) }}"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
