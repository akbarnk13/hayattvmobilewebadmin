<?php
session_start();
include('dbcon.php');
// tambah user
if (isset($_POST['register_btn'])) {
    $namalengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userProperties = [
        'email' => $email,
        'emailVerified' => false,
        'password' => $password,
        'displayName' => $namalengkap,
    ];

    $createdUser = $auth->createUser($userProperties);

    if ($createdUser) {
        $_SESSION['status'] = "Daftar berhasil";
        header('Location: userlist.php');
        exit();
    } else {
        $_SESSION['status'] = "Daftar gagal";
        header('Location: userlist.php');
        exit();
    }
}

// update user
if (isset($_POST['update_user_btn'])) {
    $displayname = $_POST['nama_lengkap_tampil'];

    $uid = $_POST['user_id'];
    $properties = [
        'displayName' => $displayname,
    ];

    $updatedUser = $auth->updateUser($uid, $properties);

    if ($updatedUser) {
        $_SESSION['status'] = "Update berhasil";
        header('Location: userlist.php');
        exit();
    } else {
        $_SESSION['status'] = "Update gagal";
        header('Location: userlist.php');
        exit();
    }
}

// hapus user

if (isset($_POST['btn_hapus_user'])) 
{
    $uid = $_POST['btn_hapus_user'];
    
    try{
        $auth->deleteUser($uid);

        $_SESSION['status'] = "User Dihapus";
        header('Location: userlist.php');
        exit();

    } catch(Exception $e){

        $_SESSION['status'] = "id Tidak Ditemukan";
        header('Location: userlist.php');
        exit();
    }
}


// ini sesi HAPUS

if (isset($_POST['btn_hapus'])) {
    $del_id = $_POST['btn_hapus'];
    $ref_table = 'Minggu/' . $del_id;
    $deletequery_result = $database->getReference($ref_table)->remove();

    if ($deletequery_result) {
        $_SESSION['status'] = "Jadwal Dihapus!";
        header('Location: t_minggu.php');
    } else {
        $_SESSION['status'] = "Jadwal Gagal Dihapus!";
        header('Location: t_minggu.php');
    }
}

// HAPUS KRITIK

if (isset($_POST['kritik_btn_hapus'])) {
    $del_id_senin = $_POST['kritik_btn_hapus'];
    $ref_table_senin = 'Users/' . $del_id_senin;
    $deletequery_result = $database->getReference($ref_table_senin)->remove();

    if ($deletequery_result) {
        $_SESSION['status'] = "Kritik & Saran Dihapus!";
        header('Location: t_kritik.php');
    } else {
        $_SESSION['status'] = "Kritik & Saran Gagal Dihapus!";
        header('Location: t_kritik.php');
    }
}

// HAPUS SENIN

if (isset($_POST['senin_btn_hapus'])) {
    $del_id_senin = $_POST['senin_btn_hapus'];
    $ref_table_senin = 'Senin/' . $del_id_senin;
    $deletequery_result = $database->getReference($ref_table_senin)->remove();

    if ($deletequery_result) {
        $_SESSION['status'] = "Jadwal Dihapus!";
        header('Location: t_senin.php');
    } else {
        $_SESSION['status'] = "Jadwal Gagal Dihapus!";
        header('Location: t_senin.php');
    }
}

// HAPUS SELASA

if (isset($_POST['selasa_btn_hapus'])) {
    $del_id = $_POST['selasa_btn_hapus'];
    $ref_table = 'Selasa/' . $del_id;
    $deletequery_result = $database->getReference($ref_table)->remove();

    if ($deletequery_result) {
        $_SESSION['status'] = "Jadwal Dihapus!";
        header('Location: t_selasa.php');
    } else {
        $_SESSION['status'] = "Jadwal Gagal Dihapus!";
        header('Location: t_selasa.php');
    }
}

// HAPUS RABU

