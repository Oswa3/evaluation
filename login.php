<?php 
session_start();
include('includes/conn.php');
include('includes/header.php');
?>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Here</h1>
                                        <?php
                                        
                                         if (isset($_SESSION['status'])&& $_SESSION['status'] != '') {
                                           echo '<h2>'.$_SESSION['status'].'</h2>';
                                           unset($_SESSION['status']);
                                         }
                                        
                                        ?>
                                    </div>
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <input type="id" name="school_id" class="form-control form-control-user" placeholder="Enter School Id">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                   placeholder="Enter Password">
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div
<?php

include('includes/scripts.php');

 //Database connection included
if (isset($_POST['login'])) {

    $schoolid_login = $_POST['school_id'];
    $password_login = $_POST['password'];
    
    $qry = mysqli_query($conn,"SELECT * FROM teacher_list WHERE school_id = '$schoolid_login' AND password = '$password_login' ");
    
    $row = mysqli_fetch_array($qry);
    if ($row<1) 
    {
        // not an admin, check registration table
        $schoolid_login = $_POST['school_id'];
        $password_login = $_POST['password'];
        
        $qry = mysqli_query($conn, "SELECT * FROM new_student WHERE school_id ='$schoolid_login' AND password = '$password_login' ");
        $row = mysqli_fetch_array($qry);
        if ($row<1) 
        {
           $_SESSION['status'] = 'Invalid ID or Password';
    header('Location: login.php');
        }
        else
        {
            $_SESSION['username'] = $schoolid_login;
            header('Location: student/index.php');
        }
    }
    else
    {
          $_SESSION['username'] = $schoolid_login;
    header('Location: Faculty/index.php');
    }
}

?>