@extends('layout.master')

@section('content')
    <form action="{{ route('updateUser.post', $users->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3 pt-4">
            <label for="" class="form-label"><b>User Name</b></label>
            <input type="text" value="{{ $users->name }}" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label for="" class="form-label"><b>Email</b></label>
            <input type="text" value="{{ $users->email }}" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label for="" class="form-label"><b>Role</b></label>
            <input type="text" value="{{ $users->role }}" class="form-control" name="password">
        </div>
        <div class="mb-3">
            <label for="" class="form-label"><b>Password</b></label>
            <input type="text" value="{{ $users->password }}" class="form-control" name="password">
        </div>
        <div class="mb-3">
            <a href="{{ route('users') }}" class="btn btn-danger">Back</a>

            <input type="submit" value="Update" class="btn btn-success">

        </div>
    </form>
@endsection
