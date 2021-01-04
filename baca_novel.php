<?php
    // simpan dengan nama baca_novel.php
    if(defined("GELANG") === false)
    {
        // tidak punya gelang
        die("Anda tidak boleh membuka halaman ini secara langsung!");
    }

    // tuliskan query untuk mengambil data di dalam tabel
    $sql = "select * from novel as a join rating as b on b.id_novel = a.id_novel where soft_delete=0 and a.id_novel=".$_GET['id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $sql2 ="
    select avg(b.rating) as avg, count(b.rating) as count from novel as a 
    join rating as b 
    on b.id_novel = a.id_novel
    where soft_delete=0 and a.id_novel=1";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);

?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <embed src="<?php echo $row['file_novel'];?>" width="100%" height="500" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">
        </div>
        <div class="col-4">

            <h3><?php echo $row['id_novel'];?></h3>
            <h3><?php echo $row['judul_novel'];?></h3>
            <form action="index.php?page=baca_novel&id=1">

            </form>
            <form action="?page=simpan_rating" method="post">
                <h4>Rating</h4>
                <input type="number" name="rating" min="0" max="10">
                <input type="hidden" name="id_novel" value="<?php echo $row['id_novel']; ?>">
                <!-- <button type="submit" class="btn btn-primary btn-sm">Ok</button> -->
                <input type="submit" class="btn btn-primary" value="Simpan" />

            </form>   
            <h5>Sinopsis</h5>
            <p><?php echo $row['sinopsis'];?></p>
            <!-- <?php
                $jumlah = 0;
                $jumlahRating = 0;
                for($j = 0; $j < count($row); $j++){
                    $jumlah = j+1;
                    $jumlahRating = $row['avg'];
                }
                $avgRating = $jumlahRating/count($row);
            ?> -->
            <p><?php echo $row2['avg'];?> (<?php echo $row2['count'];?> users)</p>
            <p></p>
            
            <!-- <p><?php print_r($_SESSION);?></p>
            <p><?php print_r($_POST);?></p> -->

        </div>
    </div>
</div>