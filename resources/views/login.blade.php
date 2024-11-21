<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-google {
            background-color: #ffffff;
            color: #4285F4;
            border: 1px solid #4285F4;
            border-radius: 5px;
        }

        .btn-google:hover {
            background-color: #4285F4;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4">
                    <div class="card-header text-center bg-white border-0">
                        <h3 class="mb-3">Welcome Back</h3>
                        <p class="text-muted">Please login to your account</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('loginMatch') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <a href="{{ route('login.google') }}"
                                class="btn btn-google d-flex align-items-center justify-content-center">
                                <i class="fa-brands fa-google me-2"></i>
                                Login with &nbsp; <b>Google</b>
                            </a>
                        </div>
                    </div>
                    <div class="card-footer text-center bg-white border-0">
                        <small>Don't have an account? <a href="{{ route('register') }}">Register here</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
