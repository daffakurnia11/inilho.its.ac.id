<body class="body-bg-ts">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<?php if ($status == "GAGAL" ) { ?>
					<form action="<?php echo base_url()."DaftarTalkshowILITS2021" ?>" class="login100-form validate-form" name="done" id="done" method="POST">
						<span class="login100-form-title">
							Data tidak ditemukan
						</span>
						<span class="login100-form-titlex">
							Email yang kamu masukkan mungkin salah, yuk coba cek lagi emailnya
						</span>
						<span class="login100-form-title">

						</span>
						<div class="container-login100-form-btn">
							<div class="wrap-login100-form-btn">
								<div class="login100-form-bgbtn"></div>
								<button class="login100-form-btn" name="submit" type="submit" form="done" value="submit">
									Klik untuk kembali!
								</button>
							</div>
						</div>
					</form>
				<?php } else { ?>
					<form action="<?php echo base_url()."DaftarTalkshowILITS2021" ?>" class="login100-form validate-form" name="done" id="done" method="POST">
						<span class="login100-form-title">
							Selamat kamu sudah terdaftar!
						</span>

						<span class="login100-form-titlex">
							Kamu udah terdaftar nih jadi peserta TALKSHOW INSPIRATIF INI LHO ITS 2021! Acara ini akan di laksanakan hari <br> <b>Sabtu, 6 Febuari 2021</b>, catat waktu pelaksanaannya ya!
							<br> Untuk link Talkshow akan dilaksanakan melalui zoom dengan link berikut <a href="https://inilho.its.ac.id/TalkshowILITS2021"><b>inilho.its.ac.id/TalkshowILITS2021</b></a>
							<br>Agar tidak tertinggal informasi lainnya, pantau terus instagram kita di <a href="https://www.instagram.com/inilhoits/"><b>@inilhoits</b></a>.
							<br><br>

							Terima kasih banyak. Sampai ketemu di room zoom. See You There!
						</span>

						<form action="<?php echo base_url()."DaftarTalkshowILITS2021" ?>" class="login100-form validate-form" name="done" id="done">
							<div class="container-login100-form-btn">
								<div class="wrap-login100-form-btn">
									<div class="login100-form-bgbtn"></div>
									<button class="login100-form-btn" name="submit" type="submit" form="done" value="submit">
										Klik untuk kembali ke DaftarTalkshowILITS2021!
									</button>
								</div>
							</div>
						</form>
					<?php } ?>
				</div>
			</div>
		</div>