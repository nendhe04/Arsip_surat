<html>
	<head>
		<title>Arsip Surat XYZ</title>
	</head>
	<body>
		<!-- Page Content -->
    <div style="margin-left:20%">
     <div class="w3-container">
     <h1>Arsip Surat</h1>
      <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br> Klik "lihat" pada kolom aksi untuk menampilkan surat</p>
      </div>
     <div class="w3-container">
		<!-- <div align="left">Cari: <input type="text" id="surat"></div>
 -->
    <?php echo form_open('surat/search') ?>
    <a>Cari Surat</a>
		<input type="text" name="keyword" placeholder="search">
		<input type="submit" name="search_submit" value="Cari">
	<?php echo form_close() ?>
	<br>
		<table border="1" cellpadding="7">
			<tr>
				<th>Nomor Surat</th>
				<th>Kategori</th>
				<th>Judul</th>
				<th>Waktu Pengarsipan</th>
				<!-- <th>File</th> -->
				<th colspan="3">Aksi</th>
			</tr>
			 <tbody>
                        <?php
                        $no = 1;
                        $query = $this->db->get('surat');
                        foreach ($query->result() as $row) {
                        ?>
                        <tr>
                            <td><?= $row->nomor_surat ?></td>
                            <td><?= $row->kategori ?></td>
                            <td><?= $row->judul; ?></td>
                            <td><?= $row->waktu ?></td>
                            <!-- <td><?= $row->file ?></td> -->
                            <td>

                                <a href="<?= base_url('Surat/hapus?nomor_surat=' . $row->nomor_surat) ?>"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus arsip surat ini ?')"
                                    ><input type="button" class="btn btn-danger" value="Hapus"></a>
                                <a href="<?= base_url('Surat/downloadSurat?id=' . $row->nomor_surat) ?>"
                                 ><input type="button" class="btn-warning" value="Unduh"></a>
                                <a href="<?= base_url('Surat/detail?id=' . $row->nomor_surat) ?>"
                                 ><input type="button" class="btn-primary" value="Lihat>>"></a>

                            </td>
                        </tr>
                        <?php
                            $no = $no + 1;
                        };?>
                    </tbody>
                </table>
                <br>

		<a href='<?php echo base_url("Surat/tambah"); ?>'> <input type="button" name="btn btn-primary" value="Arsipkan Surat"></a><br><br>
	</body>
</html>
