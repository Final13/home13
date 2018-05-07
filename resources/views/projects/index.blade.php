@extends('layouts.app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (Auth::user()->isAdmin())
                        <div class="card-header"><a style="float:right;" href="{{ route('add-project') }}">Click here to
                                create new project</a></div>
                    @else
                        <div class="card-header">My Projects</div>
                    @endif
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Project name</th>
                            <th scope="col">User</th>
                            <th scope="col">Start date</th>
                            <th scope="col">End date</th>
                            <th scope="col">Is Finished</th>
                            @if (Auth::user()->isAdmin())
                                <th scope="col">Actions</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($projects as $project)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ route('view-project', ['id' => $project->id]) }}">{{ $project->name }}</a>
                                </td>
                                <td>{{ $project->user->full_name ?? 'USER DELETED!' }} </td>
                                <td>{{ $project->start_date }}</td>
                                <td>{{ $project->end_date }}</td>
                                <td>
                                    @if($project->is_finished ===1)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>
                                @if (Auth::user()->isAdmin())
                                    <td class="actions">
                                        <a style="margin-right: 10px;"
                                           href="{{ route('edit-project', ['id' => $project->id]) }}"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        <a href="{{ route('delete-project', ['id' => $project->id]) }}"><i
                                                    class="fas fa-trash-alt"></i></a>
                                        @endif
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
