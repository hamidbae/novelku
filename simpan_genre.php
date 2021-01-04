<?php
// filename: simpan_genre.php

if(defined("GELANG") === false)
{
    // tidak punya gelang
    die("Anda tidak boleh membuka halaman ini secara langsung!");
}

    $genre = $_POST['nama_genre'];

if(isset($_GET['id']))
{
    // edit data
    $id = $_GET['id'];
    $sql = "UPDATE genre SET nama_genre='$genre' where id_genre='$id'";
}else {

    // new data
    $sql = "INSERT INTO genre (nama_genre) VALUES ('$genre')";

    }

mysqli_query($conn, $sql);


//redirect

echo"<script>
    window.location.replace('index.php?page=genre');
    </script>";