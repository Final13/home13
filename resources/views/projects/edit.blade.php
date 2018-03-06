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
                                <label for="name" class="col-sm-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" name="name" class="form-control" value="{{ $project->name }}" required autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start_date" class="col-sm-4 col-form-label text-md-right">start_date</label>

                                <div class="col-md-6">
                                    <input id="start_date" name="start_date" class="form-control" value="{{ $project->start_date }}" required >

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end_date" class="col-sm-4 col-form-label text-md-right">end_date</label>

                                <div class="col-md-6">
                                    <input id="end_date" name="end_date" class="form-control" value="{{ $project->end_date }}" required >

                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{ $project->id }}">

                            <div class="form-group row">
                                <label for="is_finished" class="col-sm-4 col-form-label text-md-right">is_finished</label>
                                <div class="col-md-6">
                                    <input type="checkbox" id="is_finished" name="is_finished" value="{{ $project->is_finished }}">
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
