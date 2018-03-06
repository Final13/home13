@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registered users</div>
                    <div class="card-header"><a href="{{ route('add-user') }}">Create new user</a></div>
                    <div class="card-body">

                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">first_name</th>
                                <th scope="col">last_name</th>
                                <th scope="col">birthday</th>
                                <th scope="col">
                                    Edit/Delete
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                        @foreach($users as $user)
                            {{--<div class="card-header">--}}
                                {{--{{ $user->first_name }}&nbsp--}}
                                {{--{{ $user->last_name }}<br>--}}
                                {{--{{ $user->birthday }}<br>--}}
                                {{--<a href="{{ route('delete-user', ['id' => $user->id]) }}"><i class="fas fa-trash-alt"></i></a>--}}
                                {{--<a href="{{ route('edit-user', ['id' => $user->id]) }}"><i class="fas fa-pencil-alt"></i></a><br>--}}
                            {{--</div>--}}
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->birthday }}</td>
                                <td>
                                    <a href="{{ route('edit-user', ['id' => $user->id]) }}"><i class="fas fa-pencil-alt"></i></a>
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
