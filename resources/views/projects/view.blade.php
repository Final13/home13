@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">View project</div>

                    <div class="card-body">

                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">

                                {{ $project->name }}

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start_date" class="col-sm-4 col-form-label text-md-right">start_date</label>

                            <div class="col-md-6">

                                {{ $project->start_date }}

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end_date" class="col-sm-4 col-form-label text-md-right">end_date</label>

                            <div class="col-md-6">

                                {{ $project->end_date }}

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
