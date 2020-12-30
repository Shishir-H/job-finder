<?php
    session_start();
    require_once '../db/connect.php';
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $id = $_SESSION['id'];
    $query = "SELECT * FROM `company_details` WHERE user_id_c = '$id'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if( $count === 1){
        $row = mysqli_fetch_assoc($result);
        $details = $row["details"];
        $address = $row["address"];
    }else{
        $details = "";
        $address = "";
    }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link
            href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,300;1,400;1,700&display=swap"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../styles/style.css" />

        <title>Company Profile</title>
    </head>

    <body>
        <nav class="nav-bar">
            <h1>Job Finder <i class="fa fa-suitcase" aria-hidden="true"></i></h1>
            <a class="nav-btn" href="../index.html">Logout</a>
        </nav>
        <h2>My Profile</h2>

        <div class="card">
            <div class="username">
                <h3><?php echo($username) ?></h3>
            </div>
            <div class="email">
                <h3><?php echo($email) ?></h3>
            </div>
            <form class="profile-form" action="updateprofile.php" method="POST">
                <div class="form-control">

                </div>
                <div class="form-control">

                    <h6 for="details">Details:</h6>
                    <input type="text" name="details" id="details" value="<?php echo($details) ?>" />
                </div>
                <div class="form-control">
                    <h6 for="address">Address:</h6>
                    <input type="text"  name="address" id="address" value="<?php echo($address) ?>" />
                </div>
                <button class="btn">Update</button>
            </form>
        </div>
    </body>

</html>