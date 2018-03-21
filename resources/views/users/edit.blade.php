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
                                    <input id="first_name" name="first_name"
                                           class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                           value="{{ old('first_name', $user->first_name) }}" required autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name" class="col-sm-4 col-form-label text-md-right">Last Name</label>

                                <div class="col-md-6">
                                    <input id="last_name" name="last_name"
                                           class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                           value="{{ old('last_name', $user->last_name) }}" required autofocus>

                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">email</label>

                                <div class="col-md-6">
                                    <input id="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email', $user->email) }}" required >

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthday" class="col-sm-4 col-form-label text-md-right">Birthday</label>

                                <div class="col-md-6">
                                    <input id="birthday" type="date" name="birthday"
                                           class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}"
                                           value="{{ old('birthday', $user->birthday) }}" required >

                                    @if ($errors->has('birthday'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                    @endif

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
