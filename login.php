<?php
    if(isset($_COOKIE['email_username'])&&($_COOKIE['password'])){

        $id= $_COOKIE['email_username'];
        $pass= $_COOKIE['password'];

    }else{
        $id= "";
        $pass= "";
    }
?>


<html lang="en">
    <head>
        <title>Social Network</title>
        <link rel="stylesheet", href="style.css">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>



    </head>

    <body>
        <div align="center">
        <div class="wrapper">
            <section class="form login">
                <header>Social Network</header>
                <form action="#">
                    <div class="error-txt"></div>
                    <div class="name_details">
                        <div class="field">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="Email" value="<?php echo $id?>">
                        </div>
                        <div class="field">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Password" value= "<?php echo $pass?>">
                        </div>
                        <label>
                            <input type="checkbox" name="remember_me">Remember Me
                        </label>

                        <div class="field button">
                            <input type="submit" value="Login">
                        </div>
        
                       </div>   
                    </div>
                </form>
                <div class="link"><a href="index.php">Sign Up</a></div>
            </section>
        </div>
</div>
        <script src = "javascript/login.js"></script>
    </body>
</html>
