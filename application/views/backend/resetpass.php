  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Halaman Setting Data Admin
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Reset Password</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Reset Password</h3>
        </div>
        <!-- /.box-header -->
        <form role="form" action="<?php echo base_url('admin/updatepass') ?>" method="POST">
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Password Baru</label>
                <input type="password" class="form-control" name="password" required />
              </div>
              <input type="submit" class="btn btn-primary" name="submin" value="Submit" />
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="float-right">
                <input type="number" class="form-control hidden" name="id" value="<?php echo $record->id_admin; ?>" hidden />
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