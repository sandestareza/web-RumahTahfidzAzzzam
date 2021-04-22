 <div class="container-fluid">
 <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
        <div class="card-body">
        <div class="table-responsive">
        </div>
        <table id="data" class="table table-bordered table-hover">
        <thead class="table-success">
      <tr>
            <th>No</th>
            <th>Nip</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Jabatan</th>
            <th>No.Hp</th>
            <th>Foto</th>
        <th style="width: 10%">Opsi</th>
      </tr>
        </thead>
    <tbody">
      <?php
      $no = 1;
      foreach ($pengurus as $row) : ?>
        <tr>
        <td width="20px"><?= $no++;?></td>
            <td><?= $row->nip; ?></td>
            <td><?= $row->nama; ?></td>
            <td><?= $row->j_kelamin; ?></td>
            <td><?= $row->jabatan; ?></td>
            <td width="70px"><?= $row->no_hp; ?></td>
            <td><img src="<?=base_url('assets/img/'.$row->foto) ?>" style="width: 50px;"></td>
            <td class="text-center">
                <a id="detail_pengurus" href="#" 
                class="badge badge-pill badge-info" data-toggle="modal"data-target="#detail" 
                data-nip="<?=$row->nip; ?>" 
                data-nama="<?=$row->nama; ?>" 
                data-j_kelamin="<?=$row->j_kelamin; ?>" 
                data-tgl_lahir="<?=date('d M Y',strtotime($row->tgl_lahir)); ?>" 
                data-jabatan="<?=$row->jabatan; ?>" 
                data-no_hp="<?=$row->no_hp; ?>" 
                data-foto="<?=$row->foto; ?>">
                <i class="fa fa-eye"></i> Detail</a>    
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


<!-- Modal detail-->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail <?= $title; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body" id="modal-detail">
              <table class="table">
                <tbody>
                <tr>
                    <th>Nip</th>
                    <td>
                    <input type="text" class="form-control" id="nip" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Nama Lengkap</th>
                    <td>
                    <input type="text" class="form-control" id="nama" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>
                    <input type="text" class="form-control" id="j_kelamin" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>
                    <input type="text" class="form-control" id="tgl_lahir" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Jabatan</th>
                    <td>
                    <input type="text" class="form-control" id="jabatan" readonly>
                    </td>
                </tr>
                <tr>
                    <th>No.Hp</th>
                    <td>
                    <input type="text" class="form-control" id="no_hp" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Foto</th>
                    <td><img src="" id="foto" width="80px"></td>
                </tr>
                </tbody>
              </table>
            </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
    </div>
  </div>
</div>
<!-- end Modal detail-->

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

