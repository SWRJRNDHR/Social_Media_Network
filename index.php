<html lang="en">
    <head>
        <title>Social Network</title>
        <link rel="stylesheet", href="style.css">
    </head>

    <body>
        <div align="center">
        <div class="wrapper">
            <section class="form signup">
                <header>Registration</header>
                <form action="#" enctype="multipart/form-data" autocomplete="off">
                    <div class="error-txt">Error Message</div>
                    <div class="name_details">
                        <div class="field input">
                            <label>first name</label>
                            <input type="text" name='fname' placeholder = "Enter your name" required>
                        </div>
                        <div class="field input">
                            <label>Last Name</label>
                            <input type="text" name = 'lname' placeholder="Last name" require>
                        </div>
                        <div class="field input">
                            <label>Email</label>
                            <input type="text" name = 'email' placeholder="Email" required>
                        </div>
                        <div class="field input">
                            <label>Password</label>
                            <input type="password" name = 'password' placeholder="Password" required>
                        </div>
                        <div class="field image">
                            <label>Image</label>
                            <input type="file" name = 'image' required>
                        </div>
                        <div class="field button">
                            <input type="submit" value="Register">
                        </div>
                    </div>
                </form>
                <div class="link">Already have an account?<a href="login.php">Login</a></div>
            </section>
        </div>
</div>

        <script src="javascript/signup.js"></script>


    </body>