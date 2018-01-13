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
										<h6>Slider</h6>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="text-right">
										<a href="<?php echo base_url().'Panel/Slider/AddSlider' ?>" class="btn btn-primary btn-xs">Yeni Slide Ekle</a>
									</div>
								</div>
							</div>
						</div>

							<table class="table">
							   <thead>
							   <tr>
								   <th>#</th>
								   <th>Başlık</th>
									<th>Url</th>
									<th>Aktif?</th>
                  <th class="text-center">Resim</th>
									<th class="text-right"></th>
								</tr>
								</thead>
									<tbody>
									<?php
										 foreach($slider as $slide){
										  	echo '<tr><th scope="row">'.$slide['Id'].'</td>';
											echo '<td>'.$slide['Title'].'</td>';
											echo '<td>'.$slide['Url'].'</td>';
											echo '<td>'.$slide['IsActive'].'</td>';
											echo '<td class="text-center"><img heigh="30" width="30" src=' .base_url().'Uploads/Slider/'.$slide['Image'] .'></td>';
											echo '<td class="text-right"><a href="Slider/UpdateSlider/'.$slide['Id'].'" class="btn btn-primary btn-xs">Düzenle</a>
													  <a href="Slider/DeleteSlider/'.$slide['Id'].'" class="btn btn-primary btn-xs">Sil</a></td></tr>';
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
