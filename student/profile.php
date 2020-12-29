<?php
    session_start();
    require_once '../db/connect.php';
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $id = $_SESSION['id'];
    $query = "SELECT * FROM `student_details` WHERE user_id_s = '$id'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if( $count === 1){
        $row = mysqli_fetch_assoc($result);
        $bio = $row["bio"];
        $education = $row["education"];
        $contact = $row["contact"];
    }else{
        $bio = "";
        $education = "";
        $contact = "";
    }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Profile</title>
    </head>

    <body>
        <nav>
            <h1>Job Finder</h1>
        </nav>
        <h2>My Profile</h2>

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

                    <h6 for="bio">Bio:</h6>
                    <textarea name="bio" id="bio" cols="30" rows="5">
                        <?php echo($bio) ?>
                    </textarea>
                </div>
                <div class="form-control">
                    <h6 for="education">Education:</h6>
                    <textarea name="education" id="education" cols="30" rows="5">
                        <?php echo($education) ?>
                    </textarea>
                </div>
                <div class="form-control">
                    <h6 for="contact">Contact:</h6>
                    <textarea name="contact" id="contact" cols="30" rows="5">
                        <?php echo($contact) ?>
                    </textarea>
                </div>
                <button>Update</button>
            </form>
        </div>
    </body>

</html>