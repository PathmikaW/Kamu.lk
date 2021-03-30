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
    <link rel="stylesheet" href="../assets/css/driver/dash.css">
    <title>Contact Admin</title>
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
    <div class="driver-dashboard">
        <?php include('dash-include/contact_admin_nav.php'); ?>
        <div class="content">
            <div class="container">
                <a href="accept-orders" class="card" id="card1" style="display: block;">
                    <i class="fas fa-inbox"></i>
                    <div class="container">
                        <h4><b>Accept Orders</br></b></h4>
                    </div>
                </a>

                <a href="earnings" class="card" id="card3" style="display: block;">
                    <i class="fas fa-money-check-alt"></i>
                    <div class="container">
                        <h4><b>Earnings</br></b></h4>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="food-form form-container">
                 <h2 style="text-transform: capitalize; margin-left: 400px;" >Contact Administrator</h2><br>
                <form class="form" action="../driver/contact-admin?id=<?php echo $_SESSION['loggedin']['user_id'];?>" method="post">
                    <div class="form-group">
                        <label>Subject</label>
                            <input class="form-control" type="text"  name="subject" size="50"
                                    value="" autocomplete="off" placeholder="Enter Your Subject" required><br>
                        <label>Message</label>
                        <textarea class="form-control" name="message" placeholder="Message" 
                            style="display: block; border: 2px solid #ccc; width: 95%; padding: 6px; margin: 5px auto;border-radius: 5px;" required></textarea><br>                        
                    </div>
                    <input class="button" type="submit" name='submit2' value="submit" size="25">
                    <input class="button" type="reset" value="reset" size="25">
                </form>
            </div>
    </div>

    

</body>

</html>