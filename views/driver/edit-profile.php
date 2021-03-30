<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;0,800;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/driver/dash.css">
    <title>Edit Driver Profile</title>

    <style>
        #myDIV {
            width: 100%;
            padding: 40px 40px;
            text-align: left;
            background-color: rgb(226, 230, 231);
            margin: 10px;
        }

        #myDIV1 {
            width: 100%;
            padding: 40px 40px;
            text-align: left;
            background-color: rgb(226, 230, 231);
            margin: 10px;
        }

        #myDIV2 {
            width: 100%;
            padding: 40px 40px;
            text-align: left;
            background-color: rgb(226, 230, 231);
            margin: 10px;
        }

        /* food form css      */
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

        /* form */

        .form-container {
            width: 100%;
            background-color: #f2f2f2;
            padding: 40px;
            min-height: 80%;
            box-shadow: -10px 7px gray;
            border: 1px solid black;
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

        .w80 {
            width: 80%;
        }


        .w60 {
            width: 60%;
        }

        .w40 {
            width: 40%;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        #sub-form .row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
            grid-gap: 15px;
            align-items: center;
            /* display: flex;
                    justify-content: space-between;
                    align-items: center; */
        }


        .issue-note-form #sub-form .row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
            grid-gap: 15px;
            align-items: center;
            /* display: flex;
                    justify-content: space-between;
                    align-items: center; */
        }

        button {
            background-color: black;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
    </style>


</head>

<body>
    <div class="driver-dashboard">
        <?php include('dash-include/edit_profile_nav.php'); ?>
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




</body>

</html>