<?php
// Locking Admin file 
if(!isset($_SESSION)){
    session_start();
}
include_once('../dbConnection.php');
if(isset($_SESSION['is_login'])){
    $stuLogEmail = $_SESSION['stuLogEmail'];
}
else{
   echo "<script> location.href='../index.php'; </script>";
}
if(isset($stuLogEmail)){
    $sql = "SELECT stu_img FROM student WHERE stu_email = '$stuLogEmail'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $stu_img = $row["stu_img"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="website icon" type="png" href="../image/Logo/user.png">

    <!---Bootstrap CSS--->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <!---Font Awosome CSS--->
    <link rel="stylesheet" type="text/css" href="../css/all.min.css">

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" type="text/css" rel="stylesheet">

    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <!--Custom CSS-->
    <link rel="stylesheet" href="../css/adminstyle.css">

    <!--Testimonials-->
    <link rel="stylesheet" type="text/css" href="../css/Testimonial.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
     
</head>
<body>
    
    <!-- Top Navbar -->
   <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow" style="background-color: #225470;">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="studentProfile.php">EduTech</a>
   </nav>

<!-- Side Bar -->
<div class="container_fluid mb-5" style="margin-top:40px;">
    <div class="row">
        <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item mb-3">
                        <img class="img-thumbnail rounded-circle" src="<?php echo $stu_img?>" alt="studentimage">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">
                            <i class="fas fa-home"></i>
                            Home Page
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="studentProfile.php">
                            <i class="fas fa-user"></i>
                            Profile
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="myCourse.php">
                            <i class="fab fa-accessible-icon"></i>
                            My Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="stufeedback.php">
                            <i class="fab fa-accessible-icon"></i>
                            Feedback
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="studentChangePass.php">
                            <i class="fas fa-key"></i>
                            Change Password
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
</body>
</html>