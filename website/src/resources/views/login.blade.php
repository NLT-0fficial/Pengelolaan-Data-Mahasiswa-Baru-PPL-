<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login Admin</title>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

</head>

<body class="hold-transition login-page">

<div class="login-box">

    <div class="login-logo">
        <b>Admin</b>Panel
    </div>

    <div class="card">

        <div class="card-body login-card-body">

            <p class="login-box-msg">
                Silakan login
            </p>

            @if(session('error'))

                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>

            @endif

            <form action="/login" method="POST">

                @csrf

                <!-- Username -->
                <div class="input-group mb-3">

                    <input type="text"
                           name="username"
                           class="form-control"
                           placeholder="Username">

                </div>

                <!-- Password -->
                <div class="input-group mb-3">

                    <input type="password"
                           id="password"
                           name="password"
                           class="form-control"
                           placeholder="Password">

                    <div class="input-group-append">

                        <div class="input-group-text"
                             onclick="togglePassword()"
                             style="cursor:pointer;">

                            👁️

                        </div>

                    </div>

                </div>

                <!-- Button -->
                <button type="submit"
                        class="btn btn-primary btn-block">

                    Login

                </button>

            </form>

        </div>

    </div>

</div>

<script>

function togglePassword() {

    const password = document.getElementById('password');

    if (password.type === 'password') {

        password.type = 'text';

    } else {

        password.type = 'password';

    }

}

</script>

</body>
</html>