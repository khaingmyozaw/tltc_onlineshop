
<?php 

    include("vendor/autoload.php");

    use Helpers\Auth;
    use Helpers\HTTP;
    use Libs\MySQL;
    
    $user = Auth::check();

    $date = explode(" ", $user->created_at);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile page</title>

    <link rel="stylesheet" href="css/kmz.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <style>

        .cover {
            height: 130px;
            position: relative;
            background-color: #db4f66;

            img {
                width: 120px;
                height: 120px;
                border-radius: 50%;

                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%);
            }
            .icon {
            position: absolute;
                bottom: -45%;
                left: 52%;
            }
        }
        .icon {
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, .5);
        }

        .detail {
            background-color: #f9ece6;

            .icon {
                position: relative;
                left: 50%;
                bottom: -20px;
                transform: translate(-50%);
                z-index: 10;
            }
        }


    </style>

</head>

<?php if($user): ?> <!-- check whether user is logged in if not back to index page -->
    
    <body>
    
        <div class="container p-0 d-flex align-items-center justify-content-center" style="max-width: 600px;">
            

            <!-- Profile Details Section Start -->
            <div class="row w-100">
                
                <!-- profle image section or header section start -->
                <div class="col-12 cover">
                    <img src="_classes/photos/man1.avif" alt="profile image">
                    
                    <button class="btn fs-6 d-flex align-items-center justify-content-center rounded-pill icon" onclick="chooseProfile()">
                            <i class="fa-regular fa-pen-to-square"></i>
                    </button>
                </div>
                <!-- profle image section or header section end -->

    
                <!-- Account information section start -->
                <div class="col-12 py-5 detail">
    
                    <form action="_actions/edit.php" method="post">
    
                        <div class="list-group mt-5 mb-3">
                            
                        <!-- edit button start -->
                        <button class="btn fs-6 d-flex align-items-center justify-content-center rounded-pill icon" type="button" onclick="editData()">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </button>
                        <!-- edit button end -->

                        <!-- name start -->
                            <div class="list-group-item">
                                <label for="name" class="text-muted">Name:</label>
                                 <input type="text" name="name" class="form-control"  autocomplete="off" 
                                 value="<?= $user->name ?>" disabled>
                            </div>
                        <!-- name end -->

                        <!-- age and gender start  -->
                            <div class="list-group-item">
                                <label for="name" class="text-muted">Age / Gender:</label>
                                <input type="text" name="name" class="form-control"  autocomplete="off" 
                                    value="<?= $user->age ?>" disabled required>
                                
                                <!-- selection section show if whether user is male or female start -->
                                <select name="gender" id="gender" class="form-select  stable-select" disabled required>
                                    
                                    <?php
                                        switch ($user->gender){
                                            case(1): 
                                    ?>
                                            <option value="1" selected>Male</option>
                                            
                                    <?php 
                                        break;
                                        case(2): 
                                    ?>
                                            <option value="2">Female</option>
                                                
                                    <?php 
                                        break;
                                        case(3): 
                                    ?>
                                            <option value="3">Other</option>
                                    <?php break; }?>
    
                                </select>
                                    
                                <!-- selection section show if whether user is male or female end -->
                            </div>
                        <!-- age and gender end  -->

                        <!-- phone number start  -->
                            <div class="list-group-item">
                                <label for="phone">Phone:</label> 
                                <input type="phone" name="phone" class="form-control" autocomplete="off"
                                value="<?= $user->phone ?>" disabled required>
                            </div>
                        <!-- phone number end -->

                        <!-- email start -->
                            <div class="list-group-item">
                                <label for="email">Email:</label> 
                                <input type="email" name="email" class="form-control" autocomplete="off"
                                value="<?= $user->email ?>" disabled required>
                            </div>
                            <!-- email end -->

                        <!-- city and full address start  -->
                            <div class="list-group-item">
                            <label for="address">City:</label> 
                                <input type="text" name="address" class="form-control" autocomplete="off"
                                value="<?= $user->address ?>" disabled required>
                            </div>
                            <div class="list-group-item">
                                <label for="full-address">Full address:</label> 
                                <textarea name="full-address" id="full- " class="form-control" cols="30" rows="5" autocomplete="off" disabled><?= $user->full_address ?>
                                </textarea>
                            </div>
                        <!-- city and full address end -->
        
                        </div>
    
                        <!-- update user data after edited -->
                        <button class="btn btn-info text-light my-3 w-100" type="button">Update</button>
                        
                        <!-- delete the user and go to index page -->
                        <a href="_actions/delete.php" class="btn btn-sm btn-outline-danger w-100">Delete</a>
    
                    </form>
                </div>
                <!-- account information section end -->

            </div>
            <!-- Profile Details Section End -->


            <!-- Alert Box When User is Click Edit button for Profile Images Start -->
            <div class="position-absolute top-0 d-none profile-page" style="max-width: 600px; z-index: 2;">


                <!-- menu section that can be choen profile images start -->
                <div class="row w-100 p-3 my-4 mx-auto bg-light rounded">
                    <div class="col-12">
                         <button onclick="closeWindow()" class="btn btn-sm fs-5 float-end">
                         <i class="fa-solid fa-xmark"></i>
                         </button>
                    </div>
                        
                    <hr>
                        
                        <div class="col-3 my-2">
                            <a href="#" class="btn">
                                <img src="_classes/photos/man3.avif" alt="profile image" class="rounded-pill" style="width: 60px; height: 60px;">
                            </a>
                        </div>
                        
                        
                        <div class="col-3 my-2">
                            <a href="#" class="btn">
                                <img src="_classes/photos/man4.avif" alt="profile image" class="rounded-pill" style="width: 60px; height: 60px;">
                            </a>
                        </div>
                        
                        <div class="col-3 my-2">
                            <a href="#" class="btn">
                                <img src="_classes/photos/man5.avif" alt="profile image" class="rounded-pill" style="width: 60px; height: 60px;">
                            </a>
                        </div>
                        
                        <div class="col-3 my-2">
                            <a href="#" class="btn">
                                <img src="_classes/photos/woman1.avif" alt="profile image" class="rounded-pill" style="width: 60px; height: 60px;">
                            </a>
                        </div>
                        
                        
                        <div class="col-3 my-2">
                            <a href="#" class="btn">
                                <img src="_classes/photos/woman2.avif" alt="profile image" class="rounded-pill" style="width: 60px; height: 60px;">
                            </a>
                        </div>
                        
                        <div class="col-3 my-2">
                            <a href="#" class="btn">
                                <img src="_classes/photos/woman3.avif" alt="profile image" class="rounded-pill" style="width: 60px; height: 60px;">
                            </a>
                        </div>
                        
                        <div class="col-3 my-2">
                            <a href="#" class="btn">
                                <img src="_classes/photos/woman4.avif" alt="profile image" class="rounded-pill" style="width: 60px; height: 60px;">
                            </a>
                        </div>
                        
                        
                        <div class="col-3 my-2">
                            <a href="#" class="btn">
                                <img src="_classes/photos/woman5.avif" alt="profile image" class="rounded-pill" style="width: 60px; height: 60px;">
                            </a>
                        </div>
                        
                        <div class="col-3 my-2">
                            <a href="#" class="btn">
                                <img src="_classes/photos/man2.avif" alt="profile image" class="rounded-pill" style="width: 60px; height: 60px;">
                            </a>
                        </div>
    
                    </div>
                    
                </div>
                <!-- menu section that can be choen profile images start -->


                <!-- Transparent background that can close the alert box when was clicked start  -->
                <div class="position-absolute top-0 left-0 w-100 h-100 d-none close-div" style="background: rgba(0, 0, 0, 0.5);" onclick="closeWindow()"></div>
                <!-- Transparent background that can close the alert box when was clicked -->
                

            </div>
            <!-- Alert Box When User is Click Edit button for Profile Images End -->




        <!-- JAVASCRIPT SECTION -->
        <script src="https://kit.fontawesome.com/149adfc48b.js" crossorigin="anonymous"></script>
    
        <script>

            let page = document.querySelector("div.profile-page");
            let closeDev = document.querySelector("div.close-div");
            let textarea = document.querySelector("textarea");

            let select = document.querySelector("select");

            let listGroupItems = document.querySelectorAll(".list-group-item")

            let inputs = document.querySelectorAll("input");

            console.log(inputs);

            // => Show Alert Function
            function chooseProfile()
            {
                page.classList.remove("d-none");
                closeDev.classList.remove("d-none");
            }

            // => Hide Alert Function
            function closeWindow()
            {
                page.classList.add("d-none");
                closeDev.classList.add("d-none");
            }

            // => When data edit button is clicked
            function editData()
            {
                inputs.forEach(input => {
                    input.removeAttribute("disabled"); // make editable inputs
                });
                inputs[0].focus(); // make the first input focus

                textarea.removeAttribute("disabled"); // make enable
                select.removeAttribute("disabled"); // make enable

                listGroupItems.forEach( item => {
                    item.classList.add("list-group-item-success");
                });
               
            }

        </script>

    </body>

<?php 
    else:
        HTTP::redirect("index.php");
    endif 
?>
</html>

