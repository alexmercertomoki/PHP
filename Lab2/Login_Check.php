<!DOCTYPE html>

<html>
    <head>
        <style>

            b {
            color : steelblue;
            }

        </style>

    </head>



    <body>

        <?php

                if($_POST["name"] == "admin" &&  $_POST["password"] == "abc123"){
                        echo "<b>Welcome! you login successfully !</b>";
                } else {
                        echo " <b>Username or Password Wrong !</b> ";
                }

        ?>

    </body>

</html>
