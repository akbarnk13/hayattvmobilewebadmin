<?php
include('includes/header.php');

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Edit & Update Acara
                        <a href="acara.php" class="btn btn-danger float-end"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
                                <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z" />
                                <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z" />
                            </svg> Kembali</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    include('dbcon.php');
                    if (isset($_GET['id'])) {
                        $keychild = $_GET['id'];
                        $ref_table = 'acara';
                        $getdata = $database->getReference($ref_table)->getchild($keychild)->getValue();
                        if ($getdata > 0) {
                    ?>
                            <form action="code.php" method="POST">
                                <input type="hidden" name="key" value="<?= $keychild; ?>">
                                <div class="form-group mb-3">
                                    <label for="">Nama Kategori</label>
                                    <input type="text" name="namaac" value="<?= $getdata['nama']; ?>" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Pilih Kategori :</label>
                                </div>
                                <div class="form-group mb-3">
                                    <select name="kategori" value="<?= $getdata['kategori']; ?>" class="form-control">
                                        <?php
                                        include('dbcon.php');
                                        $ref_table = 'kategori';
                                        $fetchdata = $database->getReference($ref_table)->getValue();
                                        foreach ($fetchdata as $row) { ?>
                                            <option <?= $row['nama'] == $getdata['kategori'] ? 'selected' : '' ?>><?= $row['nama']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" name="update_acara" class="btn btn-primary ">Ubah</button>
                                </div>
                            </form>
                    <?php
                        } else {
                            $_SESSION['status'] = "Data Invalid";
                            header('Location: acara.php');
                            exit();
                        }
                    } else {
                        $_SESSION['status'] = "Tidak Ditemukan";
                        header('Location: acara.php');
                        exit();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
include('includes/footer.php');
?>