if (isset($_POST['rabu_btn_hapus'])) {
    $del_id = $_POST['rabu_btn_hapus'];
    $ref_table = 'Rabu/' . $del_id;
    $deletequery_result = $database->getReference($ref_table)->remove();

    if ($deletequery_result) {
        $_SESSION['status'] = "Jadwal Dihapus!";
        header('Location: t_rabu.php');
    } else {
        $_SESSION['status'] = "Jadwal Gagal Dihapus!";
        header('Location: t_rabu.php');
    }
}

// HAPUS KAMIS

if (isset($_POST['kamis_btn_hapus'])) {
    $del_id = $_POST['kamis_btn_hapus'];
    $ref_table = 'Kamis/' . $del_id;
    $deletequery_result = $database->getReference($ref_table)->remove();

    if ($deletequery_result) {
        $_SESSION['status'] = "Jadwal Dihapus!";
        header('Location: t_kamis.php');
    } else {
        $_SESSION['status'] = "Jadwal Gagal Dihapus!";
        header('Location: t_kamis.php');
    }
}

// HAPUS JUMAT

if (isset($_POST['jumat_btn_hapus'])) {
    $del_id = $_POST['jumat_btn_hapus'];
    $ref_table = 'Jumat/' . $del_id;
    $deletequery_result = $database->getReference($ref_table)->remove();

    if ($deletequery_result) {
        $_SESSION['status'] = "Jadwal Dihapus!";
        header('Location: t_jumat.php');
    } else {
        $_SESSION['status'] = "Jadwal Gagal Dihapus!";
        header('Location: t_jumat.php');
    }
}

// HAPUS SABTU

if (isset($_POST['sabtu_btn_hapus'])) {
    $del_id = $_POST['sabtu_btn_hapus'];
    $ref_table = 'Sabtu/' . $del_id;
    $deletequery_result = $database->getReference($ref_table)->remove();

    if ($deletequery_result) {
        $_SESSION['status'] = "Jadwal Dihapus!";
        header('Location: t_sabtu.php');
    } else {
        $_SESSION['status'] = "Jadwal Gagal Dihapus!";
        header('Location: t_sabtu.php');
    }
}

// HAPUS ACARA

if (isset($_POST['btn_hapus_acara'])) {
    $del_id = $_POST['btn_hapus_acara'];
    $ref_table = 'acara/' . $del_id;
    $deletequery_result = $database->getReference($ref_table)->remove();

    if ($deletequery_result) {
        $_SESSION['status'] = "Acara Dihapus!";
        header('Location: acara.php');
    } else {
        $_SESSION['status'] = "acara Gagal Dihapus!";
        header('Location: acara.php');
    }
}

// HAPUS KATEGORI

if (isset($_POST['btn_hapus_kategori'])) {
    $del_id = $_POST['btn_hapus_kategori'];
    $ref_table = 'kategori/' . $del_id;
    $deletequery_result = $database->getReference($ref_table)->remove();

    if ($deletequery_result) {
        $_SESSION['status'] = "Kategori Dihapus!";
        header('Location: kategori.php');
    } else {
        $_SESSION['status'] = "Kategori Gagal Dihapus!";
        header('Location: kategori.php');
    }
}

// ini sesi UPDATE LINK

if (isset($_POST['update_link'])) {
    $link = $_POST['namaurl'];
    $ref_table = $link;
    $updatequery_result =  $database->getReference('url')->set($ref_table);

    if ($updatequery_result) {
        $_SESSION['status'] = "Jadwal Diubah!";
        header('Location: edit-link.php');
    } else {
        $_SESSION['status'] = "Jadwal Gagal Diubah!";
        header('Location: edit-link.php');
    }
}

// ini sesi UPDATE LINK

if (isset($_POST['update_link_konten'])) {
    $link = $_POST['namaurl'];
    $ref_table = $link;
    $updatequery_result =  $database->getReference('kontenurl')->set($ref_table);

    if ($updatequery_result) {
        $_SESSION['status'] = "Link Diubah!";
        header('Location: edit-konten.php');
    } else {
        $_SESSION['status'] = "Jadwal Gagal Diubah!";
        header('Location: edit-konten.php');
    }
}


