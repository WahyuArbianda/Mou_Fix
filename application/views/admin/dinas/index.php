<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Data Dinas</h1>
	</div>
	
	<?php if (validation_errors()): ?>
		<div class="alert alert-danger" role="alert">
			<?= validation_errors(); ?>
		</div>
	<?php endif; ?> 

	<?= $this->session->flashdata('message'); ?>

	<a href="" class="btn btn-primary btn-md mb-3" data-toggle="modal" data-target="#ModalTambahDinas">Tambah Data Dinas</a>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Dinas</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>ID Dinas</th>
							<th>Nama Dinas</th>
							<th>Alamat</th>
							<th>Status</th>
							<th>Action</th>

						</tr>
					</thead>
		
					<tbody>
						<?php foreach ($dinas as $d): ?>
						<tr> 
							<td><?= $d->id_dinas; ?></td>
							<td><?= $d->nama_dinas; ?></td>
							<td><?= $d->alamat; ?>
							<!-- <td><?= $d->is_delete; ?></td> -->
							<td>
								<?php if ($d->is_delete=='1'): ?>
									<a href="#!" class="badge badge-pill badge-secondary">Active</a>
								<?php else: ?>
									<a href="#!" class="badge badge-pill badge-success">Disable</a>
								<?php endif ?>
							</td>
							<td>
								<a href="<?= base_url("admin/user/detail/".$d->id_admin); ?>" class="badge badge-pill badge-primary">Detail</a>
								<a href="<?= base_url("admin/user/edit/".$d->id_admin); ?>" class="badge badge-pill badge-warning">Edit</a>
								<a href="<?= base_url("admin/dinas/delete/".$d->id_dinas); ?>" class="badge badge-pill badge-danger" onclick="return confirm('Yakin hapus data?');">Delete</a>
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
<div class="modal fade" id="ModalTambahDinas" tabindex="-1" role="dialog" 
aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Dinas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('admin/dinas/add'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="namadinas" name="namadinas" placeholder="Nama Dinas">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
					</div>


					<fieldset class="form-group">
						<div class="row">
							<legend class="col-form-label col-sm-12 pt-0">Aktivasi Dinas</legend>
							<div class="col-sm-12" name="is_delete">
								<div class="form-check">
									<div class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" id="activeDinas" name="is_delete" value="1">
										<label class="custom-control-label" for="activeDinas">Active</label>
									</div>
									<div class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" id="disableDinas" name="is_delete" value="0">
										<label class="custom-control-label" for="disableDinas">Disable</label>
									</div>
								</div>								
							</div>
						</div>
					</fieldset>

					
					<div class="form-group">
						<select class="custom-select" id="id_admin" name="id_admin" required>
							<option value="">Pilih Email Admin Dinas</option>
							<?php foreach ($email as $e): ?>
								<option value="<?= $e->id_admin ?>"><?= $e->email; ?></option>
							
							<?php endforeach;?> 
						</select>
						<div class="invalid-feedback">Example invalid custom select feedback</div> 
					</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>