
        <!-- Begin Page Content -->
        <div class="container-fluid">
        
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">My Profil</h1>
          </div>

          <?php if ($this->session->flashdata('pesan')) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert"> Data
            <strong>berhasil</strong> <?= $this->session->flashdata('pesan'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php endif; ?>                     
          <div class="row">
                <div class="col-sm-6">
                  <div class="card col-lg-10">
                    <div class="row no-gutters">
                      <div class="col-md-4">
                        <img src="<?=base_url('assets/img/'. $user['foto'])?>" class="card-img">
                      </div>
                      <div class="card-body">
                       <h4 class="card-title text text-primary"><?=$user['nama']; ?></h4>
                       <hr class="sidebar-divider my-0"><br>
                        <p class="card-text ">NIP: <?=$user['nip']; ?><br>
                        Jenis Kelamin: <?=$user['j_kelamin']; ?><br>
                        Tanggal Lahir: <?=date('d M Y',strtotime($user['tgl_lahir'])); ?><br>
                        No.Hp: <?=$user['no_hp']; ?></p>
                        <a href="<?=base_url('admin/myprofil/edit')?>"
                        class="badge badge-info">
                        <i class="fas fa-edit"></i> edit profil</a>
                      </div>
                    </div>
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
  </div>

<!-- end modal logout -->
