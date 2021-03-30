<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reply Messages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/admin/adminstyle2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/admin/adminstyle.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/admin/to-do.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/adminstyle-responsive.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/admin/styles.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/admin/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/admin/forms.css">
</head>

<body>
    <div class="admin-dashboard">
        <?php include('nav/nav2.php'); ?>
        <div class="content">
            <div class="user-form form-container">
                <h2 style="text-transform: capitalize;">Reply Message</h2><br>
                <form class="form" action="../admin/reply-add?id=<?php echo $inbox_id;?>" method="post">
                    <div class="form-group">
                        <label>InboxID</label>
                        <input class="form-control" type="text" name="inbox_id" size="50" value="<?php echo $from_id ;?>"
                            autocomplete="off" placeholder="Enter Name Here" required><br>
                        <label>From ID</label>
                        <input class="form-control" type="text" name="from_id" size="50" value="<?php echo $to_id ;?>"
                            autocomplete="off" placeholder="Enter Name Here" required><br>
                        <label>To ID</label>
                        <input class="form-control" type="text" name="to_id" size="50" value="<?php echo $to_id ;?>"
                            autocomplete="off" placeholder="Enter Name Here" required><br>
                        <label>Email</label>
                        <input class="form-control" type="text" name="email" size="50" value="<?php echo $email;?>"
                            autocomplete="off" placeholder="Enter Name Here" required><br>
                        <label>Subject</label>
                        <input class="form-control" type="text" name="subject" size="50" value="<?php echo $subject;?>"
                            autocomplete="off" placeholder="Enter the Subject" required><br>
                        <label>Reply</label>
                        <input class="form-control" type="text" step=1 name="reply" size="100"
                             autocomplete="off" placeholder="Enter the Reply" required><br>
                    </div>
                    <input class="button" type="submit" name='submit2' value="Reply" size="25">

                </form>
            </div>
        </div>
</body>

</html>