// ini sesi UPDATE LINK

if (isset($_POST['update_link_artikel'])) {
    $link = $_POST['namaurl'];
    $ref_table = $link;
    $updatequery_result =  $database->getReference('artikelurl')->set($ref_table);

    if ($updatequery_result) {
        $_SESSION['status'] = "Link Diubah!";
        header('Location: edit-artikel.php');
    } else {
        $_SESSION['status'] = "Jadwal Gagal Diubah!";
        header('Location: edit-artikel.php');
    }
}

// ini sesi UPDATE KATEGORI

if (isset($_POST['update_kategori'])) {
    $key = $_POST['key'];
    $kategori = $_POST['namakat'];
    $updateData = [
        'nama' => $kategori,
    ];
    $ref_table = 'kategori/' . $key;
    $updatequery_result =  $database->getReference($ref_table)->update($updateData);

    if ($updatequery_result) {
        $_SESSION['status'] = "Jadwal Diubah!";
        header('Location: kategori.php');
    } else {
        $_SESSION['status'] = "Jadwal Gagal Diubah!";
        header('Location: kategori.php');
    }
}

// ini sesi UPDATE ACARA

if (isset($_POST['update_acara'])) {
    $key = $_POST['key'];
    $kategori = $_POST['namaac'];
    $updateData = [
        'nama' => $kategori,
    ];
    $ref_table = 'acara/' . $key;
    $updatequery_result =  $database->getReference($ref_table)->update($updateData);

    if ($updatequery_result) {
        $_SESSION['status'] = "Jadwal Diubah!";
        header('Location: acara.php');
    } else {
        $_SESSION['status'] = "Jadwal Gagal Diubah!";
        header('Location: acara.php');
    }
}

// ini sesi UPDATE

if (isset($_POST['update_jadwal'])) {
    $key = $_POST['key'];
    $jadwal = $_POST['nama'];
    $jam = $_POST['jam'];
    $kategori = $_POST['kategori'];

    $updateData = [
        'nama' => $jadwal,
        'jam' => $jam,
        'kategori' => $kategori,
    ];
    $ref_table = 'Minggu/' . $key;
    $updatequery_result =  $database->getReference($ref_table)->update($updateData);

    if ($updatequery_result) {
        $_SESSION['status'] = "Jadwal Diubah!";
        header('Location: t_minggu.php');
    } else {
        $_SESSION['status'] = "Jadwal Gagal Diubah!";
        header('Location: t_minggu.php');
    }
}

// ini sesi UPDATE SENIN

if (isset($_POST['senin_update_jadwal'])) {
    $key = $_POST['key'];
    $jadwal = $_POST['nama'];
    $jam = $_POST['jam'];
    $kategori = $_POST['kategori'];

    $updateData = [
        'nama' => $jadwal,
        'jam' => $jam,
        'kategori' => $kategori,
    ];
    $ref_table = 'Senin';

// Mengecek apakah data dengan nama yang sama sudah ada di Firebase
$query = $database->getReference($ref_table)->orderByChild('jam')->equalTo($jam);
$existingData = $query->getValue();

// Menghapus data yang saat ini sedang diupdate dari array data yang ada
if (isset($existingData[$key])) {
    unset($existingData[$key]);
}

if ($existingData) {
    $_SESSION['status'] = "Jam pada jadwal ini sudah ada!";
    header('Location: t_senin.php');
} else {

    $updatequery_result =  $database->getReference($ref_table . '/' . $key)->update($updateData);

    if ($updatequery_result) {
        $_SESSION['status'] = "Jadwal Diubah!";
        header('Location: t_senin.php');
    } else {
        $_SESSION['status'] = "Jadwal Gagal Diubah!";
        header('Location: t_senin.php');
    }
}
}

// ini sesi UPDATE SELASA

