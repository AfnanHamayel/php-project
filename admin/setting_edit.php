<?php
session_start() ;  
include('includes/header.php');
include('includes/navbar.php');
include __DIR__ . '/includes/db.php'; 

?>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT Admin Profile </h6>
        </div>
        <div class="card-body">
           

            <?php

            if (isset($_POST['edit_btn'])) {
                $id = $_POST['edit_id'];

                $query = "SELECT * FROM main_admin WHERE id='$id' ";
                $query_run = mysqli_query($mysqli, $query);

                foreach ($query_run as $row) {
            ?>

                    <form action="setting_code.php" method="POST">

                        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                        <div class="form-group">

                            <input type="hidden" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="form-group">

                            <input type="hidden" name="edit_password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Enter Password">
                        </div>

                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" name="oldpassword" class="form-control" placeholder="Enter your Old Password">
                        </div>

                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" name="newpassword" class="form-control" placeholder="enter your New Password">
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm your Password">
                        </div>

                        <a href="setting.php" class="btn btn-danger"> CANCEL </a>
                        <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>

                    </form>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>

</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>