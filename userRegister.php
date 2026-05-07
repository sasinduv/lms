<?php

require_once 'conn.php';

$message = "";

if(isset($_POST['register']))
{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);

    $hashed_password = hash('sha256', $password);

    // Check username already exists
    $check = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $check);

    if(mysqli_num_rows($result) > 0)
    {
        $message = "Username already exists!";
    }
    else
    {
        // Insert into users table
        $sql = "INSERT INTO users(username,password,role)
                VALUES('$username','$hashed_password','$role')";

        if(mysqli_query($conn, $sql))
        {

            // If student create empty profile row
            if($role == "student")
            {
                $studentSql = "INSERT INTO students(username)
                               VALUES('$username')";

                mysqli_query($conn, $studentSql);
            }

            $message = "User Registered Successfully";
        }
        else
        {
            $message = "Registration Failed";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Register</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f4f4;
        }

        .container{
            width:350px;
            margin:80px auto;
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        h2{
            text-align:center;
            margin-bottom:20px;
        }

        input, select{
            width:100%;
            padding:10px;
            margin-top:10px;
            border:1px solid #ccc;
            border-radius:5px;
        }

        button{
            width:100%;
            padding:12px;
            margin-top:20px;
            background:#007bff;
            color:white;
            border:none;
            border-radius:5px;
            cursor:pointer;
            font-size:16px;
        }

        button:hover{
            background:#0056b3;
        }

        .message{
            text-align:center;
            color:green;
            margin-top:10px;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>User Register</h2>

    <form method="POST">

        <input type="text" name="username" placeholder="Enter Username" required>

        <input type="password" name="password" placeholder="Enter Password" required>

        <select name="role" required>
            <option value="">Select Role</option>
            <option value="student">Student</option>
            <option value="admin">Admin</option>
        </select>

        <button type="submit" name="register">Register</button>

    </form>

    <div class="message">
        <?php echo $message; ?>
    </div>
    <div style="text-align:center; margin-top:10px;">
        <a href="login.php">Back to Login</a>
    </div>

</div>

</body>
</html>