<?php
require_once 'db_connnect.php';
require 'select_data.php';

// register
if(isset($_POST["daftar_akun"])){
    $_SESSION['eff_add'] = register_akun('');
    header("Location: ../views/login.php");
}

// tambah dokter
if(isset($_POST["add_dokter"])){
    $_SESSION['eff_add'] = insert_dokter($_POST, '');
    header("Location: ../views/admins/adminDokter.php");
}

// tambah rumah sakit
if(isset($_POST["add_hospital"])){
    $_SESSION['eff_add'] = insert_hospital($_POST);
    header("Location: ../views/admins/adminRumahSakit.php");
}

// tambah poliklinik
if(isset($_POST["add_poli"])){
    $_SESSION['eff_add'] = insert_poli($_POST);
    // header("Location: ../views/admins/adminRumahSakit.php");
    header("Location: ../views/admins/adminPoliklinik.php?id_rs=".$_POST['id_rs_hid']);
}

function insert_dokter($data, $user_id){
    global $conn;
    // $rs_row = view_data("SELECT * FROM `list_dokter`");
    $insert_stmt = '';
    $query = '';

    $id_dok = 0;
    $nama = '';
    $spesialis = '';
    $telepon = '';

    $id_dok = date("Y").date("m").date("d").strval(rand(100,999)).date("H").date("i");
    $nama = $data['namaDokter'];
    $spesialis = $data['splDokter'];
    $telepon = $data['noHpDokter'];
    $query = "INSERT INTO `list_dokter` VALUES (?,?,?,?)";

    $insert_stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($insert_stmt,'isss', $id_dok, $nama, $spesialis, $telepon);

    if(!empty($insert_stmt)){
        mysqli_stmt_execute($insert_stmt);
    }else{var_dump('gagal');}

    // mysqli_query($conn, $query);
    $eff_rw = mysqli_affected_rows($conn);
    mysqli_close($conn);
    
    return $eff_rw;
}

function insert_hospital($data){
    global $conn;
    // $rs_row = view_data("SELECT * FROM `list_dokter`");
    $insert_stmt = '';
    $query = '';

    $id_rs = date("m").date("d").date("Y").date("H").strval(rand(100,999)).date("i");
    $nama = $data['namaRs'];
    $alamat = $data['alamatRs'];
    $telepon = $data['telpRs'];
    $query = "INSERT INTO `rumah_sakit` VALUES (?,?,?,?)";

    $insert_stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($insert_stmt,'isss', $id_rs, $nama, $alamat, $telepon);

    if(!empty($insert_stmt)){
        mysqli_stmt_execute($insert_stmt);
    }else{var_dump('gagal');}

    $eff_rw = mysqli_affected_rows($conn);
    mysqli_close($conn);
    
    return $eff_rw;
}

function insert_poli($data){
    global $conn;
    // $rs_row = view_data("SELECT * FROM `list_dokter`");
    $insert_stmt = '';
    $query = '';

    $id_poli = date("m").date("d").date("H").strval(rand(100,999)).date("Y").date("i");
    $nama = $data['namaPoli'];
    $jadwal = $data['jadwalPoli'];
    $id_dok = $data['drName'];
    $id_rs = $data['id_rs_hid'];
    // var_dump($id_rs);
    $query = "INSERT INTO `poliklinik` VALUES (?,?,?,?,?)";

    $insert_stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($insert_stmt,'issii', $id_poli, $nama, $jadwal, $id_dok, $id_rs);

    if(!empty($insert_stmt)){
        mysqli_stmt_execute($insert_stmt);
    }else{var_dump('gagal');}

    $eff_rw = mysqli_affected_rows($conn);
    mysqli_close($conn);
    
    return $eff_rw;
}

function register_akun($user_id){
    global $conn;
    $query = '';
    $insert_stmt = '';

    $id_akn = date("m").date("d").date("H").date("i").strval(rand(100,999));
    $id_usr = date("Y").date("m").date("d").date("H").date("i").strval(rand(100,999));
    $username = $_POST["username_regis"];
    $email = $_POST["email_reg"];
    $password = $_POST["kata_sandi_reg"];
    $hash_pass = password_hash($password, PASSWORD_DEFAULT);

    $nama = $_POST["nama"];
    $gender = $_POST["jeniskelamin"];
    $birthday = $_POST["birthday"];
    $alamat = $_POST["alamat"];
    $ktp = $_POST["ktp"];
    $phone = $_POST["telepon"];

    $query = "INSERT INTO akun (`id_akun`, `username`, `password`, `email`) VALUES (?,?,?,?)";

    $insert_stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($insert_stmt,'isss', $id_akn, $username, $hash_pass, $email);

    if(!empty($insert_stmt)){
        mysqli_stmt_execute($insert_stmt);
    }else{var_dump('gagal');}

    $eff_rw = mysqli_affected_rows($conn);
    // mysqli_close($conn);

    $query = "INSERT INTO pengguna VALUES (?,?,?,?,?,?,?,?)";

    $insert_stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($insert_stmt,'issssssi', $id_usr, $nama, $ktp, $birthday, $gender, $alamat, $phone, $id_akn);

    if(!empty($insert_stmt)){
        mysqli_stmt_execute($insert_stmt);
    }else{var_dump('gagal');}

    $eff_rw2 = mysqli_affected_rows($conn);
    mysqli_close($conn);

    return $eff_rw + $eff_rw2;
}
?>