<section class="section">
<div class="section-header">
            <h1>Data Barang</h1>
          </div>

          <div class="section-body">

          <div class="col-12 col-md-12 col-lg-12">
			<div class="card">
				<div class="col-lg-12">
</br>
				<div class="pull-right">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
						Tambah Barang
						</button>
						</h3>
						<div class="card-body col-md-12">
					<div class="card-body p-0">
                    <div class="table-responsive">
					<table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th style="text-align:center;width:40px;">No</th>
                        <th>Nama Barang</th>
                        <th>Harga Pokok</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Min Stok</th>
                        <th>Satuan</th>
                        <th style="width:100px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
			<?php 
			$no=1;
				foreach($datab ->result() as $row){ ?>

					<tr>
						<td><?=$no++?></td>
						<td><?=$row->nama_b?></td>
						<td><?=$row->harga_awal_b?></td>
						<td><?=$row->harga_jual_b?></td>
						<td><?=$row->stok_b?></td>
						<td><?=$row->stok_min_b?></td>
						<td><?=$row->unit_b?></td>
						<td>
							<div>
							<a class="btn btn-warning" data-toggle="modal" data-target="#modal_edit<?php echo $row->id_barang;?>" style="width: 100px; color:white;"> Edit</a>
								<!-- <a data-toggle="modal" data-target="#modal_edit<?=$row->id_barang?>" class="btn btn-warning" style="width: 100px;">Edit</a> -->
							</div>
							<div>

								<a href="<?=base_url('admin/hapusBarang/'.$row->id_barang)?>" onclick="return confirm('Anda yakin ingin menghapus file?');" class="btn btn-danger" style="width: 100px;">Hapus</a>

							</div>								


						</td>
					</tr>

			<?php	}
			?>
                </tbody>
            </table>
                    </div>
                  </div>
                    </div>
					</div>
				</div>
			</div>
		  </div>
          </div>

</section>

<!-- MODAL ADD -->
		  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
               
	<form action="<?=base_url().'admin/simpanBarang/'?>" method="post">
                    <div class="form-group">
                        <label class="control-label col-xs-4" >Nama Barang</label>
                        <div class="col-xs-8">
                            <input name="nabar" class="form-control" type="text" placeholder="Nama Barang..." " required>
                        </div>
                    </div>

                 


                    <div class="form-group">
                        <label class="control-label col-xs-4" >Harga Pokok</label>
                        <div class="col-xs-8">
                            <input name="harpok" class="harpok form-control" type="text" placeholder="Harga Pokok..." ">
                        </div>
                    </div>

                    

                    <div class="form-group">
                        <label class="control-label col-xs-4" >Harga Jual</label>
                        <div class="col-xs-8">
                            <input name="harjul_grosir" class="harjul form-control" type="text" placeholder="Harga Jual..." ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-4" >Stok</label>
                        <div class="col-xs-8">
                            <input name="stok" class="form-control" type="number" placeholder="Stok..." ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-4" >Minimal Stok</label>
                        <div class="col-xs-9">
                            <input name="min_stok" class="form-control" type="number" placeholder="Minimal Stok..." ">
                        </div>
					</div>
					
                    <div class="form-group">
                        <label class="control-label col-xs-4" >Unit Barang</label>
                        <div class="col-xs-8">
                             <select name="satuan" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Satuan" " placeholder="Pilih Satuan" required>
                             <option value="PCS">PCS</option>
                             <option value="PACK">PACK</option>
                             </select>
                        </div>
                    </div>
                           

                </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <?=
                form_submit('submit', 'Tambah', ['class'=>'btn btn-primary']);
                ?>
	  </div>
	  </form>
    </div>
  </div>
		  </div>
		

<!-- MODAL EDIT -->
<?php
        foreach($datab->result_array() as $i):
            $barang_id=$i['id_barang'];
            $barang_nama=$i['nama_b'];
            $harga_awal_b=$i['harga_awal_b'];
            $harga_jual_b=$i['harga_jual_b'];
            $stok_b=$i['stok_b'];
            $stok_min_b=$i['stok_min_b'];
            $unit_b=$i['unit_b'];
        ?>
  <div class="modal fade" id="modal_edit<?php echo $barang_id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
               
	<form action="<?=base_url().'admin/ubahBarang/'?>" method="post">
                    <div class="form-group">
                        <label class="control-label col-xs-4" >Nama Barang</label>
                        <div class="col-xs-8">
							<input name="nabar" class="form-control" value="<?= $barang_nama?>" type="text" placeholder="Nama Barang..."  required>
							<input type="hidden" name="id" value="<?=$barang_id?>">
                        </div>
                    </div>

                 


                    <div class="form-group">
                        <label class="control-label col-xs-4" >Harga Pokok</label>
                        <div class="col-xs-8">
                            <input name="harpok" class="harpok form-control" type="text" value="<?=$harga_awal_b?>" placeholder="Harga Pokok..." >
                        </div>
                    </div>

                    

                    <div class="form-group">
                        <label class="control-label col-xs-4" >Harga Jual</label>
                        <div class="col-xs-8">
                            <input name="harjul_grosir" class="harjul form-control" value="<?=$harga_jual_b?> " type="text" placeholder="Harga Jual..." >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-4" >Stok</label>
                        <div class="col-xs-8">
                            <input name="stok" class="form-control" type="number" value="<?=$stok_b?>" placeholder="Stok..." >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-4" >Minimal Stok</label>
                        <div class="col-xs-9">
                            <input name="min_stok" class="form-control" type="number" value="<?=$stok_min_b?>" placeholder="Minimal Stok..." >
                        </div>
					</div>
					
                    <div class="form-group">
                        <label class="control-label col-xs-4" >Unit Barang</label>
                        <div class="col-xs-8">
                             <select name="satuan" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Satuan"  placeholder="Pilih Satuan" required>
								 
								<option value="PCS" <?php if($unit_b == "PCS"){echo 'selected';}?> >PCS</option>
								<option value="PACK" <?php if($unit_b == "PACK"){echo 'selected';}?>>PACK</option>
                             </select>
                        </div>
                    </div>
                           

                </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <?=
                form_submit('submit', 'Tambah', ['class'=>'btn btn-primary']);
                ?>
	  </div>
	  </form>
    </div>
  </div>

</div>
  <?php endforeach;?>

		

