<?php

session_start();
require_once '../conn.php';

if(!isset($_SESSION['username']))
{
    header("Location:login.php");
    exit;
}

$username = $_SESSION['username'];

$message = "";

//view profile

if(isset($_GET['view']))
{
    $sql = "SELECT * FROM students WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if($result && mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);
    }
    else
    {
        $message = "Profile not found!";
    }
}


// Update profile
if(isset($_POST['update']))
{
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $birthday = $_POST['birthday'];
    $enrolledYear = $_POST['enrolledYear'];

    $updateSql = "UPDATE students SET
                  firstName='$firstName',
                  lastName='$lastName',
                  birthday='$birthday',
                  enrolledYear='$enrolledYear'
                  WHERE username='$username'";

    if(mysqli_query($conn, $updateSql))
    {
        $message = "Profile Updated Successfully";
    }
    else
    {
        $message = "Update Failed";
    }
}

// Get current data
$sql = "SELECT * FROM students WHERE username='$username'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Profile</title>

    <style>

        body{
            font-family:Arial;
            background:#f4f4f4;
        }

        .container{
            width:400px;
            margin:50px auto;
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        input{
            width:100%;
            padding:10px;
            margin-top:10px;
        }

        button{
            width:100%;
            padding:12px;
            margin-top:15px;
            background:blue;
            color:white;
            border:none;
        }

    </style>

</head>

<body>

<div class="container">

    <h2>Student Profile</h2>

    <div >
        <lable>Username: </label>
        <p><?php echo $username; ?></p><br><br>
        <lable>Name: </label>
        <p><?php echo $row['firstName'] . " " . $row['lastName']; ?></p><br><br>
        <lable>Birthday: </label>
        <p><?php echo $row['birthday']; ?></p><br><br>
        <lable>Enrolled Year: </label>
        <p><?php echo $row['enrolledYear']; ?></p><br><br>
    </div>

    <form method="POST">

        <input type="text"
        name="firstName"
        placeholder="First Name"
        value="<?php echo $row['firstName']; ?>">

        <input type="text"
        name="lastName"
        placeholder="Last Name"
        value="<?php echo $row['lastName']; ?>">

        <input type="date"
        name="birthday"
        value="<?php echo $row['birthday']; ?>">

        <input type="number"
        name="enrolledYear"
        placeholder="Enrolled Year (YYYY)"
        value="<?php echo $row['enrolledYear']; ?>">

        <button type="submit" name="update">
            Update Profile
        </button>

    </form>

    <p style="color:green;">
        <?php echo $message; ?>
    </p>

    <div>
        <input type="button" value="Back to Dashboard" onclick="window.location.href='../studentDashboard.php'">
    </div>

</div>

</body>
</html>