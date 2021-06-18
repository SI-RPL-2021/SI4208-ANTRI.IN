<?php
require_once 'db_connnect.php';
require 'select_data.php';

// register
if(isset($_POST["daftar_akun"])){
    $_SESSION['eff_add'] = register_akun('');
    header("Location: ../views/login.php");
}

// isi rekam medis
if(isset($_POST["add_rekam"])){
    $_SESSION['eff_add'] = insert_rekam_medis($_POST);
    header("Location: ../views/pengguna/melihatRekamMedis.php");
}

// tambah dokter
if(isset($_POST["add_apotek"])){
    $_SESSION['eff_add'] = insert_apotek($_POST);
    header("Location: ../views/admins/adminApotek.php");
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

// chat online
if(isset($_POST["add_chat"])){
    $_SESSION['eff_add'] = insert_chat($_POST);
    header("Location: ../views/pengguna/chatKonsultasi.php?id_dok_akun=".$_SESSION['dok_id_chat']);
}

// forward resep obat
if(isset($_POST["add_resep"])){
    $_SESSION['eff_add'] = insert_resep($_POST);
    header("Location: ../views/pengguna/resepObat.php");
}

function insert_apotek($data){
    global $conn;
    // $rs_row = view_data("SELECT * FROM `list_dokter`");
    $insert_stmt = '';
    $query = '';

    $id_aptk = date("m").strval(rand(100,999)).date("Y").date("H").date("d").date("i");
    $nama = $data['namaApotek'];
    $alamat = $data['alamatApotek'];
    $telepon = $data['telpApotek'];
    $id_obat = $data['medName'];
    $query = "INSERT INTO `apotek` VALUES (?,?,?,?,?)";

    $insert_stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($insert_stmt,'isssi', $id_aptk, $nama, $alamat, $telepon, $id_obat);

    if(!empty($insert_stmt)){
        mysqli_stmt_execute($insert_stmt);
    }else{var_dump('gagal');}

    $eff_rw = mysqli_affected_rows($conn);
    mysqli_close($conn);
    
    return $eff_rw;
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

function insert_rekam_medis($data){
    global $conn;
    $insert_stmt = '';
    $query = '';

    $id_rkm = date("Y").date("m").strval(rand(100,999)).date("H").date("i").date("d");
    // $id_usr = $_SESSION['usr_id_rkm'];
    // $id_rs = $_SESSION['rs_id_rkm'];
    // $id_rsvp = $_SESSION['rsvp_id_rkm'];
    $id_usr = $_SESSION['id_no'];
    $id_rs = $data['rs_id_rkm'];
    $id_rsvp = $data['rsvp_id_rkm'];
    $keluhn = $data['keluh_patient'];
    $diagns = $data['diagnose_dr'];
    $query = "INSERT INTO `rekam_medis` VALUES (?,?,?,?,?,?)";

    $insert_stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($insert_stmt,'iiiiss', $id_rkm, $id_usr, $id_rs, $id_rsvp, $keluhn, $diagns);

    if(!empty($insert_stmt)){
        mysqli_stmt_execute($insert_stmt);
    }else{var_dump('gagal');}

    $eff_rw = mysqli_affected_rows($conn);
    mysqli_close($conn);
    
    return $eff_rw;
}

function insert_chat($data){
    global $conn;
    $insert_stmt = '';
    $query = '';

    $id_chat = date("Y").date("i").strval(rand(10,99)).date("H").date("m").strval(rand(10,99)).date("d");
    $converstn = $data['online_convrst'];
    $time_chat = date('Y-m-d H:i:s');
    $id_dok = $_SESSION['dok_id_chat'];
    $id_usr = $_SESSION['usr_id_chat'];
    $query = "INSERT INTO `chat_online` VALUES (?,?,?,?,?)";

    $insert_stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($insert_stmt,'issii', $id_chat, $converstn, $time_chat, $id_dok, $id_usr);

    if(!empty($insert_stmt)){
        mysqli_stmt_execute($insert_stmt);
    }else{var_dump('gagal');}

    $eff_rw = mysqli_affected_rows($conn);
    mysqli_close($conn);
    
    return $eff_rw;
}

function insert_resep($data){
    global $conn;
    $insert_stmt = '';
    $query = '';

    // resep obat
    $id_resep = date("Y").date("i").date("H").date("m").date("d").strval(rand(100,999));
    $id_rekam = $_SESSION['rkm_id_resep'];
    $obat_usr = $data['obat_pasien'];
    $query = "INSERT INTO `resep_obat` VALUES (?,?,?)";

    $insert_stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($insert_stmt,'iis', $id_resep, $id_rekam, $obat_usr);

    if(!empty($insert_stmt)){
        mysqli_stmt_execute($insert_stmt);
    }else{var_dump('gagal');}

    $eff_rw = mysqli_affected_rows($conn);

    // apotek --resep
    $id_apotek = $_SESSION['aptk_id_resep'];
    $time_chat = date('Y-m-d H:i:s');
    $nama_apotek = $_SESSION['aptk_name_resep'];
    $alamat_apotek = $_SESSION['aptk_addrs_resep'];
    $telp_apotek = $_SESSION['aptk_telp_resep'];
    $query = "INSERT INTO `apotek` VALUES (?,?,?,?,?)";

    $insert_stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($insert_stmt,'isssi', $id_apotek, $nama_apotek, $alamat_apotek, $telp_apotek, $id_resep);

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