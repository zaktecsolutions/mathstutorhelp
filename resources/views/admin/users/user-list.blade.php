<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Course</th>
            <th scope="col">Roles</th>
            <th scope="col"></th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        {{-- {{ $user->name}} - {{ $user ->email}} --}}
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ empty($user->course) ? null :$user->course->course_name }}</td>
            <td>{{ $user->roles->pluck('name')->implode(',') }}</td>
            <td>

                <a href="{{ route('admin.users.show', $user->id)}}">
                    <button type="button" class="btn btn-primary float-left">View</button></a> </td>
            @can('edit-users')
            <td><a href="{{ route('admin.users.edit', $user->id)}}">
                    <button type="button" class="btn btn-primary float-left">Edit</button></a></td>
            @endcan

            <td>
                <form action="{{ route('admin.users.destroy',$user)}}" method="POST" class="float-left">
                    @csrf
                    {{ @method_field('DELETE')}}
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            <td>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>