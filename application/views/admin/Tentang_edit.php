<div class="container-fluid">
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
        <div class="card-body">
          <a href="<?=base_url('admin/tentang'); ?>" class="badge badge-danger">
            <i class="far fa-arrow-alt-circle-left"></i> Kembali</a><br><br>
          <div class="table-responsive">
            <?php foreach($tentang as $row)  : ?>
            <form method="post" action="<?=base_url() .'admin/tentang/edit_aksi'; ?>">
              <div class="form-group">
                <label>Visi</label>
                <input type="hidden" class="form-control" id="id_tentang" name="id_tentang" value="<?=$row->id_tentang; ?>">
                <input type="text" class="form-control" id="visi" name="visi" value="<?=$row->visi; ?>">
              </div>
              <div class="form-group">
                <label>Misi</label>
                <input type="text" class="form-control" id="misi" name="misi"
                value="<?=$row->misi; ?>">
              </div>
              <button type="submit" class="btn btn-primary float-right">Simpan</button>
          </form>
          <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>