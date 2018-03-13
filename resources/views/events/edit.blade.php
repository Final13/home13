@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit event</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('update-event') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="user" class="col-sm-4 col-form-label text-md-right">User</label>

                                <div class="col-md-6">
                                    <select name="category" class="form-control" autofocus required>
                                        <option value="0">Select User</option>
                                        @foreach($users as $user)
                                            <option value="{{  $user->id }}" {{ $user->id === $event->user_id ? "selected='selected'" : "" }}>{{ $user->first_name }} {{ $user->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-sm-4 col-form-label text-md-right">Type</label>

                                <div class="col-md-6">
                                    <select name="category" class="form-control" autofocus required>
                                        {{--<option value="{{ $event->type }}">{{ $event->type }}</option>--}}
                                        <option value="Holiday" {{ $event->type === "Holiday" ? "selected='selected'" : "" }}>Holiday</option>
                                        <option value="Sickness"{{ $event->type === "Sickness" ? "selected='selected'" : "" }}>Sickness</option>
                                        <option value="Corporate"{{ $event->type === "Corporate" ? "selected='selected'" : "" }}>Corporate</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start_date" class="col-sm-4 col-form-label text-md-right">Start Date</label>

                                <div class="col-md-6">
                                    <input id="start_date" name="start_date" class="form-control"
                                           value="{{ $event->start_date }}" required>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end_date" class="col-sm-4 col-form-label text-md-right">End Date</label>

                                <div class="col-md-6">
                                    <input id="end_date" name="end_date" class="form-control"
                                           value="{{ $event->end_date }}" required>

                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{ $event->id }}">


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
