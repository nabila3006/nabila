<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <!-- icon - font awesome -->

    <link rel="stylesheet" href="assets/icons/css/fontawesome.css">
    <link rel="stylesheet" href="assets/icons/css/solid.css">
    <!-- icon password -->
    <style>
        .input-group {
            position: relative;
            width: 100%;

        }

        .input-group i {
            position: absolute;
            right: 11px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            z-index: 10;
        }

        .input-group input {
            padding-right: 30px;
            border-radius: 5px !important;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="index.php">Galeri Foto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto">
                </div>
                <a href="register.php" class="btn btn-outline-primary m-1">daftar</a>
                <a href="login.php" class="btn btn-outline-success m-1">masuk</a>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body bg-light">
                        <div class="text-center">
                            <h5>
                                login aplikasi
                            </h5>
                        </div>
                        <form action="config/aksi-login.php" method="POST">
                            <label class="form-label">username</label>
                            <input type="text" class="form-control" name="username" required>
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                                <i class="fas fa-eye" id="eye"></i>
                            </div>
                            <div class="d-grid mt-2">
                                <button type="submit" class="btn btn-primary">masuk</button>
                            </div>
                        </form>
                        <hr>
                        <p>belum punya akun? <a href="register.php">daftar di sini!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
        <p>&copy;D1ACE</p>
    </footer>

    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- icon password -->
    <script>
        const eyeIcon = document.getElementById('eye');
        const passwordInput = document.getElementById('password');

        eyeIcon.addEventListener('click', function() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });
    </script>
</body>

</html>