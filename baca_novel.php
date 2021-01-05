<?php
    // simpan dengan nama baca_novel.php
    if(defined("GELANG") === false)
    {
        // tidak punya gelang
        die("Anda tidak boleh membuka halaman ini secara langsung!");
    }

    // tuliskan query untuk mengambil data di dalam tabel
    $sql = "select * from novel as a left join rating as b on b.id_novel = a.id_novel where soft_delete=0 and a.id_novel=".$_GET['id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $sql2 ="
    select avg(b.rating) as avg, count(b.rating) as count from novel as a 
    join rating as b 
    on b.id_novel = a.id_novel
    where soft_delete=0 and a.id_novel=".$_GET['id'];
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);

?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <embed src="<?php echo $row['file_novel'];?>" width="100%" height="500" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">
        </div>
        <div class="col-4">

            <!-- <h3><?php echo $row['id_novel'];?></h3> -->
            <h4>Novel : <?php echo $row['judul_novel'];?></h4>
            <h4>Sinopsis</h4>
            <p><?php echo $row['sinopsis'];?></p>
            <h4>Rating</h4>
            <p><?php echo $row2['avg'];?> (<?php echo $row2['count'];?> users)</p>
            <h4>Input rating</h4>
            <form action="?page=simpan_rating" method="post">
                <input type="number" name="rating" min="0" max="10">
                <input type="hidden" name="id_novel" value="<?php print_r($_GET["id"]);?>">
                <input type="submit" class="btn btn-sm btn-primary" value="Simpan"/>
            </form>
            
            <!-- <p><?php print_r($_SESSION);?></p> -->
            <!-- <p><?php print_r($_POST);?></p> -->
            <!-- <?php print_r($_GET["id"]);?> -->
        </div>
    </div>
</div>