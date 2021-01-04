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

    // print_r($_POST);
    // print_r($_SESSION);


    $sql = "INSERT INTO rating (id_user, id_novel, rating) VALUES ('$id_user', '$id_novel', '$rating')";

mysqli_query($conn, $sql);


//redirect

echo"<script>
    window.location.replace('index.php?page=baca_novel&id=$id_novel');
    </script>";