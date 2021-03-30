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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;0,800;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../assets/css/user/form.css">

    <link rel="stylesheet" href="../assets/css/user/dash.css">
    <title>User Dashboard</title>
</head>
<body>
    <div class="user-dashboard">
        <?php include('dash_include/nav.php'); ?>

     <div class="content">
            <div class="food-form form-container">
                <h2 style="text-transform: capitalize;text-align:center;">Share your Post</h2><br>
                <form class="form" action="../user/update-post?post_id=<?php echo $post_id;?>" method="post">
                    <div class="form-group">
                        
                        <label>Title</label>
                            <input class="form-control" type="text" name="title" size="50"
                                    value="<?php echo $title;?>" autocomplete="off" placeholder="Title" required><br>
                        <label>Message</label>
                        <input class="form-control" name="message" value="<?php echo $message;?>" autocomplete="off" required></input><br>

                        <label>Upload your document</label>
                            <input name="file" type="file" accept="image/jpg"placeholder="Choose"><br>
                    </div>

                    <input class="button" type="submit" name='submit2' value="Update" size="25">
                    
                </form>
            </div>

        </div>  
        
</div>

</body>
</html>
