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
        <title>Company Profile</title>
    </head>

    <body>
        <nav>
            <h1>Job Finder</h1>
        </nav>
        <h2>Company Profile</h2>

        <div class="card">
            <div class="username">
                <h3><?php echo($username) ?></h3>
            </div>
            <div class="email">
                <h4><?php echo($email) ?></h4>
            </div>
            <form action="updateprofile.php" method="POST">
                <div class="form-control">

                </div>
                <div class="form-control">

                    <h6 for="details">Details:</h6>
                    <input name="details" id="details" value="<?php echo($details) ?>" />
                </div>
                <div class="form-control">
                    <h6 for="address">Address:</h6>
                    <input name="address" id="address" value="<?php echo($address) ?>" />
                </div>
                <button>Update</button>
            </form>
        </div>
    </body>

</html>