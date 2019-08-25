  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar User Aktif
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daftar User</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data User</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body table table-responsive table-bordered no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Option</th>
                </tr>
                <?php if(!empty($record)): ?>
                  <?php foreach($record as $row): ?>
                    <tr>
                      <td><?php echo $row['id_user'] ?></td>
                      <td><a href=""><?php echo $row['nama'] ?></a></td>
                      <td><a href=""><?php echo $row['email'] ?></a></td>
                      <td><?php echo $row['username']; ?></td>
                      <td><a href="<?php echo base_url('admin/deleteuser/'.$row['id_user']);?>"><span class="label label-danger">Delete</span></a></td>
                    </tr>
                <?php  endforeach; ?>
              <?php  endif; ?>
              </table>
            </div>

            <?php echo $pagination; ?>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </section>
  </div>