@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">View event</div>

                    <div class="card-body">

                        <div class="form-group row">
                            <label for="type" class="col-sm-4 col-form-label text-md-right">type:</label>

                            <div class="col-md-6">

                                {{ $event->type }}

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start_date" class="col-sm-4 col-form-label text-md-right">Start Date:</label>

                            <div class="col-md-6">

                                {{ $event->start_date }}

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end_date" class="col-sm-4 col-form-label text-md-right">End Date:</label>

                            <div class="col-md-6">

                                {{ $event->end_date }}


                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
