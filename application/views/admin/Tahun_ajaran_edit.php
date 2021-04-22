<div class="container-fluid">
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
        <div class="card-body">
          <a href="<?=base_url('admin/thn_ajrn'); ?>" class="badge badge-danger">
            <i class="far fa-arrow-alt-circle-left"></i> Kembali</a><br><br>
          <div class="table-responsive">
            <?php foreach($thn_ajrn as $row)  : ?>
            <form method="post" action="<?=base_url() .'admin/tahun_ajaran/edit_aksi'; ?>">
              <div class="form-group">
                <label>Id Tahun Ajaran</label>
                <input type="text" class="form-control" id="id_thn_ajrn" name="id_thn_ajrn" value="<?=$row->id_thn_ajrn; ?>" readonly>
              </div>
              <div class="form-group">
                <label>Tahun Ajaran</label>
                <input type="text" class="form-control" id="thn_ajrn" name="thn_ajrn"
                required oninvalid="this.setCustomValidity('Tahun Ajaran harus diisi!')" oninput="setCustomValidity('')" value="<?=$row->thn_ajrn; ?>">
              </div>  
              <button type="submit" class="btn btn-primary float-right">Simpan</button>
          </form>
          <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>