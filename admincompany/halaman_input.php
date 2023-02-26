<?php include("halaman_header.php")?>
<?php 
$judul      ="";
$kutipan    ="";
$isi        ="";
$error      ="";
$sukses     ="";

if(isset($_POST['simpan'])){
    $judul      =$_POST['judul'];
    $isi        =$_POST['isi'];
    $kutipan    =$_POST['kutipan'];

    if($judul == '' or $isi == ''){
        $error      ="Silahkan masukan semua data diri yakni data isi dan judul.";
    }

    if(empty($error)){
        $sql1       ="insert into halaman(judul,kutipan,isi) values ('$judul','$kutipan','$isi')";
        $q1         = mysqli_query($koneksi,$sql1);
        if($q1){
            $sukses     ="sukses memasukan data";
        }else{
            $error      ="gagal memasukan data";
        }
    }
}

?>
<h1>Halaman Admin Input Data</h1>
<div class="mb-3 row">
    <a href="halamanadmin.php"><< Kembali ke halaman admin</a>
</div>
<?php 
if($error){
    ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
</div>
    <?php
}
?>
<?php 
if($sukses){
    ?>
    <div class="alert alert-primary" role="alert">
        <?php echo $sukses ?>
</div>
    <?php
}
?>
<form action="" method="post">
<div class="mb-3 row">
    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
    <div class="col-sm-10">
      <input type="text" class="form-control-" id="judul" value="<?php echo $judul ?>" name="judul">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="kutipan" class="col-sm-2 col-form-label">Kutipan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control-" id="judul" value="<?php echo $kutipan ?>" name="kutipan">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="isi" class="col-sm-2 col-form-label">Isi</label>
    <div class="col-sm-10">
      <textarea name="isi" class="form-control" id="summernote"><?php echo $isi ?></textarea>
    </div>
  </div>
  <div class="mb-3 row">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
      <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary"/>
    </div>
  </div>
  
</form>
<?php include("halaman_footer.php")?>