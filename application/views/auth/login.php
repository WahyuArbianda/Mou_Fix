<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
   <title> Aplikasi MOU</title>
   <link href="<?= base_url('assets/');  ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
   <link href="<?= base_url('assets/');  ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
               <div class="card-body p-0">                     
                  <div class="row">
                     <div class="col-lg">
                        <div class="p-5">
                           <div class="text-center">
                              <h1 class="h4 text-gray-900 mb-4">
                                 <b>SELAMAT DATANG DI APLIKASI MOU</b>
                              </h1>                            
                              <img src="<?= base_url('assets/'); ?>kominfo2.png" style="width: 60%; height: 70%; "></img>
                           </div>&nbsp;
                           
                           <?= $this->session->flashdata('message'); ?>

                           <form class="user" method="post" action="<?= base_url('auth'); ?>">
                              <div class="form-group">
                                 <input type="text" class="form-control form-control-user" id="email" placeholder="Enter Email Address" name="email" 
                                 value="<?= set_value('email') ?>">
                                 <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
                              </div>
                              <div class="form-group">
                                 <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                                 <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
                              </div>
                              <button type="submit" class="btn btn-primary btn-user btn-block">
                                 Login
                              </button>                              
                           </form>
                           <hr>
                           <div align="center">
                              <small>Copyright &copy; Dinas Komunikasi dan Informatika Kota Malang <?= date('Y'); ?></small>
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script src="<?= base_url('assets/');  ?>vendor/jquery/jquery.min.js"></script>
   <script src="<?= base_url('assets/');  ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="<?= base_url('assets/');  ?>vendor/jquery-easing/jquery.easing.min.js"></script>
   <script src="<?= base_url('assets/');  ?>js/sb-admin-2.min.js"></script>
</body>
</html>