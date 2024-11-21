<!-- @extends('layout.master') -->

<!-- @section('content') -->
    <!-- Bootstrap CSS (Optional, if using Bootstrap styling) -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- DataTables CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"> -->

    <!-- jQuery and DataTables JavaScript -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> -->

    <!-- <a href="{{ route('addUserView') }}" class="btn btn-success mb-3 mt-3">Add</a> -->


    <!-- <table class="table table-bordered text-center mb-3 mt-3" id="myTable"> -->
        <!-- <thead class="bg-success"> -->
            <!-- <tr> -->
                <!-- <th scope="col">Id</th> -->
                <!-- <th scope="col">Name</th> -->
                <!-- <th scope="col">Email</th> -->
                <!-- <th scope="col">Password</th> -->
                <!-- <th scope="col">Action</th> -->
            <!-- </tr> -->
        <!-- </thead> -->
        <!-- <tbody> -->

            <!-- <?php $count = 1; ?> -->

            <!-- @foreach ($users as $user) -->
                <!-- <tr> -->
                    <!-- <td> -->
                        <!-- {{ $count++ }} -->
                    <!-- </td> -->
                    <!-- <td>{{ $user->name }}</td> -->
                    <!-- <td>{{ $user->email }}</td> -->
                    <!-- <td>*****</td> -->
                    <!-- <td> -->

                        <!-- <a href="{{ route('updateUser', $user->id) }}" class="btn btn-primary">Edit</a> -->

                        <!-- <a href="{{ route('showuser', $user->id) }}" class="btn btn-warning">View</a> -->

                        <!-- <form action="{{ route('updateUser.destroy', $user->id) }}" method="POST" style="display: inline;"> -->
                            <!-- @csrf -->
                            <!-- @method('DELETE') -->
                            <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
                        <!-- </form> -->

                    <!-- </td> -->
            <!-- @endforeach -->
        <!-- </tbody> -->
    <!-- </table> -->

    <!-- <script> -->
        <!-- // $(document).ready(function() { -->
            <!-- // $('#myTable').DataTable(); -->
        <!-- // }); -->
    <!-- // </script> -->
<!-- @endsection -->
