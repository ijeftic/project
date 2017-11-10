<!DOCTYPE html>

<html>
    <head>
        <meta charset="windows-1252">
        <title>Login page</title>

        <!-- Latest compiled and minified CSS -->
        <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    </head>

    <body>
        <?php include_once('includes/navigation.php') ?>
        
        <div class="container">    

            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center" style="border: 1px solid #000;">

                    <form action="backend/login.php"   method="POST" style="padding: 10px;">

                        <label>Login page:</label><br/>

                        <input type="text" name="email" placeholder="Email"  required /><br/><br/>

                        <input type="password" name="password" placeholder="Password"  required /><br/><br/>

                        


                        <input type="submit" name="submit" value="Submit" />

                    </form>

                </div>
            </div><!-- row-->

        </div>


    </body>
</html>