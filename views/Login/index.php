<!-- TODO Application entry point. Login view -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <title>Employee Management v2</title>
</head>

<body>
    <div class="card">
        <img src="assets/images/logoAssembler.png" class="card-img-top" alt="Responsive image">
        <form action="src/library/loginController.php" method="POST" class="card-body needs-validation" novalidate>
            <?php if(isset($_GET['logoutMsg']) && isset($_GET['logoutType'])) {
                $alertType = $_GET['logoutType'];
                $alertMsg = $_GET['logoutMsg'];
                echo '<div class="alert '.$alertType.' alert-dismissible show">
                <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>'.$alertMsg.'
                </div>';
            }; ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Error!</strong> Incorrect credentials.
            </div>
            <div class="form-group row">
                <input type="email" id="validationCustom01" name="emailInput" class="form-control" placeholder="Email address" require>
                <!-- <div class="invalid-feedback">You have entered an invalid email</div> --> <!-- // Bootrat specific validation -->
            </div>
            <div class="form-group row">
                <input type="password" id="validationCustom02" name="passwordInput" class="form-control" placeholder="Password" require>
                <!-- <div class="invalid-feedback">You have entered an invalid password</div> --> <!-- // Bootrat specific validation -->
            </div>
            <div class="form-group row">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </form>
    </div>

<script src="assets/js/index.js"></script>
</body>
</html>
