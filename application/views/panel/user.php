<!DOCTYPE html>
<html lang="tr">
<head>
    <?php $this->load->view("includes/panel/head"); ?>
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">

    <?php $this->load->view("includes/panel/sidebar"); ?>
    
    

       <div class="wrapper">
	

    <div class="main-panel">
		
		<?php $this->load->view("includes/panel/header"); ?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="panel panel-default">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-6">
									<div class="text-left">
										<h6>Kullanıcılar</h6>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="text-right">
										<a href="<?php echo base_url().'Panel/user/AddUser' ?>" class="btn btn-primary btn-xs">Yeni Kullanıcı Ekle</a>
									</div>
								</div>
							</div>
						</div>

							<table class="table">
							   <thead>
							   <tr>
								   <th>#</th>
								   <th>Email</th>
									<th>Şifre</th>
									<th>Adı</th>
									<th>Soyadı</th>
									<th>Yetki</th>
									<th class="text-right"></th>
								</tr>
								</thead>
									<tbody>
									<?php
										 foreach($users as $user){
										  	echo '<tr><th scope="row">'.$user['Id'].'</td>';
											echo '<td>'.$user['Email'].'</td>';
											echo '<td>'.$user['Password'].'</td>';
											echo '<td>'.$user['FirstName'].'</td>';
											echo '<td>'.$user['LastName'].'</td>';
											echo '<td>'.$user['Authority'].'</td>';
											echo '<td class="text-center"><img heigh="30" width="30" src=' .base_url().'Uploads/User/'.$user['Image'] .'></td>';
											echo '<td class="text-right"><a href="User/UpdateUser/'.$user['Id'].'" class="btn btn-primary btn-xs">Düzenle</a>
													  <a href="User/DeleteUser/'.$user['Id'].'" class="btn btn-primary btn-xs">Sil</a></td></tr>';
									 }
									?>
									 </tbody>
							</table>
					</div>
                </div>
            </div>
        </div>


        

    </div>
</div>
       
        <?php $this->load->view("includes/panel/include_script.php"); ?>

   
</body>

</html>