if (isset($_POST['selasa_update_jadwal'])) {
    $key = $_POST['key'];
    $jadwal = $_POST['nama'];
    $jam = $_POST['jam'];
    $kategori = $_POST['kategori'];

    $updateData = [
        'nama' => $jadwal,
        'jam' => $jam,
        'kategori' => $kategori,
    ];
    $ref_table = 'Selasa';

// Mengecek apakah data dengan nama yang sama sudah ada di Firebase
$query = $database->getReference($ref_table)->orderByChild('jam')->equalTo($jam);
$existingData = $query->getValue();

// Menghapus data yang saat ini sedang diupdate dari array data yang ada
if (isset($existingData[$key])) {
    unset($existingData[$key]);
}

if ($existingData) {
    $_SESSION['status'] = "Jam pada jadwal ini sudah ada!";
    header('Location: t_selasa.php');
} else {

    $updatequery_result =  $database->getReference($ref_table . '/' . $key)->update($updateData);

    if ($updatequery_result) {
        $_SESSION['status'] = "Jadwal Diubah!";
        header('Location: t_selasa.php');
    } else {
        $_SESSION['status'] = "Jadwal Gagal Diubah!";
        header('Location: t_selasa.php');
    }
}
}


// ini sesi UPDATE RABU

if (isset($_POST['rabu_update_jadwal'])) {
    $key = $_POST['key'];
    $jadwal = $_POST['nama'];
    $jam = $_POST['jam'];
    $kategori = $_POST['kategori'];

    $updateData = [
        'nama' => $jadwal,
        'jam' => $jam,
        'kategori' => $kategori,
    ];
    $ref_table = 'Rabu';

    // Mengecek apakah data dengan nama yang sama sudah ada di Firebase
    $query = $database->getReference($ref_table)->orderByChild('jam')->equalTo($jam);
    $existingData = $query->getValue();
    
    // Menghapus data yang saat ini sedang diupdate dari array data yang ada
    if (isset($existingData[$key])) {
        unset($existingData[$key]);
    }
    
    if ($existingData) {
        $_SESSION['status'] = "Jam pada jadwal ini sudah ada!";
        header('Location: t_rabu.php');
    } else {
    
        $updatequery_result =  $database->getReference($ref_table . '/' . $key)->update($updateData);
    
        if ($updatequery_result) {
            $_SESSION['status'] = "Jadwal Diubah!";
            header('Location: t_rabu.php');
        } else {
            $_SESSION['status'] = "Jadwal Gagal Diubah!";
            header('Location: t_rabu.php');
        }
    }
    }

// ini sesi UPDATE KAMIS

if (isset($_POST['kamis_update_jadwal'])) {
    $key = $_POST['key'];
    $jadwal = $_POST['nama'];
    $jam = $_POST['jam'];
    $kategori = $_POST['kategori'];

    $updateData = [
        'nama' => $jadwal,
        'jam' => $jam,
        'kategori' => $kategori,
    ];
    $ref_table = 'Kamis';

    // Mengecek apakah data dengan nama yang sama sudah ada di Firebase
    $query = $database->getReference($ref_table)->orderByChild('jam')->equalTo($jam);
    $existingData = $query->getValue();
    
    // Menghapus data yang saat ini sedang diupdate dari array data yang ada
    if (isset($existingData[$key])) {
        unset($existingData[$key]);
    }
    
    if ($existingData) {
        $_SESSION['status'] = "Jam pada jadwal ini sudah ada!";
        header('Location: t_kamis.php');
    } else {
    
        $updatequery_result =  $database->getReference($ref_table . '/' . $key)->update($updateData);
    
        if ($updatequery_result) {
            $_SESSION['status'] = "Jadwal Diubah!";
            header('Location: t_kamis.php');
        } else {
            $_SESSION['status'] = "Jadwal Gagal Diubah!";
            header('Location: t_kamis.php');
        }
    }
    }

// ini sesi UPDATE JUMAT

