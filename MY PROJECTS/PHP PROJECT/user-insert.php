<?php
include 'conn.php';

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];


    $sql = "insert into users(name,email,mobile,password) 
    values ('$name','$email','$mobile','$password')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Data inserted";
        header('location:display.php');
    } else {
        echo "DB not connected...";
    }

}

session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container my-5">
        <form action="" method="post">

            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="" aria-describedby="helpId"
                    placeholder="Enter your name" />
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId"
                    placeholder="Enter your email" />

            </div>

            <div class="mb-3">
                <label for="" class="form-label">Mobile No</label>
                <input type="number" class="form-control" name="mobile" id="" aria-describedby="helpId"
                    placeholder="Enter your mobile no" />
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="" placeholder="Enter your password" />
            </div>

            <button type="submit" class="btn btn-primary" name="submit">
                Submit
            </button>
        </form>
    </div>
</body>

</html>