@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit user</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('update-user') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="first_name" class="col-sm-4 col-form-label text-md-right">First Name</label>

                                <div class="col-md-6">
                                    <input id="first_name" name="first_name" class="form-control" value="{{ $user->first_name }}" required autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name" class="col-sm-4 col-form-label text-md-right">Last Name</label>

                                <div class="col-md-6">
                                    <input id="last_name" name="last_name" class="form-control" value="{{ $user->last_name }}" required autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">email</label>

                                <div class="col-md-6">
                                    <input id="email" name="email" class="form-control" value="{{ $user->email }}" required >

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthday" class="col-sm-4 col-form-label text-md-right">Birthday</label>

                                <div class="col-md-6">
                                    <input id="birthday" type="date" name="birthday" class="form-control" value="{{ $user->birthday }}" required >

                                </div>
                            </div>

                            <input type="hidden" name="id" value="{{ $user->id }}">


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
