  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Halaman Setting Data Admin
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Setting Data Admin</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Data Admin</h3><a href="<?php echo base_url('admin/resetpass/'.$record->id_admin); ?>"><button class="btn btn-primary pull-right">Reset Password</button></a>
        </div>
        <!-- /.box-header -->
        <form role="form" action="<?php echo base_url('admin/updateadmin') ?>" method="POST">
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo $record->username_admin; ?>" />
              </div>
              <div class="form-group">
                <label>Nama Admin</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $record->nama_admin; ?>" />
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Telepon</label>
                <input type="number" class="form-control" name="nohp" value="<?php echo $record->nohp_admin; ?>" />
              </div>
              <div class="float-right">
                <input type="number" class="form-control hidden" name="id" value="<?php echo $record->id_admin; ?>" hidden />
                <input type="submit" class="btn btn-primary pull-right" name="submin" value="Submit" />
              </div>

              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        </form>
        <!-- /.box-body -->
      </div>
    </section class="content">
  </div>