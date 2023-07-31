<?php
session_start();
include('includes/headerlog.php');
include('dbcon.php');
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <?php
            if (isset($_SESSION['status'])) {
                echo "<h5 class='alert alert-success'>" . $_SESSION['status'] . "</h5>";
                unset($_SESSION['status']);
            }
            ?>
            <div class="card">
                <div class="card-header">
                    <h4>
                        Edit User
                        <a href="userlist.php" class="btn btn-danger float-end">Kembali</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST">

                    <?php
                    include('dbcon.php');
                    if(isset($_GET['id']))
                    {
                        $uid = $_GET['id'];
                        try{
                            $user = $auth->getUser($uid);
                            ?>
                            <input type="hidden" name="user_id" value="<?=$uid;?>">
                            <div class="form-group mb-3">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap_tampil" value="<?=$user->displayName;?>" required="" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                            <button type="submit" name="update_user_btn" class="btn btn-primary form-control">Ganti</button>
                            </div>
                            <?php

                        } catch (\kreait\Firebase\Exception\Auth\UserNotFound $e){
                            echo $e->getMessage();
                    }
                    
                    }
                    ?>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

<?php
include('includes/footer.php');
?>