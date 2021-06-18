<?php
require_once 'db_connnect.php';
require_once 'select_data.php';

// ubah profile
if(isset($_POST["edit_profile"])){
    $_SESSION['eff_edit'] = update_profile($_POST, $_SESSION['id_no']);
    header("Location: ../views/pengguna/editProfile.php");
}

// ubah apotek
if(isset($_POST["edit_apotek"])){
    $_SESSION['eff_edit'] = update_apotek($_POST, $_SESSION['id_no']);
    header("Location: ../views/admins/adminApotek.php");
}

// ubah dokter
if(isset($_POST["edit_dokter"])){
    $_SESSION['eff_edit'] = update_dokter($_POST, $_SESSION['id_no']);
    header("Location: ../views/admins/adminDokter.php");
}

// ubah pengguna
if(isset($_POST["edit_pengguna"])){
    $_SESSION['eff_edit'] = update_pengguna($_POST, $_SESSION['id_no']);
    header("Location: ../views/admins/adminPengguna.php");
}

// ubah rumah sakit
if(isset($_POST["edit_hospital"])){
    $_SESSION['eff_edit'] = update_hospital($_POST, $_SESSION['id_no']);
    header("Location: ../views/admins/adminRumahSakit.php");
}

// ubah poliklinik
if(isset($_POST["edit_poli"])){
    $_SESSION['eff_edit'] = update_poli($_POST, $_SESSION['id_no']);
    header("Location: ../views/admins/adminPoliklinik.php?id_rs=".$_POST['id_rs_hid']);
}

// ubah status reservasi --dr
if(isset($_POST["selesai_btn_r"]) or isset($_POST["obat_btn_r"]) or isset($_POST["batal_btn_r"])){
    $_SESSION['eff_edit'] = update_rsvp($_POST['rsvp_edited_id']);
    // var_dump(isset($_POST["selesai_btn_r"]));
    header("Location: ../views/pengguna/drReservasi.php");
}

function update_profile($data, $id_user){
    global $conn;
    // $rs_row = view_data("SELECT * FROM `pengguna` WHERE id_user='$id_user'")[0];
    $update_stmt = '';
    $query = '';

    $username = $_POST["username_regis"];
    $email = $_POST["email_reg"];
    // $password = $_POST["kata_sandi_reg"];
    // $hash_pass = password_hash($password, PASSWORD_DEFAULT);

    $nama = $_POST["nama"];
    $gender = $_POST["jeniskelamin"];
    $birthday = $_POST["birthday"];
    $alamat = $_POST["alamat"];
    $ktp = $_POST["ktp"];
    $phone = $_POST["telepon"];
    $query = "UPDATE `pengguna` SET `nama_lengkap`=?, `no_ktp`=?, `tanggal_lahir`=?, `jenis_kelamin`=?, `alamat`=?, `no_telepon`=? WHERE `id_user`=?";

    $update_stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($update_stmt,'ssssssi', $nama, $ktp, $birthday, $gender, $alamat, $phone, $id_user);

    if(!empty($update_stmt)){
        mysqli_stmt_execute($update_stmt);
    }else{var_dump('gagal');}

    // mysqli_query($conn, $query);
    $eff_rw = mysqli_affected_rows($conn);
    mysqli_close($conn);
    
    return $eff_rw;
}

function update_rsvp($id_rsvp){
    global $conn;
    $rs_row = data_view("SELECT * FROM `reservasi` WHERE id_reservasi = ?", $id_rsvp);
    $update_stmt = '';
    $query = '';

    $no_antr = $rs_row["nomor_antrian"];
    if (isset($_POST["selesai_btn_r"])){
        $sttts = 'selesai';
    } else if (isset($_POST["obat_btn_r"])){
        $sttts = 'ambil obat';
    } else {
        $sttts = 'batal';
    }

    $id_usr = $rs_row["id_user"];
    $id_dok = $rs_row["id_dokter"];
    $id_rs = $rs_row["id_rs"];
    $query = "UPDATE `reservasi` SET `nomor_antrian`=?, `status_reserv`=?, `id_user`=?, `id_dokter`=?, `id_rs`=? WHERE `id_reservasi`=?";

    $update_stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($update_stmt,'ssiiii', $no_antr, $sttts, $id_usr, $id_dok, $id_rs, $id_rsvp);

    if(!empty($update_stmt)){
        mysqli_stmt_execute($update_stmt);
    }else{var_dump('gagal');}

    $eff_rw = mysqli_affected_rows($conn);
    mysqli_close($conn);
    
    return $eff_rw;
}

