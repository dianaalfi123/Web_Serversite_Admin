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
			<center><strong>Halaman Data Admin</strong></center>
		</h2><br>
		<a data-toggle="modal" data-target="#tambah" class="btn btn-primary">+ Tambah Data Admin</a><br><br>

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
							<th>ID Admin</th>
							<th>Nama Admin</th>
							<th>Username</th>
							<!-- <th>Password</th> -->
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody >

						<?php $no=1; foreach ($data_admin as $data) {  ?>
						<tr>
							<td>
								<?=$no++ ?>
							</td>
							<td>
								<?=$data->id_admin ?>
							</td>
							<td>
								<?=$data->nama?>
							</td>

							<td>
								<?=$data->username?>
							</td>
							<!-- <td>
								<?=$data->password?>
							</td> -->
							
							<td>
								<div style="display: flex;">
									<a class="btn btn-primary" data-toggle="modal" data-target="#edit" href="#"
									onclick="edit('<?=$data->id_admin?>')"><i class="fa  fa-pencil"></i></a>
								<a class="btn btn-danger" data-toggle="modal" data-target="#hapus" href="#"
									onclick="edit('<?=$data->id_admin?>')"><i class="fa  fa-trash"></i></a>
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

		<!-- Modal Tambah Admin-->
		<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4><strong>Tambah Data Admin</strong></h4>
					</div>
					<div class="modal-body">
						<br />

						<form action="<?=base_url('admin/add_admin')?>" method="post"
							class="form-horizontal form-label-left" enctype="multipart/form-data">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Admin :
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" name="nama" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Username :
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" name="username" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Password:
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="password" name="password" required="required" class="form-control col-md-7 col-xs-12">
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

		<!-- Modal Edit Data Admin-->
		<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4><strong>Edit Data Admin</strong></h4>
					</div>
					<div class="modal-body">
						<br />

						<form action="<?=base_url('admin/edit_admin')?>" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">

							<input type="hidden" id="id_admin" name="id_admin" required="required"
								class="form-control col-md-7 col-xs-12">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Admin :
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="nama" name="nama" required="required"
										class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Username : </label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="username" name="username" required="required"
										class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							
							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
								<a type="button" id="ubahpassword"> Ubah Password</a>
								<a type="button" id="unubahpassword"> Tidak Ubah Password</a>
								<!-- <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ubah Password</label> -->
								</div>
							</div>

							<div class="form-group" id="pass" >
								
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Password : </label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="password" id="password" name="password"
										class="form-control col-md-7 col-xs-12">
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

		<!--  Konfirmasi Hapus Admin -->
		<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h3><strong>Hapus Data Admin</strong></h3>
					</div>
					<div class="modal-body">
					<div class="row">
		                <p id="med" style="text-align:center;font-size: 20px;">PERINGATAN!</p>
		                <p style="text-align:center;font-size: 17px;">Apakah Anda Yakin Ingin Menghapus Admin  <input style='border-color: transparent;font-weight: bold;width: -moz-fit-content;width: fit-content;padding: 5px;margin-bottom: 1em;' type="text" id='nama1'readonly> ?</p>
		            </div>
					</div>
					<form action="<?=base_url('admin/delete_admin')?>" method="post" class="form-horizontal form-label-left">

						<input type="hidden" id="id_admin1" name="id_admin" required="required"
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
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script type="text/javascript">

		$(document).ready(function() {
			$('#ubahpassword').show(); 
			$('#unubahpassword').hide(); 
			$('#pass').hide(); 
			document.getElementById('ubahpassword').onclick = function() {
		        // if(this.checked) {
		           $('#ubahpassword').hide(); 
		           $('#unubahpassword').show(); 
				   $('#pass').show(); 
				   $('#password').val(""); 

		        // }
		          
		    }
		    document.getElementById('unubahpassword').onclick = function() {
		        // if(this.checked) {
		           $('#ubahpassword').show(); 
		           $('#unubahpassword').hide(); 
				   $('#pass').hide(); 
				   $('#password').val(""); 
		        // }
		          
		    }

		});
		
		function edit(a) {
			$.ajax({
				type: "post",
				url: "<?=base_url()?>admin/detail_admin/" + a,
				dataType: "json",
				success: function (data) {
					console.log(data);
					$("#id_admin1").val(data.id_admin);
					$("#id_admin").val(data.id_admin);
					$("#nama").val(data.nama);
					$("#nama1").val(data.nama);
					$("#username").val(data.username);
					// $("#password").val(data.password);
				}
			})
		}
		
	</script>
</body>

</html>
