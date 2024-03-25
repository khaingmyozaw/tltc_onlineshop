<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

    <title>Giftos create account</title>

    <!-- <link rel="stylesheet" href="css/style.css"/> -->

  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/kmz.css"/>

</head>
<body>
    <div class="container-fluid">

        <!-- Home Page Section Start -->
        <section id="register">

            <div class="container my-5 p-4 rounded shadow-sm bg-self" style="max-width: 650px;">
                
                <h4>GIFTOS (Register)</h4>
                <hr/>

                <!-- Register Form Start  -->
                <form action="_actions/create.php" method="post">

                    <!-- row section start  -->
                    <div class="row">
                        <!-- Name sectio start -->
                        <div class="col-12">
                            
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Enter your full name" autocomplete="off" required>
                            </div> 
                            <br>
                        </div>
                        <!-- Name sectio end -->

                        <!-- Email and Phone start  -->
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" autocomplete="off" required>
                            </div> 
                            <br>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="phone" id="phone" name="phone" class="form-control" placeholder="Enter your phone" autocomplete="off" required>
                            </div> 
                            <br>
                        </div>
                        <!-- Email and phone end  -->


                        <!-- Age and gender start -->
                        <div class="col-12 col-md-6">
                            <div class="form-group">

                                <label for="age">Age:</label>
                                <input type="number" id="age" name="age" class="form-control" placeholder="Enter your age" autocomplete="off" required>
                            </div> 
                            <br>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">

                                <label for="gender">Gender:</label>
                                <select name="gender" id="gender" class="form-select">

                                    <option value="0" selected>Select gender</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="3">Other</option>

                                </select>

                            </div> 
                            <br>
                        </div>
                        <!-- Age and gender end -->

                        <!-- Password section start -->
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" autocomplete="off" required>
                            </div> 
                            <br>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="confirm-password">Confirm password:</label>
                                <input type="password" id="confirm-password" name="confirm-password" class="form-control" placeholder="Confirm your password" autocomplete="off" required>
                            </div> 
                            <br>
                        </div>
                        <!-- Password section end -->

                        <!-- address section start -->
                        <div class="col-12">
                            <div class="form-group">

                                <label for="address">City:</label>
                                <input type="text" id="address" name="address" class="form-control" placeholder="Enter your city name" autocomplete="off" required>
                                <br>
                            </div>

                            <div class="form-group">

                                <label for="full-addr">Full address (optional):</label>
                                <textarea name="full-address" id="full-address" class="form-control" cols="30" rows="5" placeholder="Enter your full address" autocomplete="off"></textarea>

                            </div>
                            <br>
                        </div>
                        <!-- address section end -->

                        <div class="col-12">
                            <input type="checkbox" name="checkbox" id="checkbox" class="form-check-input me-2" required>
                            <label for="checkbox" style="font-size: 12px;">Do you agree our <a href="#">terms and policys</a>?</label>
                            <br>
                        </div>
                    </div>
                    <!-- row section end  -->

                    <button type="submit" class="btn w-100 my-3 btn-self">Register</button>

                </form>
                
                <p>Do you already have an account? <a href="login.php">Login here</a></p>

                <!-- register form end  -->

            </div>

        </section>
        <!-- home page section end -->

    </div>
</body>
</html>