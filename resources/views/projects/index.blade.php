@extends('layouts.app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><a style="float:right;" href="{{ route('add-project') }}">Click here to
                            create new project</a></div>

                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Project name</th>
                            <th scope="col">Start date</th>
                            <th scope="col">End date</th>
                            <th scope="col">Is Finished</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($projects as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ route('view-project', ['id' => $item->id]) }}">{{ $item->name }}</a></td>
                                <td>{{ $item->start_date }}</td>
                                <td>{{ $item->end_date }}</td>
                                <td>
                                    @if($item->is_finished ===1)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>
                                <td class="actions">
                                    <a style="margin-right: 10px;"
                                       href="{{ route('edit-project', ['id' => $item->id]) }}"><i
                                                class="fas fa-pencil-alt"></i></a>
                                    <a href="{{ route('delete-project', ['id' => $item->id]) }}"><i
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
