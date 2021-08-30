<html>
	<head>
		<title>Arsip Surat XYZ</title>
	</head>
	<body>
		<!-- Page Content -->
    <div style="margin-left:20%">
     <div class="w3-container">
     <h1>Arsip Surat >> Lihat</h1>
     </div>
    <table border="0" cellpadding="4">
       <?php $no=1; foreach ($surat as $data) { ?>
        <tr>
            <td size="90">Nomor Surat</td>
            <td>: <?php echo $data['nomor_surat']?></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td>: <?php echo $data['kategori']?></td>
        </tr>
        <tr>
            <td>Judul</td>
            <td>: <?php echo $data['judul']?></td>
        </tr>
        <tr>
            <td>Waktu Pengarsipan</td>
            <td>: <?php echo $data['waktu']?></td>
        </tr>
        <tr>
            <td>File</td>
            <td>: <?php echo $data['file']?></td>
        </tr>
        <tr height="40">
            <td></td>
            <td>   <a href="./">Kembali</a></td>
        </tr>
        </tr>
       <!-- <?php $no++; } ?> -->
   <?php } ?>
    </table>
</body>
</html>