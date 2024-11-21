<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SideWeb</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Header Section -->
    <header class="bg-primary text-white py-3">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3">SideWeb</h1>
                <nav>
                    <a href="#" class="text-white mx-2">Home</a>
                    <a href="#" class="text-white mx-2">About</a>
                    <a href="#" class="text-white mx-2">Contact</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content Section -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-6">
                <div class="card" style="width: 100%;">
                    <img src="{{ asset('image/img1.jpg') }}" class="card-img-top" alt="Image Description">
                    <div class="card-body">
                        <h5 class="card-title">Image</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card" style="width: 100%;">
                    <img src="{{ asset('image/img2.jpg') }}" class="card-img-top" alt="Image Description">
                    <div class="card-body">
                        <h5 class="card-title">Image</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-6">
                <div class="card" style="width: 100%;">
                    <img src="{{ asset('image/img3.jpg') }}" class="card-img-top" alt="Image Description">
                    <div class="card-body">
                        <h5 class="card-title">Image</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card" style="width: 100%;">
                    <img src="{{ asset('image/img4.jpg') }}" class="card-img-top" alt="Image Description">
                    <div class="card-body">
                        <h5 class="card-title">Image</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-6">
                <div class="card" style="width: 100%;">
                    <img src="{{ asset('image/img5.jpg') }}" class="card-img-top" alt="Image Description">
                    <div class="card-body">
                        <h5 class="card-title">Image</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card" style="width: 100%;">
                    <img src="{{ asset('image/img6.jpg') }}" class="card-img-top" alt="Image Description">
                    <div class="card-body">
                        <h5 class="card-title">Image</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
                    </div>
                </div>
            </div>
            <div class="col-6 mt-3">
                <a href="{{ route('login') }}" class="btn btn-danger">Back</a>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- Footer Section -->
    <footer class="bg-dark text-white text-center py-3 mt-4">
        <div class="container">
            <p class="mb-0">&copy; 2024 SideWeb. All rights reserved.</p>
            <div>
                <a href="#" class="text-white mx-2">Privacy Policy</a>
                <a href="#" class="text-white mx-2">Terms of Service</a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>