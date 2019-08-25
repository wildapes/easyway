<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Jurnal Baru
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jurnal Baru</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-body pad">
              <form method="POST" action="<?php echo base_url('admin/newjurnal/kirim'); ?>" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Judul Jurnal</label>
                  <input type="text" class="form-control" name="judul" required />
                </div>
                <div class="form-group">
                  <label>Penulis</label>
                  <input type="text" class="form-control" name="penulis" required />
                </div>
                <div class="form-group">
                  <label>Abstrak Jurnal</label>
                  <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="abstrak" required></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Upload Jurnal dalam Bentuk PDF</label>
                  <input type="file" id="filepdf" name="filepdf" required />
                </div>
                <input type="submit" name="post" class="btn btn-primary pull-right" value="Publish" />
              </form>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>