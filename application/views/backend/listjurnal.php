  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar Jurnal Publish
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daftar Jurnal</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="<?php echo base_url('admin/newjurnal'); ?>"><button class="btn btn-primary"><i class="fa fa-plus"></i> Jurnal Baru</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Judul Jurnal</th>
                  <th>Penulis</th>
                  <th>File PDF</th>
                  <th>Waktu Upload</th>
                  <th>Option</th>
                </tr>
                <?php if(!empty($record)): ?>
                  <?php foreach($record as $row): ?>
                    <tr>
                      <td><?php echo $row['id_jurnal'] ?></td>
                      <td><a href=""><?php echo $row['nama_jurnal'] ?></a></td>
                      <td><?php echo $row['penulis'] ?></td>
                      <td>
                      <?php if(!empty($row['filepdf'])){
                          echo '<i style="color:green;" class="fa fa-check"></i>';
                        } else { 
                          echo '<i style="color:red;" class="fa fa-times"></i>';
                        } 
                      ?></td>
                      <td><?php $yrdata= strtotime($row['tanggal_terbit']); echo date('D, d M Y', $yrdata); ?></td>
                      <td><a href="<?php echo base_url('admin/editjurnal/'.$row['id_jurnal']); ?>"><span class="label label-success"><i class="fa fa-pencil"></i> Edit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a>  <a href="<?php echo base_url('admin/deletejurnal/'.$row['id_jurnal']);?>"><span class="label label-danger"><i class="fa fa-times"></i> Delete</span></a></td>
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