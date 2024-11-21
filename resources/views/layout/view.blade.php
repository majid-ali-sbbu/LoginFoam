@extends('layout.master')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Edit User</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body>
        <div class="container mt-2">
            <div class="row mb-3">
                <div class="col-md-12">
                    <form action="" method="">
                        <div class="mb-3 mt-2">
                            <label class="form-label"><b>Id</b></label>
                            <input type="text" class="form-control" value="{{ $users->id }}" readonly>
                        </div>
                        <div class="mb-3 mt-2">
                            <label class="form-label"><b>Name</b></label>
                            <input type="text" class="form-control" value="{{ $users->name }}" readonly>
                        </div>
                        <div class="mb-3 mt-2">
                            <label class="form-label"><b>Email</b></label>
                            <input type="text" class="form-control" value="{{ $users->email }}" readonly>
                        </div>
                        <div class="mb-3 mt-2">
                            <label class="form-label"><b>Password</b></label>
                            <input type="text" class="form-control" value="*****" readonly>
                        </div>
                        <div class="mb-3 mt-2">
                            <label class="form-label"><b>Role</b></label>
                            <input type="text" class="form-control" value="{{ $users->role }}" readonly>
                        </div>
                        <a href="{{ route('users') }}" class="btn btn-danger">Back</a>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </body>

    </html>
@endsection
