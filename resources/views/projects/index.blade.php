@extends('layouts.app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><a href="{{ route('add-project') }}">Click here to create new project</a></div>

                    <div class="card-body">
                        @foreach($projects as $item)
                            <a href="{{ route('view-project', ['id' => $item->id]) }}">{{ $item->name }}</a><br>
                            <span style="margin-right: 10px">Begin:</span>{{ $item->start_date }}<br>
                            <span style="margin-right: 10px">End:</span>{{ $item->end_date }}<br>
                            <a href="{{ route('delete-project', ['id' => $item->id]) }}"><i class="fas fa-trash-alt"></i></a>
                            <a href="{{ route('edit-project', ['id' => $item->id]) }}"><i class="fas fa-pencil-alt"></i></a><br />
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
