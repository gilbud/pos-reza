<div class="row clearfix">
  <h1 class="mt-4">Tambah User</h1>
  <p></p>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card mb-4">
      <div class="card-body">
        <form method="POST">

          <label for="">Username</label>
          <div class="form-group">
            <div class="form-line">
              <input type="text" name="username" class="form-control" />
            </div>
          </div>

          <label for="">Name</label>
          <div class="form-group">
            <div class="form-line">
              <input type="text" name="name" class="form-control" />
            </div>
          </div>


          <label for="">Password</label>
          <div class="form-group">
            <div class="form-line">
              <input type="number" name="password"  class="form-control" />
            </div>
          </div>
          

          <label for="">Level</label>
          <div class="form-group">
            <div class="form-line">
              <select name="level" class="form-control show-tick" required="">
              <option value="">-- Pilih Level --</option>
              <option value="admin">Admin</option>
              <option value="kasir">Kasir</option>
            </select>
            </div>
          </div>
          <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

        </form>

        <?php 

        if (isset($_POST['simpan'])) {
         $username = $_POST['username'];
         $name = $_POST['name'];
         $password = $_POST['password'];
         $level = $_POST['level'];
         

         $sql = $koneksi->query("insert into user (username,name,password,level) values('$username','$name','$password','$level')");

         if ($sql) {
           ?>

           <script type="text/javascript">
            alert("Data Berhasil di Simpan");
            window.location.href="?page=user";
          </script>


          <?php
        }
      }
      ?>