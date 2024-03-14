<?php
  session_start();

  include_once('../config/connect.php');

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Phonebook</title>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 mt-5">
                    <h3 class="text-center">Phonebook</h3>

                    <div class="mt-3">
                        <?php if (isset($_SESSION['log_in'])) { ?>
                            <button class="btn btn-secondary mr-2" id="logout">Logout</button>
                        <?php } else { ?>
                            <button class="btn btn-secondary mr-2" id="login">Login</button>
                        <?php } ?>
                        <button class="btn btn-secondary" id="phonebooks">Public Phonebook</button>
                        <?php if (isset($_SESSION['log_in'])) { ?>
                            <button class="btn btn-secondary mr-2" id="myContact">My Contact</button>
                        <?php } ?>
                    </div>

                    <div id="mainBlock"></div>

                    <?php if (isset($_SESSION['error'])) { ?>
                        <div class="mt-5"><?php echo $_SESSION['error'] ?></div>
                    <?php } ?>
                </div>
            </div>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <script>
            
            $(document).ready(function(){
                // Functions to load login form using Ajax
                $("#login").click(function(){
                    $.ajax({
                        url: "includes/login_form.php",
                        success: function(response){
                            $("#mainBlock").html(response);
                        }
                    });
                });

                $("#phonebooks").click(function(){
                    $.ajax({
                        url: "includes/phonebooks.php",
                        success: function(response){
                            $("#mainBlock").html(response);
                        }
                    });
                });

                $("#myContact").click(function(){
                    $.ajax({
                        url: "includes/my_contact.php",
                        success: function(response){
                            $("#mainBlock").html(response);
                        }
                    });
                });

                $("#logout").click(function(){
                    $.ajax({
                        url: "/phonebook/models/user.php?function=logout",
                        success: function(response){
                            location.reload();
                        }
                    });
                });
            });
        </script>
    </body>
</html>