if (isset($_POST['jumat_update_jadwal'])) {
    $key = $_POST['key'];
    $jadwal = $_POST['nama'];
    $jam = $_POST['jam'];
    $kategori = $_POST['kategori'];

    $updateData = [
        'nama' => $jadwal,
        'jam' => $jam,
        'kategori' => $kategori,
    ];
    $ref_table = 'Jumat';

    // Mengecek apakah data dengan nama yang sama sudah ada di Firebase
    $query = $database->getReference($ref_table)->orderByChild('jam')->equalTo($jam);
    $existingData = $query->getValue();
    
    // Menghapus data yang saat ini sedang diupdate dari array data yang ada
    if (isset($existingData[$key])) {
        unset($existingData[$key]);
    }
    
    if ($existingData) {
        $_SESSION['status'] = "Jam pada jadwal ini sudah ada!";
        header('Location: t_jumat.php');
    } else {
    
        $updatequery_result =  $database->getReference($ref_table . '/' . $key)->update($updateData);
    
        if ($updatequery_result) {
            $_SESSION['status'] = "Jadwal Diubah!";
            header('Location: t_jumat.php');
        } else {
            $_SESSION['status'] = "Jadwal Gagal Diubah!";
            header('Location: t_jumat.php');
        }
    }
    }

// ini sesi UPDATE SABTU

if (isset($_POST['sabtu_update_jadwal'])) {
    $key = $_POST['key'];
    $jadwal = $_POST['nama'];
    $jam = $_POST['jam'];
    $kategori = $_POST['kategori'];

    $updateData = [
        'nama' => $jadwal,
        'jam' => $jam,
        'kategori' => $kategori,
    ];
    $ref_table = 'Sabtu';

    // Mengecek apakah data dengan nama yang sama sudah ada di Firebase
    $query = $database->getReference($ref_table)->orderByChild('jam')->equalTo($jam);
    $existingData = $query->getValue();
    
    // Menghapus data yang saat ini sedang diupdate dari array data yang ada
    if (isset($existingData[$key])) {
        unset($existingData[$key]);
    }
    
    if ($existingData) {
        $_SESSION['status'] = "Jam pada jadwal ini sudah ada!";
        header('Location: t_sabtu.php');
    } else {
    
        $updatequery_result =  $database->getReference($ref_table . '/' . $key)->update($updateData);
    
        if ($updatequery_result) {
            $_SESSION['status'] = "Jadwal Diubah!";
            header('Location: t_sabtu.php');
        } else {
            $_SESSION['status'] = "Jadwal Gagal Diubah!";
            header('Location: t_sabtu.php');
        }
    }
    }

// ini sesi SIMPAN KATEGORI

if (isset($_POST['simpan_kategori'])) {
    $kategori = $_POST['nama'];
    $postData = [
        'nama' => $kategori,
    ];

    $ref_table = "kategori";

    // Mendapatkan data kategori dari Firebase
    $kategoriData = $database->getReference($ref_table)->getValue();

    // Mengecek apakah kategori dengan nama yang sama sudah ada di Firebase
    $isDuplicate = false;
    foreach ($kategoriData as $data) {
        if ($data['nama'] === $kategori) {
            $isDuplicate = true;
            break;
        }
    }

    if ($isDuplicate) {
        $_SESSION['status'] = "Kategori sudah ada!";
        header('Location: kategori.php');
    } else {
        $postRef_result = $database->getReference($ref_table)->push($postData);

        if ($postRef_result) {
            $_SESSION['status'] = "Kategori Tersimpan!";
            header('Location: kategori.php');
        } else {
            $_SESSION['status'] = "Kategori Gagal Tersimpan!";
            header('Location: kategori.php');
        }
    }
}



// ini sesi SIMPAN ACARA

if (isset($_POST['simpan_acara'])) {
    $acara = $_POST['nama'];
    $kategori = $_POST['kategori'];

    $postData = [
        'kategori' => $kategori,
        'nama' => $acara,
    ];

    $ref_table = "acara";

    // Mendapatkan data acara dari Firebase
    $acaraData = $database->getReference($ref_table)->getValue();

    // Mengecek apakah acara dengan nama yang sama sudah ada di Firebase
    $isDuplicate = false;
    foreach ($acaraData as $data) {
        if ($data['nama'] === $acara) {
            $isDuplicate = true;
            break;
        }
    }

    if ($isDuplicate) {
        $_SESSION['status'] = "Acara sudah ada!";
        header('Location: acara.php');
    } else {
        $postRef_result = $database->getReference($ref_table)->push($postData);

        if ($postRef_result) {
            $_SESSION['status'] = "Jadwal Tersimpan!";
            header('Location: acara.php');
        } else {
            $_SESSION['status'] = "Jadwal Gagal Tersimpan!";
            header('Location: acara.php');
        }
    }
}


