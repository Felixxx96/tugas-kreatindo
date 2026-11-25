	<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="<?=base_url()?>">Home</a></li>
								<li>Profil Sekolah</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>

    <!-- isi konten -->

    <div class="courses">
		<div class="container">
			<div class="row">

                <div class="col-sm-4 text-center">
                    <img src="<?=base_url('foto_kepsek/'.$sekolah->foto_kepsek)?>" style="width: 250px; height:350px;">
                    <br>
                    <h3><?=$sekolah->kepala_sekolah?></h3>
                    <h4>NIP : <?=$sekolah->nip?></h4>
                </div>

                <div class="col-sm-8">
                    <div class="form-group">
                        <div class="form_title">Nama Sekolah</div>
                        <input type="text" name="nama_sekolah" class="comment_input" value="<?=$sekolah->nama_sekolah?>" type="text" readonly>
                    </div>

                    <div class="form-group">
                        <div class="form_title">Alamat Sekolah</div>
                        <input type="text" name="alamat" class="comment_input" value="<?=$sekolah->alamat?>" type="text" readonly>
                    </div>

                    <div class="form-group">
                        <div class="form_title">No Telepon</div>
                        <input type="text" name="no_telpon" class="comment_input" value="<?=$sekolah->no_telpon?>" type="text" readonly>
                    </div>
                </div>

                <div class="col-sm-12">
                    <br>
                    <br>
                    <div class="form-group">
                        <div class="form_title"><h4>Visi</h4></div>
                        <p><?= $sekolah->visi ?></p>
                    </div>

                    <div class="form-group">
                        <div class="form_title"><h4>Misi</h4></div>
                        <p><?= $sekolah->misi ?></p>
                    </div>

                    <div class="form-group">
                        <div class="form_title"><h4>Sejarah</h4></div>
                        <p><?= $sekolah->sejarah ?></p>
                    </div>
                </div>

            </div>
		</div>			
	</div>



<!-- Newsletter --> 

	<div class="newsletter">
		<div class="newsletter_background" style="background-image:url(<?=base_url()?>template/front-end/images/newsletter_background.jpg)"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-center justify-content-start">

						<!-- Newsletter Content -->
						<div class="newsletter_content text-lg-left text-center">
							<div class="newsletter_title">sign up for news and offers</div>
							<div class="newsletter_subtitle">Subcribe to lastest smartphones news & great deals we offer</div>
						</div>

						<!-- Newsletter Form -->
						<div class="newsletter_form_container ml-lg-auto">
							<form action="#" id="newsletter_form" class="newsletter_form d-flex flex-row align-items-center justify-content-center">
								<input type="email" class="newsletter_input" placeholder="Your Email" required="required">
								<button type="submit" class="newsletter_button">subscribe</button>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>