
        <!-- Begin Page Content -->
        <div class="container-fluid">
        
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?=$title; ?></h1>
          </div>

          <?php if ($this->session->flashdata('pesan')) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert"> Password
            <strong><?= $this->session->flashdata('pesan'); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php endif; ?> 
          <div class="row">
            <div class="col-lg-8">
              <form action="<?=base_url('admin/gantipassword')?>" method="post">
                    <div class="form-group">
                            <label>Password Lama</label>
                            <input type="password" class="form-control" id="old_pass" name="old_pass">
                            <?= form_error('old_pass','<small class="text-danger pl-3">', '</small>');?>
                    </div><br>
                    <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" class="form-control" id="new_pass" name="new_pass">
                            <?= form_error('new_pass','<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <div class="form-group">
                            <label>Ulangi Password</label>
                            <input type="password" class="form-control" id="new_pass1" name="new_pass1">
                            <?= form_error('new_pass1','<small class="text-danger pl-3">', '</small>');?>
                    </div>   
                    <button type="submit" class="btn btn-primary float-right">Ubah Password</button>
              </form>
            </div>
          </div>                    
          
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin mau logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Jika pilih ya anda akan logout, ingin batal klik cancel atau tanda kali(x)</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Ya</a>
      </div>
    </div>
  </div>

<!-- end modal logout -->
