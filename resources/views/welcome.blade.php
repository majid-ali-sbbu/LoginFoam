<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container text-center mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route('login') }}" type="button" class="btn btn-primary">Login</a>
                <a href="{{ route('register') }}" type="button" class="btn btn-secondary">Registraction</a>
            </div>
        </div>
    </div>
</body>

</html>
