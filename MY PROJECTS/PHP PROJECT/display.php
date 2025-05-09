<?php
include 'conn.php';

session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <img src="https://www.shutterstock.com/image-vector/dancing-girl-logo-school-oriental-260nw-1127453285.jpg"
                class="img-fluid rounded-circle" alt="" style height="70px" width="70px" />

            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php" aria-current="page">Home
                            <span class="visually-hidden">(current)</span></a>


                    <li class="nav-item">
                        <a class="nav-link active" href="display.php">Employee data</a>
                    </li>
            </div>
        </div>
    </nav>

</head>

<body>

    <div class="container">
        <button class="btn btn-primary my-5"><a href="user-insert.php" class="text-light">
                Add user</a></button>

        <table class="table pl-50 pr-50">
            <thead>
                <tr>
                    <th scope="col">Sr.No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Password</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "select * from `users`";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $mobile = $row['mobile'];
                        $password = $row['password'];
                        echo '<tr>
                       <th scope="row">' . $id . '</th>
                       <td>' . $name . '</td>
                       <td>' . $email . '</td>
                       <td>' . $mobile . '</td>
                       <td>' . $password . '</td>
                      
                       <td>
                       <button class="btn btn-primary"><a href="update.php?updateid=' . $id . '" class="text-light">Update</a></button>
                       <button class="btn btn-danger"><a href="delete.php?deleteid=' . $id . '" class="text-light">Delete</a></button>
                       </td>

                </tr>';
                    }
                }
                ?>

            </tbody>
        </table>
    </div>

</body>

</html>