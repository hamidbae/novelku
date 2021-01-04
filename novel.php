<?php
    // simpan dengan nama novel.php
    if(defined("GELANG") === false)
    {
        // tidak punya gelang
        die("Anda tidak boleh membuka halaman ini secara langsung!");
    }

    // tuliskan query untuk mengambil data di dalam tabel
    $sql = "select * from novel where soft_delete=0";

    $result = mysqli_query($conn, $sql);
?>

<div class="container">
<br />
    <a href="?page=form_novel" class="btn btn-primary">Tambah Baru</a>
    <br /><br />
    <div class="row">
        <div class="col">
            <table class='table'>
                <tr>
                    <th width='40px' align='center'>No.</th>
                    <th>Cover Novel</th>
                    <th>Judul Novel</th>
                    <th>Aksi</th>
                </tr>

                <?php
                if(mysqli_num_rows($result) > 0) 
                {
                    // apakah punya kewenangan hapus?
                    $cek_hapus = cek_akses("hapus_novel",$conn);
                    
                    $no = 0;
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                        $no++;
                        
                        echo "<tr>
                            <td align='center'>".$no."</td>
                            <td align='center'><img class='img-thumbnail' width='150px' src='".$row['file_cover']."'</td>
                            <td>".$row['judul_novel']."</td>
                            <td>";
                        
                        $btn = [];
                        $btn[] = "<a href='?page=form_edit_novel&id=".$row['id_novel']."'>Edit</a>";
                        $btn[] = "<a href='?page=baca_novel&id=".$row['id_novel']."'>Baca</a>";
                        if($cek_hapus)
                        {
                            $btn[] = "<a href='?page=hapus_novel&id=".$row['id_novel']."'>Hapus</a>";
                        }
                        echo implode(" | ",$btn);
                                
                        echo "</td>
                        </tr>";
                    }
                }
                ?>

            </table>
        </div>
    </div>
</div>