function update_apotek($data, $id_apotek){
    global $conn;
    $update_stmt = '';
    $query = '';

    $nama = $data['namaApotek'];
    $alamat = $data['alamatApotek'];
    $telepon = $data['telpApotek'];
    $id_obat = $data['medName'];
    $query = "UPDATE `apotek` SET `nama_apotek`=?, `alamat_apotek`=?, `no_telepon_apotek`=?, `id_resep_obat`=? WHERE `id_apotek`=?";

    $update_stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($update_stmt,'sssii', $nama, $alamat, $telepon, $id_obat, $id_apotek);

    if(!empty($update_stmt)){
        mysqli_stmt_execute($update_stmt);
    }else{var_dump('gagal');}

    // mysqli_query($conn, $query);
    $eff_rw = mysqli_affected_rows($conn);
    mysqli_close($conn);
    
    return $eff_rw;
}

function update_dokter($data, $id_dok){
    global $conn;
    $update_stmt = '';
    $query = '';

    $nama = $data['namaDokter'];
    $spesialis = $data['splDokter'];
    $telepon = $data['noHpDokter'];
    $query = "UPDATE `list_dokter` SET `nama_dokter`=?, `spesialis`=?, `no_telepon`=? WHERE `id_dokter`=?";

    $update_stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($update_stmt,'sssi', $nama, $spesialis, $telepon, $id_dok);

    if(!empty($update_stmt)){
        mysqli_stmt_execute($update_stmt);
    }else{var_dump('gagal');}

    // mysqli_query($conn, $query);
    $eff_rw = mysqli_affected_rows($conn);
    mysqli_close($conn);
    
    return $eff_rw;
}

function update_pengguna($data, $id_user){
    global $conn;
    $update_stmt = '';
    $query = '';

    $nama = $data['namaUsr'];
    $alamat = $data['alamatUsr'];
    $telepon = $data['nohpUsr'];
    $query = "UPDATE `pengguna` SET `nama_lengkap`=?, `alamat`=?, `no_telepon`=? WHERE `id_user`=?";

    $update_stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($update_stmt,'sssi', $nama, $alamat, $telepon, $id_user);

    if(!empty($update_stmt)){
        mysqli_stmt_execute($update_stmt);
    }else{var_dump('gagal');}

    // mysqli_query($conn, $query);
    $eff_rw = mysqli_affected_rows($conn);
    mysqli_close($conn);
    
    return $eff_rw;
}

function update_hospital($data, $id_rs){
    global $conn;
    $update_stmt = '';
    $query = '';

    $nama = $data['namaRs'];
    $alamat = $data['alamatRs'];
    $telepon = $data['telpRs'];
    $query = "UPDATE `rumah_sakit` SET `nama_rs`=?, `alamat_rs`=?, `no_telepon_rs`=? WHERE `id_rs`=?";

    $update_stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($update_stmt,'sssi', $nama, $alamat, $telepon, $id_rs);

    if(!empty($update_stmt)){
        mysqli_stmt_execute($update_stmt);
    }else{var_dump('gagal');}

    // mysqli_query($conn, $query);
    $eff_rw = mysqli_affected_rows($conn);
    mysqli_close($conn);
    
    return $eff_rw;
}

function update_poli($data, $id_poli){
    global $conn;
    $update_stmt = '';
    $query = '';

    $nama = $data['namaPoli'];
    $jadwal = $data['jadwalPoli'];
    $id_dok = $data['drName'];
    $id_rs = $data['id_rs_hid'];
    $query = "UPDATE `poliklinik` SET `nama_poli`=?, `jadwal_buka`=?, `id_dokter`=?, `id_rs`=? WHERE `id_poli`=?";

    $update_stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($update_stmt,'ssiii', $nama, $jadwal, $id_dok, $id_rs, $id_poli);

    if(!empty($update_stmt)){
        mysqli_stmt_execute($update_stmt);
    }else{var_dump('gagal');}

    // mysqli_query($conn, $query);
    $eff_rw = mysqli_affected_rows($conn);
    mysqli_close($conn);
    
    return $eff_rw;
}
?>