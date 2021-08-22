<div id="label-page">
    <h3>Input Transaksi Pinjaman</h3>
</div>
<div id="content">
    <form action="proses/transaksi-input-proses.php" method="post" enctype="multipart/form-data">

        <table id="tabel-input">
            <tr>
                <td class="label-formulir">ID Transaksi</td>
                <td class="isian-formulir"><input type="text" name="id_transaksi" class="isian-formulir isian-formulir-border"></td>
            </tr>
            <tr>
                <td class="label-formulir">Anggota</td>
                <td class="isian-formulir">
                    <select class="isian-formulir" name="id_anggota">
                        <option selected>Pilih Data Anggota</option>
                        <?php

                        $query = "SELECT * FROM tbanggota";

                        $q_tampil_anggota = mysqli_query($db, $query);

                        if (mysqli_num_rows($q_tampil_anggota) > 0) {
                            while ($r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota)) {
                        ?>

                                <option value="<?php echo $r_tampil_anggota['idanggota']; ?>">
                                    <?php echo $r_tampil_anggota['nama']; ?></option>
                        <?php $nomor++;
                            }
                        } else {
                            echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
                        } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Buku</td>
                <td class="isian-formulir">
                    <select class="isian-formulir" name="id_buku">
                        <option selected>Pilih Data Buku</option>
                        <?php

                        $query = "SELECT * FROM tbbuku";

                        $q_tampil_buku = mysqli_query($db, $query);

                        if (mysqli_num_rows($q_tampil_buku) > 0) {
                            while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) {
                        ?>

                                <option value="<?php echo $r_tampil_buku['idbuku']; ?>">
                                    <?php echo $r_tampil_buku['judulbuku']; ?></option>
                        <?php $nomor++;
                            }
                        } else {
                            echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
                        } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Tanggal Pinjam</td>
                <td class="isian-formulir"><input type="text" class="isian-formulir isian-formulir-border" placeholder="<?php echo date("Y-m-d");  ?>" disabled></td>
                <td class="isian-formulir"><input type="hidden" name="tgl_pinjam" class="isian-formulir isian-formulir-border" value="<?php echo date("Y-m-d");  ?>"></td>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="tombol"></td>
            </tr>
        </table>
    </form>
</div>