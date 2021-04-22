<div class="container-fluid">
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
        <div class="card-body">
          <a href="<?=base_url('admin/pengurus'); ?>" class="badge badge-danger">
            <i class="far fa-arrow-alt-circle-left"></i> Kembali</a><br><br>
          <div class="table-responsive">
            <?php foreach($pengurus as $row)  : ?>
            <?= form_open_multipart('admin/pengurus/edit_aksi'); ?>
                <div class="form-group">
                  <label>Nip</label>
                  <input type="text" class="form-control" id="nip" name="nip"
                  value="<?=$row->nip; ?>" readonly>
               </div>
               <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" id="nama" name="nama"
                  value="<?=$row->nama; ?>">
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
                  <label>Jabatan</label>
                    <select name="jabatan" id="jabatan" class="form-control input-lg"
                    required oninvalid="this.setCustomValidity('Pilih Jabatan dulu!')" oninput="setCustomValidity('')">
                      <option value="">Pilih Jabatan</option>
                      <?php 
                        foreach ($jabatan as $jbt){
                          if ($row->id_jabatan==$jbt->id_jabatan){
                              $pilih="selected";
                            } else {
                              $pilih="";
                            }           
                            echo "<option value='$jbt->id_jabatan'$pilih>".$jbt->jabatan."</option>";             
                        }
                      ?>
                    </select>
               </div>
               <div class="form-group">
                  <label>No.hp</label>
                  <input type="text" class="form-control" id="no_hp" name="no_hp"
                  value="<?=$row->no_hp; ?>">
               </div>
               <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" id="username" name="username"
                  value="<?=$row->username; ?>">
               </div>
               <div class="form-group">
                  <label>Password</label>
                  <input type="text" class="form-control" id="password" name="password"
                  value="<?=$row->password; ?>">
               </div>
               <div class="form-group">
                  <label>Role/hak Akses</label>
                    <select name="role" id="role" class="form-control input-lg"
                    required oninvalid="this.setCustomValidity('Pilih Role dulu!')" oninput="setCustomValidity('')">
                      <option value="">Pilih Role</option>
                      <?php 
                        foreach ($role as $r){
                          if ($row->id_role==$r->id_role){
                              $pilih="selected";
                            } else {
                              $pilih="";
                            }           
                            echo "<option value='$r->id_role'$pilih>".$r->role."</option>";             
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