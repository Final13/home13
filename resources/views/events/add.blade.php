@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add event</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('save-event') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="user" class="col-sm-4 col-form-label text-md-right">User</label>

                                <div class="col-md-6">
                                    <select name="category" class="form-control" autofocus required>
                                        <option value="0">Select User</option>
                                        @foreach($users as $user)
                                        <option value="{{  $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-sm-4 col-form-label text-md-right">Type</label>

                                <div class="col-md-6">
                                    <select name="category" class="form-control">
                                        {{--<option value="0">Select a Category</option>--}}
                                        <option value="Holiday">Holiday</option>
                                        <option value="Sickness">Sickness</option>
                                        <option value="Corporate">Corporate</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start_date" class="col-sm-4 col-form-label text-md-right">Start Date</label>

                                <div class="col-md-6">
                                    <input type="date" id="start_date" name="start_date" class="form-control" required autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end_date" class="col-sm-4 col-form-label text-md-right">End Date</label>

                                <div class="col-md-6">
                                    <input type="date" id="end_date" name="end_date" class="form-control" required autofocus>

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