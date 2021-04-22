
        <!-- Begin Page Content -->
        <div class="container-fluid">
        
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?=$title; ?></h1>
          </div>

          <div class="row">
            <div class="col-lg-8">
              <?=form_open_multipart('user/myprofil/edit_aksi'); ?>

              <div class="form-group row">
                <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nip" name="nip" value="<?=$user['nip']?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama" name="nama"value="<?=$user['nama']?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?=$user['tgl_lahir']?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                  <select name="j_kelamin" id="j_kelamin" class="form-control input-lg"
                    required oninvalid="this.setCustomValidity('Pilih Jenis Kelamin dulu!')" oninput="setCustomValidity('')">
                      <option value="">Pilih Jenis Kelamin</option>
                      <?php 
                          if ($user['j_kelamin']=='Laki-laki'){
                              echo "<option value='Laki-laki' selected>
                                    Laki-laki</option>
                                    <option value='Perempuan'>Perempuan
                                    </option>";
                            } else {
                              echo "<option value='Laki-laki'>Laki-laki</option>
                                    <option value='Perempuan' selected>Perempuan
                                    </option>"; 
                          }
                                                   
                      ?>
                    </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="no_hp" class="col-sm-2 col-form-label">No.Hp</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?=$user['no_hp']?>">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2">Foto</label>
                <div class="col-sm-10">
                  <div class="row">
                      <div class="col-sm-3">
                        <img src="<?=base_url('assets/img/').$user['foto']?>" class="img-thumbnail">
                      </div>
                      <div class="col-sm-9">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="foto" name="foto">
                          <label class="custom-file-label" for="customFile">Pilih foto</label>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-info">Ubah</button>
                </div>
              </div>
            </form>
                <div class="col-sm-10">
                  <a href="<?=base_url('user/myprofil')?>" class="btn btn-secondary">Kembali</a>
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
          <a class="btn btn-primary" href="<?= base_url('agen/main'); ?>">Ya</a>
        </div>
      </div>
    </div>
  </div>

<!-- end modal logout -->
