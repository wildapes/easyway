<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Jurnal
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Jurnal</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-body pad">
              <form method="POST" action="<?php echo base_url('admin/updatejurnal'); ?>" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Judul Jurnal</label>
                  <input type="text" class="form-control" name="judul" required value="<?php echo $record->nama_jurnal; ?>" />
                </div>
                <div class="form-group">
                  <label>Penulis</label>
                  <input type="text" class="form-control" name="penulis" required value="<?php echo $record->penulis; ?>" />
                </div>
                <div class="form-group">
                  <label>Abstrak Jurnal</label>
                  <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="abstrak" required><?php echo $record->abstrak; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Upload Jurnal dalam Bentuk PDF</label>
                  <input type="file" id="filepdf" name="filepdf" />
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="ubah"> Check untuk update.
                  </label>
                </div>
                <input type="text" class="form-control hidden" name="id" value="<?php echo $record->id_jurnal; ?>" placeholder="" hidden />
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