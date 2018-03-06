@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add project</div>

                    <div class="card-body">
                        @foreach($projects as $item)
                            <a href="{{ route('view-project', ['id' => $item->id]) }}">{{ $item->name }}</a>
                            {{ $item->start_date }}
                            {{ $item->end_date }}
                            <a href="{{ route('delete-project', ['id' => $item->id]) }}">Delete</a>
                            <a href="{{ route('edit-project', ['id' => $item->id]) }}">Edit</a><br />
                        @endforeach

                        <a href="{{ route('add-project') }}">click here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
