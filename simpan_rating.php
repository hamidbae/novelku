<?php
// filename: simpan_genre.php

if(defined("GELANG") === false)
{
    // tidak punya gelang
    die("Anda tidak boleh membuka halaman ini secara langsung!");
}

$id_user = $_SESSION['id_user'];
$id_novel = $_POST['id_novel'];
$rating = $_POST['rating'];

print_r($_POST);
// print_r($_SESSION);

// echo "novel " . $id_novel;

// echo "$id_user;
// echo $rating;

$sql = "INSERT INTO rating (id_user, id_novel, rating) VALUES ('$id_user', '$id_novel', '$rating')";
$sqlCek = "SELECT * FROM rating where id_user=$id_user and id_novel=$id_novel";
$sqlUpdate = "UPDATE rating SET rating=$rating WHERE id_user=$id_user AND id_novel=$id_novel";

if(mysqli_fetch_assoc(mysqli_query($conn, $sqlCek))){
    mysqli_query($conn, $sqlUpdate);
}else{
    mysqli_query($conn, $sql);
}


//redirect

echo"<script>
    window.location.replace('index.php?page=baca_novel&id=$id_novel');
    </script>";