<?php 
session_start();
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
                                    <form class="user" action="save_user.php" method="POST">
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
?>