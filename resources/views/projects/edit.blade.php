@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit project</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('update-project') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="user" class="col-sm-4 col-form-label text-md-right">User</label>

                                <div class="col-md-6">
                                    <select name="user_id"
                                            class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}"
                                            autofocus required>
                                        <option value="0">Select User</option>
                                        @foreach($users as $user)
                                            <option value="{{  $user->id }}" {{ $user->id === $project->user_id ? "selected='selected'" : "" }}>{{ $user->first_name }} {{ $user->last_name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('user_id'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">Project Name</label>

                                <div class="col-md-6">
                                    <input id="name" name="name" class="form-control" value="{{ $project->name }}"
                                           required autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start_date" class="col-sm-4 col-form-label text-md-right">Start Date</label>

                                <div class="col-md-6">
                                    <input type="date" id="start_date" name="start_date" class="form-control"
                                           value="{{ Carbon\Carbon::parse($project->start_date)->format('Y-m-d') }}"
                                           required>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end_date" class="col-sm-4 col-form-label text-md-right">End Date</label>

                                <div class="col-md-6">
                                    <input type="date" id="end_date" name="end_date" class="form-control"
                                           value="{{ Carbon\Carbon::parse($project->end_date)->format('Y-m-d') }}"
                                           required>

                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{ $project->id }}">

                            <div class="form-group row">
                                <label for="is_finished" class="col-sm-4 col-form-label text-md-right">Is
                                    Finished:</label>
                                <div class="col-md-6">
                                    <input type="hidden" id="is_finished" name="is_finished" value="0">
                                    <input style="text-align:center; vertical-align:middle" type="checkbox"
                                           id="is_finished" name="is_finished" value="1">
                                </div>
                            </div>

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
