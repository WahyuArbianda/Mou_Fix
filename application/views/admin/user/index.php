<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Data User</h1>
	</div>
	
	<?php if (validation_errors()): ?>
		<div class="alert alert-danger" role="alert">
			<?= validation_errors(); ?>
		</div>
	<?php endif; ?> 

	<?= $this->session->flashdata('message'); ?>

	<a href="" class="btn btn-primary btn-md mb-3" data-toggle="modal" data-target="#ModalTambahUser">Tambah Data User</a>
	<a href="" class="btn btn-secondary btn-md mb-3" data-toggle="modal" data-target="#ModalTambahTipeAdmin">Tambah Tipe Admin</a>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data User</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>NIP</th>
							<th>Username</th>
							<th>Email</th>
							<th>Jabatan</th>
							<th>Action</th>

						</tr>
					</thead>
		
					<tbody>
						<?php foreach ($user as $u): ?>
						<tr> 
							<td><?= $u->nip; ?></td>
							<td><?= $u->username; ?></td>
							<td><?= $u->email; ?></td>
							<td><?= $u->jabatan; ?></td>
							<td>
								<a href="<?= base_url("admin/user/detail/".$u->id_admin); ?>" class="badge badge-pill badge-primary">Detail</a>
								<a href="<?= base_url("admin/user/edit/".$u->id_admin); ?>" class="badge badge-pill badge-warning">Edit</a>
								<a href="<?= base_url("admin/user/delete/".$u->id_admin); ?>" class="badge badge-pill badge-danger" onclick="return confirm('Yakin hapus data?');">Delete</a>
							</td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>





<!-- Modal Tambah User -->
<div class="modal fade" id="ModalTambahUser" tabindex="-1" role="dialog" 
aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('admin/user/add'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="nip" name="nip" placeholder="NIP">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="username" name="username" placeholder="Username">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password">
					</div>
					<div class="form-group">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email">		
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap">
					</div>
					<div class="form-group">
						<!-- <select class="form-control" id="jabatan" name="jabatan">
							<option value="Super Admin">Super Admin</option>
							<option value="Admin MOU">Admin MOU</option>
							<option value="Admin PKS">Admin PKS</option>
						</select>
						 -->
						<select class="form-control" name="jabatan" id="jabatan">
							<option value="0">Pilih Jabatan</option>
							<?php foreach ($tipe as $t): ?>
								<option value="<?= $t->keterangan; ?>"><?= $t->keterangan; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<input name="id_tipe" id="id_tipe" value="<?= $t->id_tipe=>keterangan ?>">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>





<!-- Modal Tambah Tipe Admin -->
<div class="modal fade" id="ModalTambahTipeAdmin" tabindex="-1" role="dialog" 
aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Tipe Admin</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<form action="<?= base_url('admin/tipe/add'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Tuliskan Tipe Admin">
					</div>
					<div class="modal-footer" cellspacing="0">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Tambah</button>
					</div>
				</div>

				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Data Tipe Admin</h6>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead align="center">
									<!-- <th>ID Tipe</th> -->
									<th>Tipe Admin</th>
									<th>Action</th>
								</thead>
								<tbody align="center">

									<?php foreach ($tipe as $t): ?>
									<tr> 
										<!-- <td><?= $t->id_tipe; ?></td> -->
										<td><?= $t->keterangan; ?></td>
										<!-- <td>
											<?php if ($t->is_delete=='1'): ?>
												<a href="#!" class="badge badge-pill badge-secondary">Active</a>
											<?php else: ?>
												<a href="#!" class="badge badge-pill badge-success">Disable</a>
											<?php endif ?>
										</td> -->
										<td>
											<!-- <a href="<?= base_url("admin/user/edit/".$u->id_admin); ?>" class="badge badge-pill badge-warning">Edit</a> -->
											<a href="<?= base_url("admin/user/delete/".$u->id_admin); ?>" class="badge badge-pill badge-danger" onclick="return confirm('Yakin hapus data?');">Delete</a>
										</td>
									</tr>
									<?php endforeach;?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>