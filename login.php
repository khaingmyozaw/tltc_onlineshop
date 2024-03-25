<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

    <title>Giftos login</title>

    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/kmz.css"/>

</head>
<body>
    <div class="container-fluid">
        
        <section id="register" class="">

            <div class="container my-5 p-4 rounded shadow-sm bg-self" style="max-width: 600px;">
        
                <h4>Giftos (Login)</h4>
                
                <?php if(isset($_GET['register'])) : ?>
                <p class="fs-6 text-success bg-light rounded p-2">Account created successfull. Please login.</p>    
                <?php endif ?>

                <?php if(isset($_GET['invalid'])) : ?>
                <p class="fs-6 text-warning bg-light rounded p-2">Invalid email or password.</p>
                <?php endif ?>

                <hr>   

                <form action="_actions/login.php" method="post">
                    

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" autocomplete="off" required>
                    </div> 
                    <br>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" autocomplete="off" required>
                    </div> 
                    <br>

                    <button type="submit" class="btn w-100 my-3 btn-self">Login</button>
                

                </form>
                
                <p>Don't you have an account? <a href="register.php">Register here</a></p>
            
            </div>
        
        </section>
    </div>
</body>
</html>