<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Detail Profile User</h1>
	</div>
	<div class="card mb-3" style="max-width: 540px;">
		<div class="row no-gutters">
			<div class="col-md-4" align="center" style="padding-left: 2.5%; padding-top: 2.5%; padding-right: 2.5%; padding-bottom: 2.5%;" class="card-img">
				<img src="<?= base_url('assets/img/profile/default.png'); ?>" >
			</div>
			<div class="col-md-8">
				<div class="card-body" align="center">
					<h5 class="card-title"><?= $user['nama']; ?></h5>
					<h6 class="card-text">NIP : <?= $user['nip']; ?></h6>
					<p class="card-text">Email : <?= $user['email']; ?></p>
					<p class="card-text">Jabatan : <?= $user['jabatan']; ?></p>
					<a  class="btn btn-sm btn-primary" href="<?= base_url('admin/user'); ?>" role="button">Back</a>
				</div>
			</div>
		</div>
	</div>
</div>