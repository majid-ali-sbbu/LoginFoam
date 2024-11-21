@extends('layout.master')

@section('content')

<a href="{{ route('addUserView') }}"  class="btn btn-success mt-3">Add</a>


    <table class="table table-bordered text-center mt-3" id="myTable">
        <thead class="bg-success">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>*****</td>
                    <td>{{ $user->role }}</td>
                    <td>

                        <a href="{{ route('updateUser', $user->id) }}"  class="btn btn-primary">Edit</a>

                        <a href="{{ route('showuser', $user->id) }}" class="btn btn-warning">View</a>

                        <form action="{{ route('updateUser.destroy', $user->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </td>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
        <div>
           {{ $users->links() }}
        </div>

@endsection