// ini sesi SIMPAN

if (isset($_POST['simpan_jadwal'])) {
    $jadwal = $_POST['nama'];
    $jam = $_POST['jam'];
    $kategori = $_POST['kategori'];

    $postData = [
        'nama' => $jadwal,
        'jam' => $jam,
        'kategori' => $kategori,
    ];

    $ref_table = "Minggu";
    
    // Mengecek apakah data dengan nama yang sama sudah ada di Firebase
    $query = $database->getReference($ref_table)->orderByChild('jam')->equalTo($jam);
    $existingData = $query->getValue();

    if ($existingData) {
        $_SESSION['status'] = "Jadwal sudah ada!";
        header('Location: t_minggu.php');
    } else {
        $postRef_result = $database->getReference($ref_table)->push($postData);

        if ($postRef_result) {
            $_SESSION['status'] = "Jadwal Tersimpan!";
            header('Location: t_minggu.php');
        } else {
            $_SESSION['status'] = "Jadwal Gagal Tersimpan!";
            header('Location: t_minggu.php');
        }
    }
}

//Simpan Senin

if (isset($_POST['senin_simpan_jadwal'])) {
    $jadwal = $_POST['nama'];
    $jam = $_POST['jam'];
    $kategori = $_POST['kategori'];

    $postData = [
        'nama' => $jadwal,
        'jam' => $jam,
        'kategori' => $kategori,
    ];

    $ref_table = "Senin";

    // Mengecek apakah data dengan nama yang sama sudah ada di Firebase
    $query = $database->getReference($ref_table)->orderByChild('jam')->equalTo($jam);
    $existingData = $query->getValue();

    if ($existingData) {
        $_SESSION['status'] = "Jadwal sudah ada!";
        header('Location: t_senin.php');
    } else {
        $postRef_result = $database->getReference($ref_table)->push($postData);

        if ($postRef_result) {
            $_SESSION['status'] = "Jadwal Tersimpan!";
            header('Location: t_senin.php');
        } else {
            $_SESSION['status'] = "Jadwal Gagal Tersimpan!";
            header('Location: t_senin.php');
        }
    }
}

//Simpan Selasa

if (isset($_POST['selasa_simpan_jadwal'])) {
    $jadwal = $_POST['nama'];
    $jam = $_POST['jam'];
    $kategori = $_POST['kategori'];

    $postData = [
        'nama' => $jadwal,
        'jam' => $jam,
        'kategori' => $kategori,
    ];

    $ref_table = "Selasa";
    
    // Mengecek apakah data dengan nama yang sama sudah ada di Firebase
    $query = $database->getReference($ref_table)->orderByChild('jam')->equalTo($jam);
    $existingData = $query->getValue();

    if ($existingData) {
        $_SESSION['status'] = "Jadwal sudah ada!";
        header('Location: t_selasa.php');
    } else {
        $postRef_result = $database->getReference($ref_table)->push($postData);

        if ($postRef_result) {
            $_SESSION['status'] = "Jadwal Tersimpan!";
            header('Location: t_selasa.php');
        } else {
            $_SESSION['status'] = "Jadwal Gagal Tersimpan!";
            header('Location: t_selasa.php');
        }
    }
}

//Simpan Rabu

