 <div class="container-fluid">
 <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
        <div class="card-body">
        <div class="table-responsive">
        <?php if ($this->session->flashdata('pesan')) : ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert"> Data
          <strong>berhasil</strong> <?= $this->session->flashdata('pesan'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php endif; ?>

        <button class="btn btn-sm btn-info mb-3" data-toggle="modal" data-target="#tambah">
        <i class="fa fa-plus fa-sm"></i> Tambah Galeri</button>
        </button>
        </div>
        <table id="data" class="table table-bordered table-hover">
        <thead class="table-info">
      <tr>
            <th>#</th>
            <th>Galeri</th>
            <th>Keterangan</th>
            <th style="width: 15%">Opsi</th>
      </tr>
        </thead>
    <tbody">
      <?php
      $no=1;
      foreach ($galeri as $row) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row->galeri; ?></td>
            <td><?= $row->ket; ?></td>
            <td class="text-center">
                <a href="<?=base_url(); ?>admin/galeri/edit/<?= $row->id_galeri; ?>" 
                class="badge badge-pill badge-warning"><i class="fa fa-edit"></i> Edit</a>
                <a href="<?=base_url(); ?>admin/galeri/hapus/<?= $row->id_galeri; ?>"
                class="badge badge-pill badge-danger" onclick="return confirm('yakin?');">
                <i class="fa fa-trash"></i> Hapus</a>    
            </td>
        </tr>  
        <?php endforeach; ?>
    </tbody>
    </table>

</div>
</div>
</div>
</div>

</div> 

<!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

<!-- Modal tambah-->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah <?= $title; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <?=form_open_multipart('admin/galeri/tambah_aksi'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Galeri</label>
                    <input type="file" class="form-control" id="galeri" name="galeri">
                </div>
                <div class="form-group">
                    <label>Keterangan Galeri</label>
                    <textarea type="text" class="form-control" id="ket" name="ket" rows="5"></textarea>
                </div> 
            </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </form>
        </div>
            
    </div>
  </div>
</div>
<!-- end Modal tambah-->


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

