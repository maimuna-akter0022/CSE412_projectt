
<?php
    session_start();
    
    $error_message = 'off';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $email = $_POST["email"];
        $password = hash('sha256',$_POST['password']);
        $lname = $_POST['lname'];
        $fname =$_POST['fname'];

        $link = mysqli_connect("localhost", "root", "", "learnypy");
 
        // Check connection
        if(!$link){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

      
        $sql = "INSERT INTO student_info (student_fname, student_lname, student_email,student_password) VALUES ('$fname', '$lname', '$email','$password')";
        if(mysqli_query($link, $sql)){
            
                $_SESSION['active_status'] = 1 ;
                $_SESSION['user_name'] = $fname;
                header("Location: ./index.php");
                exit();

        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        
    
       
        
    }

    
 
  
    if ( isset($_SESSION['active_status'])  ) {
        header("Location: ./index.php");
        exit();
    }
    
    
?>












<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnyPy</title>

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="../style/style.css">

    <!-- IconScout CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- Google Font Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/ca603e05a0.js" crossorigin="anonymous"></script>
</head>
<body>
    <!--------------------------------------- Navigation Bar ------------------------------------->
    <?php include 'header.php';?>
    <!----------------------------------------- End Nav Bar --------------------------------------->
    <br>

    <section class="form__section">
        <div class="container form__section-container">
            <h2>Sign Up</h2>
            <div class="alert__message error">
                <p>This is an error message</p>
            </div>
            <form action="signup.php" method="POST">
                <input type="text" placeholder="First Name" name = 'fname'>
                <input type="text" placeholder="Last Name" name = 'lname'>
                <!-- <input type="text" placeholder="Username"> -->
                <input type="email" placeholder="Email" name = 'email'>
                <input type="password" placeholder="Password" name = 'password'>
                <!-- <input type="password" placeholder="Confirm Password" > -->
                <!-- <div class="form__control">
                    <label for="avatar">User Profile Picture</label>
                    <input type="file" id="avatar">
                </div> -->
                <button class="btn" type="submit">Sign Up</button>
                <small>Already have an account? <a href="./signin.html">Sign In</a></small>
            </form>
        </div>

    </section>
</body>

</html>