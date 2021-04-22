<div class="container-fluid">
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
        <div class="card-body">
          <a href="<?=base_url('admin/galeri'); ?>" class="badge badge-danger">
            <i class="far fa-arrow-alt-circle-left"></i> Kembali</a><br><br>
          <div class="table-responsive">
            <?php foreach($galeri as $row)  : ?>
            <form method="post" action="<?=base_url() .'admin/galeri/edit_aksi'; ?>">
              <div class="form-group">
                <input type="hidden" class="form-control" id="id_galeri" name="id_galeri" value="<?=$row->id_galeri; ?>">
                <div>
                <img src="<?=base_url("assets/img/galeri/").$row->galeri; ?>" id="galeri" width="100px">
                </div>
                <label>Galeri</label>
                <input type="file" class="form-control" id="galeri" name="galeri" value="<?=$row->galeri; ?>">
              </div>
              <div class="form-group">
                <label>Keterangan Galeri</label>
                <textarea type="text" class="form-control" id="ket" name="ket"
                rows="5"><?=$row->ket; ?></textarea>
              </div>
              <button type="submit" class="btn btn-primary float-right">Simpan</button>
          </form>
          <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>