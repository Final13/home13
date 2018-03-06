@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="top-right links">
                    <a href="{{ url('users/index') }}">All users</a>
            </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><a href="{{ route('add-project') }}">Click here to create new project</a></div>

                    <div class="card-body">
                        @foreach($projects as $item)
                            <a href="{{ route('view-project', ['id' => $item->id]) }}">{{ $item->name }}</a><br>
                            Begin:&nbsp{{ $item->start_date }}<br>
                            End:&nbsp{{ $item->end_date }}<br>
                            <a href="{{ route('delete-project', ['id' => $item->id]) }}"><i class="fas fa-trash-alt"></i></a>
                            <a href="{{ route('edit-project', ['id' => $item->id]) }}"><i class="fas fa-pencil-alt"></i></a><br />
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
