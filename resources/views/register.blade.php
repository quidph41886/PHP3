<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Register </title>
</head>

<body>
    <div>
        <div class="container w-50">
            <h1>Register</h1>

            <form action="{{ route('postRegister') }}" method="post">
                @csrf
                <div class="mt-3">
                    <label for="" class="form-lable">Fullname</label>
                    <input type="text" name="fullname" class="form-control">
                </div>

                <div class="mt-3">
                    <label for="" class="form-lable">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>

                <div class="mt-3">
                    <label for="" class="form-lable">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>


                <div class="mt-3">
                    <label for="" class="form-lable">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="mt-3">
                    <button class="btn btn-primary" type="submit">Register</button>
                </div>

                <div class="mb-3">
                    <a href="{{ route('postLogin') }}">Login</a>
                </div>

            </form>
        </div>
    </div>

</body>

</html>
