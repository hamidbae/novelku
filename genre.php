<?php
    // simpan dengan nama genre.php
    if(defined("GELANG") === false)
    {
        // tidak punya gelang
        die("Anda tidak boleh membuka halaman ini secara langsung!");
    }

    // tuliskan query untuk mengambil data di dalam tabel
    $sql = "select * from genre where soft_delete=0";

    $result = mysqli_query($conn, $sql);
?>

<div class="container">
<br />
    <a href="?page=form_genre" class="btn btn-primary">Tambah Baru</a>
    <br /><br />
    <div class="row">
        <div class="col">
            <table class='table'>
                <tr>
                    <th>No.</th>
                    <th>Nama Genre</th>
                    <th>Aksi</th>
                </tr>

                <?php
                if(mysqli_num_rows($result) > 0) 
                {
                    // apakah punya kewenangan hapus?
                    $cek_hapus = cek_akses("hapus_genre",$conn);
                    
                    $no = 0;
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                        $no++;
                        
                        echo "<tr>
                            <td>".$no."</td>
                            <td>".$row['nama_genre']."</td>
                            <td>";
                        
                        $btn = [];
                        $btn[] = "<a href='?page=form_edit_genre&id=".$row['id_genre']."'>Edit</a>";
                        
                        if($cek_hapus)
                        {
                            $btn[] = "<a href='?page=hapus_genre&id=".$row['id_genre']."'>Hapus</a>";
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