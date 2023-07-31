<?php
session_start();
if(isset($_SESSION['verified_user_id']))
{
    $_SESSION['status'] = "Kamu sudah LogIn";
    header("Location : index.php");
    exit();
}

include('includes/headerlog.php');
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
                    <h4 class="text-center">
                        LUPA PASSWORD?
                    </h4>
                </div>
                <div class="card-body">
                    <form action="logincode.php" method="POST">

                        <div class="form-group mb-3">
                        <p>Masukan Email dan kami akan mengirimkan informasi untuk memulihkan akun anda</p>
                            <label for="">Email :</label>
                            <input type="email" name="email" required="" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" name="resetpass" class="btn btn-primary form-control">Reset Password</button>
                        </div>
                    </form>

                </div>
            </div>
            </div>
    </div>

</div>
<?php
include('includes/footer.php');
?>