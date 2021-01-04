<?php
    // simpan dengan nama form_novel.php
    if(defined("GELANG") === false)
    {
        // tidak punya gelang
        die("Anda tidak boleh membuka halaman ini secara langsung!");
    }

    $sql = "select * from genre where soft_delete=0";
    $result_genre = mysqli_query($conn, $sql);
?>

<div class="container">
    <div class="row">
        <div class="col">

            <form action="?page=simpan_novel" method="post"  enctype="multipart/form-data">

                <div class="form-group">
                    <label>Masukkan Judul</label>
                    <input type="text" name="judul_novel" class="form-control" placeholder="Misal: Biola tak Berdawai">
                </div>

                <div class="form-group">
                    <label>Masukkan Sinopsis</label>
                    <textarea name="sinopsis" class="form-control" placeholder="Ketikkan sinopsis singkat dari novel ini"></textarea>
                </div>

                <div class="form-group">
                    <label>Tanggal Terbit Novel</label>
                    <input type="date" name="tgl_terbit" class="form-control">
                </div>

                <div class="form-group">
                    <label>Pilih Genre</label>
                    <?php
                        while ($row = mysqli_fetch_assoc($result_genre)) 
                        {
                            echo '<div class="form-check">';
                            echo '<input class="form-check-input" type="checkbox" name="genre[]" value="'.$row['id_genre'].'">
                                <label class="form-check-label">
                                    '.$row['nama_genre'].'
                                </label>';
                            echo '</div>';
                        }
                    ?>
                </div>

                <div class="form-group">
                    <label>File Cover</label>
                    <input type="file" name="file_cover" />
                </div>

                <div class="form-group">
                    <label>File Novel</label>
                    <input type="file" name="file_novel" />
                </div>

                <input type="submit" class="btn btn-primary" value="Simpan" />

            </form>   


        </div>
    </div>
</div>