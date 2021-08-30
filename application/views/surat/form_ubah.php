<html>
	<head>
		<title>Form Ubah Kelurahan XYZ</title>
	</head>
	<body>
		<h1>Edit File</h1>
		<hr>

		<!-- Menampilkan Error jika validasi tidak valid -->
		<div style="color: red;"><?php echo validation_errors(); ?></div>

		<?php echo form_open("surat/ubah_surat/".$surat->nomor_surat); ?>
			<table cellpadding="8">
				<tr>
					<td>Nomor Surat</td>
					<td><input type="text" name="nomor_surat" value="<?php echo set_value('nomor_surat', $surat->nomor_surat); ?>" readonly></td>
				</tr>
				<tr>
					<td>Kategori</td>
					<td>
					<input type="radio" name="kategori" value="Pengumuman" <?php echo set_radio('kategori', 'pengumuman', ($surat->kategori == "Pengumuman")? true : false); ?>> Pengumuman
					<input type="radio" name="kategori" value="Undangan" <?php echo set_radio('kategori', 'undangan', ($surat->kategori == "Undangan")? true : false); ?>> undangan
					</td>
				<tr>
					<td>Judul</td>
					<td><input type="text" name="judul" value="<?php echo set_value('judul', $surat->judul); ?>"></td>
				</tr>
				
				</tr>
				<tr>
					<td>Waktu</td>
					<td><input type="text" name="waktu" value="<?php echo set_value('waktu', $surat->waktu); ?>"></td>
				</tr>
				<tr>
					<td>File</td>
					<td><input type="file" name="file" value="<?php echo set_value('file', $surat->file); ?>"></td>
				</tr>
			</table>
				
			<hr>
			<input type="submit" name="submit" value="Ubah">
			<a href="<?php echo base_url(); ?>"><input type="button" value="Batal"></a>
		<?php echo form_close(); ?>
	</body>
</html>
