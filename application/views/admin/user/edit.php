 <div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Ubah Data User</h1>
   </div>
   <div class="row-mt-3">
      <div class="col-md-6">
         <form action="" method="post">
            <div class="form-body">

               <div class="form-group">
                  <label for="">ID Admin</label>                  
                  <input class="form-control" type="text" name="id" id="id" value="<?= $user['id_admin'] ?>" disabled>
               </div>
               <div class="form-group">
                  <label for="">ID Tipe</label>
                  <input class="form-control" type="text" name="id_tipe" id="id_tipe"  value="<?= $user['id_tipe']; ?>" disabled>
               </div>
<!-- ========================================================================= -->
               <div class="form-group">
                  <label for="">Pilih Tipe Admin</label>
                  <select class="form-control" id="keterangan" name="keterangan">
                     <?php foreach ($tipe as $t):?>
                        <?php if($t == $tipe['keterangan']): ?>
                           <option value="<?= $t->keterangan; ?>" selected><?= $t->keterangan; ?></option>
                        <?php else: ?>
                           <option value="<?= $t->keterangan; ?>"><?= $t->keterangan; ?></option>
                        <?php endif ?>
                     <?php endforeach; ?>
                  </select>
               </div>

               <div class="form-group">
                  <label for="">NIP</label>
                  <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP" value="<?= $user['nip']; ?>">
                  <small class="form-text text-danger"><?= form_error('nip'); ?></small>
               </div>
               <div class="form-group">
                  <label for="">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $user['username']; ?>">
                  <small class="form-text text-danger"><?= form_error('username'); ?></small>
               </div>
               <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?= $user['password']; ?>">
                  <small class="form-text text-danger"><?= form_error('password'); ?></small>
               </div>
               <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $user['email']; ?>">  
                  <small class="form-text text-danger"><?= form_error('email'); ?></small>
               </div>
               <div class="form-group">
                  <label for="">Nama</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="<?= $user['nama']; ?>">
                  <small class="form-text text-danger"><?= form_error('name'); ?></small>
               </div>
               <div class="form-group">
                  <label for="">Jabatan</label>
                  <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Tulis Jabatan Anda" value="<?= $user['jabatan']; ?>">
                  <small class="form-text text-danger"><?= form_error('jabatan'); ?></small>
               </div>
               <a  class="btn btn-danger" href="<?= base_url('admin/user'); ?>" role="button">Back</a>
               <button class="btn btn-primary" name="edit" type="submit">Edit Data</button>
            </div>
         </form>
      </div>
   </div>
</div>