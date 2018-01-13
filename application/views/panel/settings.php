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
										<h6>Ayarlar</h6>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="text-right">
										<a href="<?php echo base_url().'Panel/Settings/AddSettings' ?>" class="btn btn-primary btn-xs">Yeni Ayar Ekle</a>
									</div>
								</div>
							</div>
						</div>

							<table class="table">
							   <thead>
							   <tr>
								   <th>#</th>
                                   <th class="text-center">Sayfa</th>
								   <th class="col-xs-8">Ayar</th>
									<th class="text-right"></th>
								</tr>
								</thead>
									<tbody>
									<?php
										 foreach($settings as $set){
										  	echo '<tr><th scope="row">'.$set['Id'].'</td>';
                                             echo '<td class="text-center">'.$set['IsPage'].'</td>';
											echo '<td>'.$set['Name'].'</td>';
											echo '<td class="text-right"><a href="Settings/UpdateSettings/'.$set['Id'].'" class="btn btn-primary btn-xs">Düzenle</a>
													  <a href="Settings/DeleteSettings/'.$set['Id'].'" class="btn btn-primary btn-xs">Sil</a></td></tr>';

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
