<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./sweetalert2@11.js"></script>

</head>

<body>
    <div>
        <h1>
            Email field or password field is empty or both of them !
        </h1>
    </div>
    <div>
        <a href="./index.php">Return to Home Page</a>
    </div>
    <script>
    Swal.fire({
        icon: 'warning',
        title: 'Wrong',
        text: 'Email field or password field is empty or both of them !',
    })
    </script>

</body>

</html>