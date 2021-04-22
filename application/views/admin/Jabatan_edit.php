<div class="container-fluid">
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
        <div class="card-body">
          <a href="<?=base_url('admin/jabatan'); ?>" class="badge badge-danger">
            <i class="far fa-arrow-alt-circle-left"></i> Kembali</a><br><br>
          <div class="table-responsive">
            <?php foreach($jabatan as $row)  : ?>
            <form method="post" action="<?=base_url() .'admin/jabatan/edit_aksi'; ?>">
              <div class="form-group">
                <label>Id Jabatan</label>
                <input type="text" class="form-control" id="id_jabatan" name="id_jabatan" value="<?=$row->id_jabatan; ?>" readonly>
              </div>
              <div class="form-group">
                <label>Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan"
                required oninvalid="this.setCustomValidity('jabatan harus diisi!')" oninput="setCustomValidity('')" value="<?=$row->jabatan; ?>">
              </div>  
              <button type="submit" class="btn btn-primary float-right">Simpan</button>
          </form>
          <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>