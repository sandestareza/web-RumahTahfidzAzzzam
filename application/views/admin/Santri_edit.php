<div class="container-fluid">
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
        <div class="card-body">
          <a href="<?=base_url('admin/santri'); ?>" class="badge badge-danger">
            <i class="far fa-arrow-alt-circle-left"></i> Kembali</a><br><br>
          <div class="table-responsive">
            <?php foreach($santri as $row)  : ?>
            <?= form_open_multipart('admin/santri/edit_aksi'); ?>
                <div class="form-group">
                  <label>Nis</label>
                  <input type="text" class="form-control" id="nis" name="nis"
                  value="<?=$row->nis; ?>" readonly>
               </div>
               <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                  value="<?=$row->nama_lengkap; ?>">
               </div>
               <div class="form-group">
                  <label>Jenis Kelamin</label>
                    <select name="j_kelamin" id="j_kelamin" class="form-control input-lg"
                    required oninvalid="this.setCustomValidity('Pilih Jenis Kelamin dulu!')" oninput="setCustomValidity('')">
                      <option value="">Pilih Jenis Kelamin</option>
                      <?php 
                          if ($row->j_kelamin=='Laki-laki'){
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
               <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                  value="<?=$row->tgl_lahir; ?>">
               </div>
               <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" id="alamat" name="alamat"
                  value="<?=$row->alamat; ?>">
               </div>
               <div class="form-group">
                  <label>Nama Orang Tua</label>
                  <input type="text" class="form-control" id="nm_ortu" name="nm_ortu"
                  value="<?=$row->nm_ortu; ?>">
               </div>
               <div class="form-group">
                  <label>Kelas</label>
                    <select name="kelas" id="kelas" class="form-control input-lg"
                    required oninvalid="this.setCustomValidity('Pilih Kelas dulu!')" oninput="setCustomValidity('')">
                      <option value="">Pilih Kelas</option>
                      <?php 
                        foreach ($kelas as $kls){
                          if ($row->id_kelas==$kls->id_kelas){
                              $pilih="selected";
                            } else {
                              $pilih="";
                            }           
                            echo "<option value='$kls->id_kelas'$pilih>".$kls->kelas."</option>";             
                        }
                      ?>
                    </select>
               </div>
               <div class="form-group">
                  <label>Tahun Ajaran</label>
                    <select name="thn_ajrn" id="thn_ajrn" class="form-control input-lg"
                    required oninvalid="this.setCustomValidity('Pilih Tahun Ajaran dulu!')" oninput="setCustomValidity('')">
                      <option value="">Pilih Tahun Ajaran</option>
                      <?php 
                        foreach ($thn_ajrn as $thn){
                          if ($row->id_thn_ajrn==$thn->id_thn_ajrn){
                              $pilih="selected";
                            } else {
                              $pilih="";
                            }           
                            echo "<option value='$thn->id_thn_ajrn'$pilih>".$thn->thn_ajrn."</option>";             
                        }
                      ?>
                    </select>
               </div>
               <div class="form-group">
                  <label>Alumni</label>
                    <select name="alumni" id="alumni" class="form-control input-lg"
                    required oninvalid="this.setCustomValidity('Pilih Alumni dulu!')" oninput="setCustomValidity('')">
                      <option value="">Pilih Alumni</option>
                      <?php 
                          if ($row->alumni=='Iya'){
                              echo "<option value='Iya' selected>
                                    Iya</option>
                                    <option value='Tidak'>Tidak
                                    </option>";
                            } else {
                              echo "<option value='Iya'>Iya</option>
                                    <option value='Tidak' selected>Tidak
                                    </option>"; 
                          }
                                                   
                      ?>
                    </select>
               </div>
               <div class="form-group">
                <div>
                <img src="<?=base_url("assets/img/").$row->foto; ?>" id="foto" width="100px">
                </div>
                  <label>Foto</label>
                  <input type="file" class="form-control" id="foto" name="foto" value="<?=$row->foto; ?>">
               </div>
                
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
              </form>
            <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>