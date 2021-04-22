

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

   <!-- Page level plugins -->
  <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.bundle.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/'); ?>js/demo/chart-bar-demo.js"></script>

    <!-- Page level plugins -->
  <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
  <script src="<?= base_url('assets/'); ?>js/dataTables.responsive.js"></script>
  <script src="<?= base_url('assets/'); ?>js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/responsive.bootstrap4.js"></script>
  <script src="<?= base_url('assets/'); ?>js/responsive.bootstrap4.min.js"></script>

  <script>
    $('.custom-file-input').on('change', function(){
      let filename =$(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(filename);
    });
  </script>

  <!-- script untuk table searching -->
  <script>
      $(document).ready( function () {
    $('#data').DataTable( {
    responsive: true
} );

  });
  </script>

    <!-- modal detail santri -->
  <script>
    $(document).on("click","#detail_santri", function(){
      var nis   = $(this).data('nis');
      var nama  = $(this).data('nama');
      var j_kelamin  = $(this).data('j_kelamin');
      var tgl_lahir  = $(this).data('tgl_lahir');
      var alamat  = $(this).data('alamat');
      var nm_ortu  = $(this).data('nm_ortu');
      var kelas  = $(this).data('kelas');
      var thn  = $(this).data('thn');
      var alumni  = $(this).data('alumni');
      var foto  = $(this).data('foto');

      $("#modal-detail #nis").val(nis);
      $("#modal-detail #nama").val(nama);
      $("#modal-detail #j_kelamin").val(j_kelamin);
      $("#modal-detail #tgl_lahir").val(tgl_lahir);
      $("#modal-detail #alamat").val(alamat);
      $("#modal-detail #nm_ortu").val(nm_ortu);
      $("#modal-detail #kelas").val(kelas);
      $("#modal-detail #thn").val(thn);
      $("#modal-detail #alumni").val(alumni);
      $("#modal-detail #foto").attr("src", "<?=base_url(); ?>assets/img/" +foto);
    })
    </script>

        <!-- modal detail pengurus -->
  <script>
    $(document).on("click","#detail_pengurus", function(){
      var nip   = $(this).data('nip');
      var nama  = $(this).data('nama');
      var j_kelamin  = $(this).data('j_kelamin');
      var tgl_lahir  = $(this).data('tgl_lahir');
      var jabatan  = $(this).data('jabatan');
      var no_hp  = $(this).data('no_hp');
      var username  = $(this).data('username');
      var password  = $(this).data('password');
      var foto  = $(this).data('foto');

      $("#modal-detail #nip").val(nip);
      $("#modal-detail #nama").val(nama);
      $("#modal-detail #j_kelamin").val(j_kelamin);
      $("#modal-detail #tgl_lahir").val(tgl_lahir);
      $("#modal-detail #jabatan").val(jabatan);
      $("#modal-detail #no_hp").val(no_hp);
      $("#modal-detail #username").val(username);
      $("#modal-detail #password").val(password);
      $("#modal-detail #foto").attr("src", "<?=base_url(); ?>assets/img/" +foto);
    })
    </script>

    <!-- show password -->
    <script>
      $(document).ready(function(){
        $('#show').click(function(){
          if($(this).is(':checked')){
            $('#password').attr('type','text');
          } else {
            $('#password').attr('type','password');
          }
        })
      })
    </script>
</body>

</html>
