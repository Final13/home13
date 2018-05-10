<div>Birthday soon</div>

<table>
    <thead>
    <tr>
        <th>Full Name</th>
        <th>Email</th>
        <th>Birthday</th>
    </tr>
    </thead>
    <tbody>
{{--    @foreach($users as $user)--}}
        <tr>
            <td>{{ $user->full_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->birthday }}</td>
        </tr>
    {{--@endforeach--}}
    </tbody>
</table>
