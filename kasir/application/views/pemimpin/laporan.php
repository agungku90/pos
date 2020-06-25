<section class="section">
<div class="section-header">
            <h1>Laporan Penjualan</h1>
          </div>

          <div class="section-body">

          <div class="col-12 col-md-12 col-lg-12">
			<div class="card">
				<div class="col-lg-12">
	
						<div class="card-body col-md-12">
					<div class="card-body p-0">
                    <div class="table-responsive">
					<table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th style="text-align:center;width:40px;">No</th>
                        <th>Bulan</th>
                        <th>Terjual</th>
                        <th>Total Penjualan</th>
                        <th>Laba</th>
                       
                        <th style="width:100px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
				<?php 
				 $no=1;
                    foreach($data as $dt){
                ?>

					<tr>
						<td><?=$no++?></td>
						<td><?=indo_bulan($dt->bulan).' '.$dt->tahun?></td>
						<td><?=$dt->terjual?></td>
						<td><?=number_format($dt->total)?></td>
						<td><?=number_format($dt->keuntungan)?></td>
					
						<td>
							<div>
							<a class="btn btn-info" href=" <?=base_url('pimpinan/lapbulan_pdf/'.$dt->bulan.'-'.$dt->tahun)?>"  style="width: 100px; color:white;"> Ekspor PDF</a>
							
							</div>						


						</td>
					</tr>
					<?php }?>
			
                </tbody>
            </table>
                    </div>
                  </div>
                    </div>
					</div>
				</div>
			</div>
		  </div>
      

</section>
