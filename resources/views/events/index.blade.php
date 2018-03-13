@extends('layouts.app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><a style="float:right;" href="{{ route('add-event') }}">Click here to
                            create new event</a></div>

                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Event type</th>
                            <th scope="col">Start date</th>
                            <th scope="col">End date</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ route('view-event', ['id' => $event->id]) }}">{{ $event->type }}</a></td>
                                <td>{{ $event->start_date }}</td>
                                <td>{{ $event->end_date }}</td>
                                <td class="actions">
                                    <a style="margin-right: 10px;"
                                       href="{{ route('edit-event', ['id' => $event->id]) }}"><i
                                                class="fas fa-pencil-alt"></i></a>
                                    <a href="{{ route('delete-event', ['id' => $event->id]) }}"><i
                                                class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection