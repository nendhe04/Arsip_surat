<html>
	<head>
		<title>Form Tambah</title>
	</head>
	<body>
		<div style="margin-left:20%">
     <div class="w3-container">
     <h1>Arsip Surat >> unggah</h1>
     
      <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan.<br>
			Catatan : <br>
		<ol>
			<ul>Gunakan file berformat PDF</ul>
		</ol></p>
		</div>
		<!-- Menampilkan Error jika validasi tidak valid -->
		<div style="color: red;"><?php echo validation_errors(); ?></div>

        <div class="w3-container">
		<?php echo form_open('surat/tambah'); ?>
			<table cellpadding="8">
				<tr>
					<td>Nomor Surat</td>
					<td><input type="text" name="nomor_surat" value="<?php echo set_value('nomor_surat'); ?>"></td>
				</tr>
				<tr>
					<td><label>Kategori</label></td>
                       <td><select name="kategori" class="form-control">
                          <option value="pengumuman">Pengumuman</option>
                          <option value="undangan">Undangan</option>
                          <option value="Nota Dinas">Nota dinas</option>
                          <option value="Pemberitahuan">Pemberitahuan</option>
                    </select> </td>
				</tr>
				<tr>
					<td>Judul</td>
					<td><input type="text" name="judul" value="<?php echo set_value('judul'); ?>"></td>
				</tr>
				<tr>
					<td>Waktu Pengarsipan</td>
					<td><input type="date" name="waktu" value="<?php echo set_value('waktu'); ?>"></td>
				</tr>
				<tr>
					<form method="post" enctype="multipart/form-data" action = "<?php echo base_url(); ?>index.php/upload/proses">
					<label><td>File </label></td>
                         <td><input type="file" class="form-control" id="file" name="file"></td>
                     </label>
                 </form>
				</tr>
			</table>
				
			<hr>
			<a href="<?php echo base_url(); ?>"><input type="button" class="btn btn-primary" value="<<Kembali"></a>
			<input type="submit" name="submit" value="Simpan">
			
		<?php echo form_close(); ?>
		</div>
	</body>
</html>
