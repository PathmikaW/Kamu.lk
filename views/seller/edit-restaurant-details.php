<?php
    session_start();
    if(!isset($_SESSION['loggedin'])) {
        header('Location: ../auth/login');
        die();
    }
?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;0,800;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/seller/dash.css">

    <title>Edit restaurant Details</title>
    <style>
            .form-container {
            width: 100%;
            margin-left: 25%;
            background-color: #f2f2f2;
            padding: 40px;
            min-height: 80%;
            box-shadow: -10px 7px white;

        }

        .food-form .form {
            align-self: center;
            width: 50%;
            height: 60%;
            background: #ffffff;
            border-radius: 8px;
            padding: 25px 35px;
            display: inline-block;
            margin-left: 150px;
        }

        .food-form h2 {
            text-align: left;
            color: #000000;
            text-transform: capitalize;
        }

        .food-form label {
            font-weight: bold;
        }

        .food-form input {

            width: 100%;
            padding: 15px;
            background: none;
            outline: none;
            resize: none;
            border: 0;
            font-family: 'Montserrat', sans-serif;
            border-bottom: 2px solid #000000;

        }

        .food-form .button {
            margin: 40%, 20%, 20%, 40%;
            border-radius: 15px;
            background-color: rgb(0, 0, 0);
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            font-size: 20px;
            margin: 4px 2px;
        }

        .food-form .button:hover {
            background-color: rgb(255, 255, 255);
            color: rgb(0, 0, 0);
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
    </style>




</head>

<body>
    <div class="seller-dashboard">
        <?php include('dash-include/edit_restaurant_details_nav.php'); ?>
        <div class="content">
            <div class="container">
                <a href="view-order" class="card" id="card1" style="display: block;">
                    <i class="fas fa-sort-amount-up-alt"></i>
                    <div class="container">
                        <h4><b>Orders</br><?php echo $count['count(*)'] ?></b></h4>
                    </div>
                </a>
                <a href="view-food-item" class="card" id="card2" style="display: block;">
                    <i class="fas fa-cloud-meatball"></i>
                    <div class=" container">
                        <h4><b>Food Items</br></b></h4>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="food-form form-container">

        <h2 style="text-transform: capitalize; display: inline-block; width: 250px; height: 25px; margin-left: 450px;"> My Restaurant</h2><br>

        <form class="form" action="../seller/edit-restaurant-details?id=<?= $id; ?>" method="post">
            <div class="form-group">
                <!-- <label>Restaurant ID</label>
                <input class="form-control" type="text" name="id" size="50" value="<?php echo $id; ?>" autocomplete="off"  readonly><br> -->
                <label>Seller Name</label>
                <input class="form-control" type="text" name="sellername" size="50" value="<?php echo $seller_name; ?>" placeholder="" required><br>
                <label>Restaurant Name</label>
                <input class="form-control" type="text" name="resname" size="50" value="<?php echo $res_name; ?>" placeholder="" required><br>
                <span class="invalidFeedback">
                    <?php echo $usernameError; ?>
                </span><br>
                <label>Restaurant Address</label>
                <input class="form-control" type="text" name="resaddress" size="50" value="<?php echo $res_address; ?>" placeholder="
                " required><br>
                <span class="invalidFeedback">
                    <?php echo $emailError; ?>
                </span><br>
                                               
                <label>Contact Number</label>
                <input class="form-control" type="text" name="tele" size="50" value="<?php echo $tele; ?>" placeholder="Enter Your Contact number here" required><br>
                <label>E-mail</label>
                <input class="form-control" type="text" name="email" size="50" value="<?php echo $email; ?>" placeholder="" required><br>
            </div>
            <input class="button" type="submit" name='submit2' value="Update Restaurant Details" size="25"><br>
        </form>
    </div>

</body>

</html>