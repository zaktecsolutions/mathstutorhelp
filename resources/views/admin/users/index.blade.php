{{--  This page will display the user tables --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Users</div>
                <a href="#" class="btn btn-primary">Add User</a>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Roles</th>
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
                                <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                                <td>

                                    <a href="{{ route('admin.users.edit', $user->id)}}">
                                        <button type="button" class="btn btn-primary float-left">View</button></a> </td>
                                    @can('edit-users')
                                    <td><a href="{{ route('admin.users.edit', $user->id)}}">
                                        <button type="button" class="btn btn-primary float-left">Edit</button></a></td>
                                    @endcan
                                    @can('delete-users')
                                   <td> <form action="{{ route('admin.users.destroy',$user)}}" method="POST"
                                        class="float-left">
                                        @csrf
                                        {{ @method_field('DELETE')}}
                                        <button type="submit" class="btn btn-warning">Delete</button> 
                                    </form>
                                    <td>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection