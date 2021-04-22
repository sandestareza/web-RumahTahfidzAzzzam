<div class="container-fluid">
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
        <div class="card-body">
          <a href="<?=base_url('admin/kelas'); ?>" class="badge badge-danger">
            <i class="far fa-arrow-alt-circle-left"></i> Kembali</a><br><br>
          <div class="table-responsive">
            <?php foreach($kelas as $row)  : ?>
            <form method="post" action="<?=base_url() .'admin/kelas/edit_aksi'; ?>">
              <div class="form-group">
                <label>Id Kelas</label>
                <input type="text" class="form-control" id="id_kelas" name="id_kelas" value="<?=$row->id_kelas; ?>" readonly>
              </div>
              <div class="form-group">
                <label>Kelas</label>
                <input type="text" class="form-control" id="kelas" name="kelas"
                required oninvalid="this.setCustomValidity('Kelas harus diisi!')" oninput="setCustomValidity('')" value="<?=$row->kelas; ?>">
              </div>  
              <button type="submit" class="btn btn-primary float-right">Simpan</button>
          </form>
          <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>