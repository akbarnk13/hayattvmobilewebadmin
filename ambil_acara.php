<?php

include('authentication.php');
include('includes/header.php');
?>

<div class="container">
    <div class="row">

        <div class="col-md6- mb-3">
            <div class="card">
                <div class="card-body">
                    <h7>Total Jumlah Acara :
                        <?php
                        include('dbcon.php');
                        $ref_table = 'acara';
                        $total_jadwal = $database->getReference($ref_table)->getSnapshot()->numChildren();
                        echo $total_jadwal;
                        ?>
                    </h7>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-3">

            <?php
            if (isset($_SESSION['status'])) {
                echo "<h5 class='alert alert-success'>" . $_SESSION['status'] . "</h5>";
                unset($_SESSION['status']);
            }
            ?>

            <div class="card">
                <div class="card-header">
                    <h4>
                        Pilih Program Acara
                    </h4>
                </div>
                <div class="card-body">


                    <table class="table table-bordered-striped">

                        <head>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                        </head>
                        <tbody>
                            <?php
                            include('dbcon.php');
                            $ref_table = 'acara';
                            $fetchdata = $database->getReference($ref_table)->getValue();

                            if ($fetchdata > 0) {
                                $i = 1;
                                foreach ($fetchdata as $key => $row) {
                            ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= $row['kategori'] ?></td>
                                        <td>
                                        
                                            <a href="senin-add-jadwal.php?id=<?= $key; ?>" class="btn btn-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg> Ambil</a>

                                        </td>
                                        <td>
                                            <!-- <a href="hapus-jadwal.php" class="btn btn-primary btn-sm">Hapus</a> -->
                                        </td>
                                    </tr>
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
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>