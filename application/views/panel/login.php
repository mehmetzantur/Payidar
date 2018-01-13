<!DOCTYPE html>
<html lang="tr">
<head>
    <?php $this->load->view("includes/panel/head"); ?>
</head>
<body id="page-top">

   <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-heading">
				<h3 class="text-center">Yönetici Girişi</h3> 
			</div>
			<hr />
			<div class="modal-body">
				<form action=<?php echo base_url(). 'Panel/Login/LoginAdmin'; ?> method="post">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
							<i class="fa fa-user" aria-hidden="true"></i>
							</span>
							<input type="text" class="form-control" placeholder="Email" name="admin_email" />
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
							<i class="fa fa-key"></i>
							</span>
							<input type="password" class="form-control" placeholder="Şifre" name="admin_password" />

						</div>

					</div>
					
					<div class="form-group ">
						<div class="text-right">
							<input type="submit" class="btn btn-primary"  name="login" value="Giriş Yap" />
						</div>

					</div>

					<?php echo $this->session->flashdata("error"); ?>

				</form>
			</div>
		</div>
	</div>
   
    <?php $this->load->view("includes/panel/include_script.php"); ?>
</body>

</html>





