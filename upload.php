<?php
$target_dir = "uploads/"; // folder tempat menyimpan file yang di-upload
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Periksa apakah file adalah file MP3
if(isset($_POST["submit"])) {
    // Periksa ukuran file (misalnya dibatasi 10MB)
    if ($_FILES["fileToUpload"]["size"] > 10000000) {
        echo "Maaf, ukuran file terlalu besar.";
        $uploadOk = 0;
    }

    // Hanya izinkan format file MP3
    if($fileType != "mp3") {
        echo "Maaf, hanya file MP3 yang diperbolehkan.";
        $uploadOk = 0;
    }

    // Cek apakah $uploadOk bernilai 0 karena error
    if ($uploadOk == 0) {
        echo "Maaf, file Anda tidak dapat di-upload.";
    // Jika semuanya baik, upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "File ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " telah berhasil di-upload.";
        } else {
            echo "Maaf, terjadi kesalahan saat meng-upload file Anda.";
        }
    }
}
?>
