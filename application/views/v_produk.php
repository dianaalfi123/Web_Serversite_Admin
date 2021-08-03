<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>
		Majoo Teknologi
	</title>

</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />

<body>
	<style>

		input[type="checkbox"],
		input[type="radio"] {
			position: absolute;
			right: 9000px;
		}

		/*Check box*/
		input[type="checkbox"]+.label-text:before {
			content: "\f096";
			font-family: "FontAwesome";
			speak: none;
			font-style: normal;
			font-weight: normal;
			font-variant: normal;
			text-transform: none;
			line-height: 1;
			-webkit-font-smoothing: antialiased;
			width: 1em;
			display: inline-block;
			margin-right: 5px;
		}

		input[type="checkbox"]:checked+.label-text:before {
			content: "\f14a";
			color: #2980b9;
			animation: effect 250ms ease-in;
		}

		input[type="checkbox"]:disabled+.label-text {
			color: #aaa;
		}

		input[type="checkbox"]:disabled+.label-text:before {
			content: "\f0c8";
			color: #ccc;
		}

		/*Radio box*/

		input[type="radio"]+.label-text:before {
			content: "\f10c";
			font-family: "FontAwesome";
			speak: none;
			font-style: normal;
			font-weight: normal;
			font-variant: normal;
			text-transform: none;
			line-height: 1;
			-webkit-font-smoothing: antialiased;
			width: 1em;
			display: inline-block;
			margin-right: 5px;
		}

		input[type="radio"]:checked+.label-text:before {
			content: "\f192";
			color: #8e44ad;
			animation: effect 250ms ease-in;
		}

		input[type="radio"]:disabled+.label-text {
			color: #aaa;
		}

		input[type="radio"]:disabled+.label-text:before {
			content: "\f111";
			color: #ccc;
		}

		/*Radio Toggle*/

		.toggle input[type="radio"]+.label-text:before {
			content: "\f204";
			font-family: "FontAwesome";
			speak: none;
			font-style: normal;
			font-weight: normal;
			font-variant: normal;
			text-transform: none;
			line-height: 1;
			-webkit-font-smoothing: antialiased;
			width: 1em;
			display: inline-block;
			margin-right: 10px;
		}

		.toggle input[type="radio"]:checked+.label-text:before {
			content: "\f205";
			color: #16a085;
			animation: effect 250ms ease-in;
		}

		.toggle input[type="radio"]:disabled+.label-text {
			color: #aaa;
		}

		.toggle input[type="radio"]:disabled+.label-text:before {
			content: "\f204";
			color: #ccc;
		}


		@keyframes effect {
			0% {
				transform: scale(0);
			}

			25% {
				transform: scale(1.3);
			}

			75% {
				transform: scale(1.4);
			}

			100% {
				transform: scale(1);
			}
		}
		#table-wrapper {
		  position:relative;
		}
		#table-scroll {
		  height:500px;
		  overflow:auto;  
		}
		#table-wrapper table {
		  width:100%;

		}
		#table-wrapper table thead th .text {
		  position:absolute;   
		  top:-20px;
		  z-index:2;
		  height:20px;
		  width:35%;
		  border:1px solid red;
		}
	</style>
	<div class="container-fluid">
		<h2>
			<center><strong>Halaman Data Produk</strong></center>
		</h2><br>
		<a data-toggle="modal" data-target="#tambah" class="btn btn-primary">+ Tambah Data Produk</a><br><br>

		<div class="box">
			<div class="box-header">
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<p>
				<?php if($this->session->flashdata('pesan_sukses')){?>
					<center>
						<font color="green" size="4px"><b><?= $this->session->flashdata('pesan_sukses'); ?></b></font>
					</center>
				<?php }else{ ?>
					<center>
						<font color="red" size="4px"><b><?= $this->session->flashdata('pesan_gagal'); ?></b></font>
					</center>
				<?php }?>
				</p>
				<div id="table-wrapper">
  				<div id="table-scroll">
				<table id="tableAdmin" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>ID Produk</th>
							<th>Nama Produk</th>
							<th>Harga</th>
							<th>Status</th>
							<th>Gambar</th>
							<th>Dekripsi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody >

						<?php $no=1; foreach ($data_produk as $data) {  ?>
						<tr>
							<td>
								<?=$no++ ?>
							</td>
							<td>
								<?=$data->id_produk ?>
							</td>
							<td>
								<?=$data->nama?>
							</td>

							<td>
								<?=$data->harga?>
							</td>
							<td>
								<?php if($data->status == 1){?>
								bisa dijual
								<?php }else{?>
								tidak bisa dijual
								<?php } ?>
							</td>
							<?php if($data->gambar){ ?>
	                            <td><center><a data-fancybox="images"  href="<?= base_url("assets/img_produk/".$data->gambar)?>"><img  style="height: 100px;width:100px" src="<?= base_url("assets/img_produk/".$data->gambar)?>"></a></center></td>
		                    <?php }else{?>
	                            <td>Tidak Ada Gambar Produk</td>
	                        <?php } ?>
							<td>
								<?=$data->deskripsi?>
							</td>
							
							<td>
								<div style="display: flex;">
									<a class="btn btn-primary" data-toggle="modal" data-target="#edit" href="#"
									onclick="edit('<?=$data->id_produk?>')"><i class="fa  fa-pencil"></i></a>
								<a class="btn btn-danger" data-toggle="modal" data-target="#hapus" href="#"
									onclick="edit('<?=$data->id_produk?>')"><i class="fa  fa-trash"></i></a>
								</div>
								

						</tr>
						<?php } ?>
					</tbody>
					<tfoot></tfoot>
				</table>
				</div>
				</div>
			</div>
		</div>

		<!-- Modal Tambah Produk-->
		<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4><strong>Tambah Data Produk</strong></h4>
					</div>
					<div class="modal-body">
						<br />

						<form action="<?=base_url('produk/add_produk')?>" method="post"
							class="form-horizontal form-label-left" enctype="multipart/form-data">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Produk :
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" name="nama" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Harga :
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="number" name="harga" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Gambar :
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
				                  <input type="file" name="berkas" />
				                </div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Dekripsi:
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<textarea type="text" name="deskripsi" required="required" class="form-control col-md-7 col-xs-12"></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Status: </label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" name="status" required="required">
										<option value="" selected disabled>Pilih Status</option>
                        				<option value="1">bisa dijual</option>
                        				<option value="0"> tidak bisa dijual</option>
									</select>
								</div>
							</div>

							

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<input type="submit" name="tambah" value="Simpan" class="btn btn-primary">
					</div>
				</div>
				</form>
			</div>
		</div>

		<!-- Modal Edit Data Produk-->
		<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4><strong>Edit Data Produk</strong></h4>
					</div>
					<div class="modal-body">
						<br />

						<form action="<?=base_url('produk/edit_produk')?>" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">

							<input type="hidden" id="id_produk" name="id_produk" required="required"
								class="form-control col-md-7 col-xs-12">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Produk :
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="nama" name="nama" required="required"
										class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Harga : </label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="number" id="harga" name="harga" required="required"
										class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Gambar :
								</label>
								
								<div class="col-md-8 col-sm-8 col-xs-12">
								  <img id="output" src="" width="100" height="100">
								  <br>
								  <br>
				                  <input type="file" name="berkas" id="gambar" />
				               	  <input type="hidden" name="newgambar" id="newgambar">
				                  
				                </div>
				                
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Dekripsi:
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<textarea type="text" name="deskripsi" id="deskripsi" required="required" class="form-control col-md-7 col-xs-12"></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Status : </label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" id="status" name="status" required="required">
										<option value="" selected disabled>Pilih Status</option>
                        				<option value="1">bisa dijual</option>
                        				<option value="0"> tidak bisa dijual</option>
									</select>
								</div>
							</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<input type="submit" name="tambah" value="Simpan" class="btn btn-primary">
					</div>
				</div>
				</form>
			</div>
		</div>

		<!--  Konfirmasi Hapus Produk -->
		<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h3><strong>Hapus Data Produk</strong></h3>
					</div>
					<div class="modal-body">
					<div class="row">
		                <p id="med" style="text-align:center;font-size: 20px;">PERINGATAN!</p>
		                <p style="text-align:center;font-size: 17px;">Apakah Anda Yakin Ingin Menghapus Produk  <input style='border-color: transparent;font-weight: bold;width: -moz-fit-content;width: fit-content;padding: 5px;margin-bottom: 1em;' type="text" id='nama1'readonly> ?</p>
		            </div>
					</div>
					<form action="<?=base_url('produk/delete_produk')?>" method="post" class="form-horizontal form-label-left">

						<input type="hidden" id="id_produk1" name="id_produk" required="required"
							class="form-control col-md-7 col-xs-12">

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
							<input type="submit" value="Konfirmasi" class="btn btn-primary">
						</div>
				</div>
				</form>
			</div>
		</div>




	</div>
	<script type="text/javascript">
		function edit(a) {
			$.ajax({
				type: "post",
				url: "<?=base_url()?>produk/detail_produk/" + a,
				dataType: "json",
				success: function (data) {
					
					
					$("#id_produk1").val(data.id_produk);
					$("#id_produk").val(data.id_produk);
					$("#nama").val(data.nama);
					$("#nama1").val(data.nama);
					$("#harga").val(data.harga);
					$("#status").val(data.status);
					$("#deskripsi").val(data.deskripsi);
					console.log(data.gambar);
					$("#output").val(data.gambar);
					document.getElementById('output').src="<?=base_url()?>assets/img_produk/" + data.gambar;
			
				}
			})
		}

		var fileInput = document.getElementById('gambar'); 
		  fileInput.onchange = () => {
		  var selectedFile = fileInput.files.item(0).name;
		  $("#newgambar").val(selectedFile);
		  const [file] = fileInput.files
		  if (file) {
		    output.src = URL.createObjectURL(file)
		  }
		  console.log(selectedFile);
		}

		
	</script>
</body>

</html>