if (isset($_POST['rabu_simpan_jadwal'])) {
    $jadwal = $_POST['nama'];
    $jam = $_POST['jam'];
    $kategori = $_POST['kategori'];

    $postData = [
        'nama' => $jadwal,
        'jam' => $jam,
        'kategori' => $kategori,
    ];

    $ref_table = "Rabu";
    
    // Mengecek apakah data dengan nama yang sama sudah ada di Firebase
    $query = $database->getReference($ref_table)->orderByChild('jam')->equalTo($jam);
    $existingData = $query->getValue();

    if ($existingData) {
        $_SESSION['status'] = "Jadwal sudah ada!";
        header('Location: t_rabu.php');
    } else {
        $postRef_result = $database->getReference($ref_table)->push($postData);

        if ($postRef_result) {
            $_SESSION['status'] = "Jadwal Tersimpan!";
            header('Location: t_rabu.php');
        } else {
            $_SESSION['status'] = "Jadwal Gagal Tersimpan!";
            header('Location: t_rabu.php');
        }
    }
}

//Simpan Kamis

if (isset($_POST['kamis_simpan_jadwal'])) {
    $jadwal = $_POST['nama'];
    $jam = $_POST['jam'];
    $kategori = $_POST['kategori'];

    $postData = [
        'nama' => $jadwal,
        'jam' => $jam,
        'kategori' => $kategori,
    ];

    $ref_table = "Kamis";

    // Mengecek apakah data dengan nama yang sama sudah ada di Firebase
    $query = $database->getReference($ref_table)->orderByChild('jam')->equalTo($jam);
    $existingData = $query->getValue();

    if ($existingData) {
        $_SESSION['status'] = "Jadwal sudah ada!";
        header('Location: t_kamis.php');
    } else {
        $postRef_result = $database->getReference($ref_table)->push($postData);

        if ($postRef_result) {
            $_SESSION['status'] = "Jadwal Tersimpan!";
            header('Location: t_kamis.php');
        } else {
            $_SESSION['status'] = "Jadwal Gagal Tersimpan!";
            header('Location: t_kamis.php');
        }
    }
}

//Simpan Jumat

if (isset($_POST['jumat_simpan_jadwal'])) {
    $jadwal = $_POST['nama'];
    $jam = $_POST['jam'];
    $kategori = $_POST['kategori'];

    $postData = [
        'nama' => $jadwal,
        'jam' => $jam,
        'kategori' => $kategori,
    ];

    $ref_table = "Jumat";
    
    // Mengecek apakah data dengan nama yang sama sudah ada di Firebase
    $query = $database->getReference($ref_table)->orderByChild('jam')->equalTo($jam);
    $existingData = $query->getValue();

    if ($existingData) {
        $_SESSION['status'] = "Jadwal sudah ada!";
        header('Location: t_jumat.php');
    } else {
        $postRef_result = $database->getReference($ref_table)->push($postData);

        if ($postRef_result) {
            $_SESSION['status'] = "Jadwal Tersimpan!";
            header('Location: t_jumat.php');
        } else {
            $_SESSION['status'] = "Jadwal Gagal Tersimpan!";
            header('Location: t_jumat.php');
        }
    }
}

//Simpan Sabtu

if (isset($_POST['sabtu_simpan_jadwal'])) {
    $jadwal = $_POST['nama'];
    $jam = $_POST['jam'];
    $kategori = $_POST['kategori'];

    $postData = [
        'nama' => $jadwal,
        'jam' => $jam,
        'kategori' => $kategori,
    ];

    $ref_table = "Sabtu";
    
    // Mengecek apakah data dengan nama yang sama sudah ada di Firebase
    $query = $database->getReference($ref_table)->orderByChild('jam')->equalTo($jam);
    $existingData = $query->getValue();

    if ($existingData) {
        $_SESSION['status'] = "Jadwal sudah ada!";
        header('Location: t_sabtu.php');
    } else {
        $postRef_result = $database->getReference($ref_table)->push($postData);

        if ($postRef_result) {
            $_SESSION['status'] = "Jadwal Tersimpan!";
            header('Location: t_sabtu.php');
        } else {
            $_SESSION['status'] = "Jadwal Gagal Tersimpan!";
            header('Location: t_sabtu.php');
        }
    }
}
