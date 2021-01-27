
<body class="body-bg-ts">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="<?php echo base_url()."inputtalkshow" ?>" class="login100-form validate-form" name="oprec" id="oprec" method="POST" enctype="multipart/form-data">
					<span class="login100-form-title">
						FORMULIR PENDAFTARAN<br>TALKSHOW INSPIRATIF<br>INI LHO ITS! 2021
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Tulis Nama Lengkap">
						<input class="input100" type="text" name="nama">
						<span class="focus-input100" data-placeholder="Nama Lengkap"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Masukkan Asal Sekolah Anda">
						<input class="input100" type="text" name="sekolah">
						<span class="focus-input100" data-placeholder="Asal Sekolah"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Masukkan Nomor Telepon Valid Anda [10-15 digit angka]">
						<input class="input100" type="text" name="no_hp">
						<span class="focus-input100" data-placeholder="Nomor Telepon"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Masukkan ID Line Anda">
						<input class="input100" type="text" name="line">
						<span class="focus-input100" data-placeholder="ID Line"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Masukkan Email Anda">
						<input class="input100" type="email" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					<span id="email_result"></span>
					</div>

					<label><p>Upload Bukti SS Instastory (Max. File Size 2MB)</p></label>
					<div class="wrap-input100 validate-input" data-validate = "Anda belum upload file">
						<input class="input100" type="file" name="file">
						<span class="focus-input100" data-placeholder=""></span>
					<p>Syarat Pendaftaran : Share slide pertama dari post feeds IG pada link berikut : <a href="https://www.instagram.com/p/CKfZt5wJqH9/?utm_source=ig_web_copy_link">https://www.instagram.com/p/CKfZt5wJqH9/?utm_source=ig_web_copy_link</a> ke instastory kalian masing-masing. Jangan lupa tag min. 3 teman kalian dan beri kalimat ajakan semenarik mungkin !</p>
					</div>

					<label><p>Dari mana kalian tahu informasi tentang Talkshow Inspiratif INI LHO ITS! 2021?</p></label>
					<input type="checkbox" id="sekolah" name="info[]" value="sekolah">
					<label for="sekolah">Sekolah</label><br>

					<input type="checkbox" id="teman" name="info[]" value="teman">
					<label for="teman">Teman</label><br>

					<input type="checkbox" id="keluarga" name="info[]" value="keluarga">
					<label for="keluarga">Keluarga</label><br>

					<input type="checkbox" id="medsos" name="info[]" value="media sosial">
					<label for="medsos">Media Sosial</label><br>

					<input type="checkbox" id="lain" onclick="checkbox_cek()">
					<label for="lain">Lain - Lain</label><br>

					<div class="wrap-input100" id="lain-lain" style="display: none;">
						<input class="input100" type="text" name="lain">
						<span class="focus-input100" data-placeholder="Lain-lain"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="submit" type="submit" form="oprec" value="submit">
								Yuk Daftar!
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>