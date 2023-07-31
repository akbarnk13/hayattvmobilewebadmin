<?php
session_start();
include('includes/header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css" />
</head>

<?php
if (isset($_SESSION['status'])) {
    echo "<h5 class='alert alert-success'>" . $_SESSION['status'] . "</h5>";
    unset($_SESSION['status']);
}
?>

<body>
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h4>
                    Kritik & Saran
                </h4>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <table class="table table-striped table-hover table-bordered table-responsive" id="Users">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Kritik & Saran</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tanggal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('dbcon.php');
                            $ref_table = 'Users';
                            $fetchdata = $database->getReference($ref_table)->getValue();

                            if ($fetchdata > 0) {
                                $i = 1;
                                foreach ($fetchdata as $key => $row) {
                                    // Convert epoch timestamp to date
                                    $timestamp = $row['Tgl'] / 1000; // Convert milliseconds to seconds
                                    $date = date('d-m-Y', $timestamp);
                            ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['Kritik'] ?></td>
                                        <td><?= $row['Nama'] ?></td>
                                        <td><?= $row['Email'] ?></td>
                                        <td><?= $date ?></td>
                                        <td>
                                            <form action="code.php" method="POST">
                                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $key ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                    </svg>
                                                    Hapus
                                                </a>
                                                <div class="modal fade" id="hapus<?php echo $key ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Acara</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah anda ingin menghapus Kritik & Saran Dari <?php echo $row['Nama'] ?>, Email : <?php echo $row['Email'] ?>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" name="kritik_btn_hapus" value="<?= $key ?>" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    </tr>
                                    </form>
                            <?php
                                }
                            } else {
                            ?>
                                <tr>
                                    <td colspan="7">Tidak Ada Data Jadwal</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#Users').DataTable();
            });
        </script>
</body>

</html>