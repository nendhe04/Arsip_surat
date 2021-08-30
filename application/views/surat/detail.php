<html>
	<head>
		<title>Arsip Surat XYZ</title>
	</head>
	<body>
		<!-- Page Content -->
    <div style="margin-left:20%">
     <div class="w3-container">
     <h1>Arsip Surat >> Lihat</h1>
     
    <table border="0" cellpadding="4">
       <?php $no=1; foreach ($surat as $data) { ?>
        <tr>
            <td size="90">Nomor Surat : </td>
            <td><?= $data->nomor_surat ?></td>
        </tr>
        <tr>
            <td>Kategori : </td>
            <td><?= $data->kategori ?></td>
        </tr>
        <tr>
            <td>Judul : </td>
            <td><?= $data->judul ?></td>
        </tr>
        <tr>
            <td>Waktu Pengarsipan : </td>
            <td><?= $data->waktu ?></td>
        </tr>
        <!-- <tr height="40">
            <td></td>
            <td>   <a href="./">Kembali</a></td>
        </tr> -->
        </tr>
       <!-- <?php $no++; } ?> -->
 <!--   } ?> -->
    </table>
    <iframe src="<?= base_url() ?>assets/upload/<?php echo $data->file ?>" width="100%" height="100px">
            </iframe>
    <br>
    <br>
    <br>
    <a href="<?php echo base_url(); ?>">
            <input type="button" class="btn btn-primary" value="<<Kembali"></a>

            <a href="<?php echo base_url('surat/ubah_surat?nomor_surat=' . $data->nomor_surat); ?>">
            <input type="submit" name="submit" value="Edit/Ganti file">

            <a href="<?= base_url('surat/download?nomor_surat=' . $data->nomor_surat) ?>">
            <input type="button" class="btn-warning" value="Unduh"></a>
    </div>
</body>
</html>