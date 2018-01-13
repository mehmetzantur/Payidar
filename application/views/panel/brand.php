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
										<h6>Markalar</h6>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="text-right">
										<a href="<?php echo base_url().'Panel/Brand/AddBrand' ?>" class="btn btn-primary btn-xs">Yeni Marka Ekle</a>
									</div>
								</div>
							</div>
						</div>

							<table class="table">
							   <thead>
							   <tr>
								   <th>#</th>
								   <th>Marka</th>
                                    <th class="text-center">Resim</th>
									<th class="text-right"></th>
								</tr>
								</thead>
									<tbody>
									<?php
										 foreach($brand as $bra){
										  	echo '<tr><th scope="row">'.$bra['Id'].'</td>';
											echo '<td>'.$bra['Name'].'</td>';
                                            echo '<td class="text-center"><img heigh="30" width="30" src=' .base_url().'Uploads/Brand/'.$bra['Image'] .'></td>';
                                            echo '<td class="text-right"><a href="Brand/UpdateBrand/'.$bra['Id'].'" class="btn btn-primary btn-xs">Düzenle</a>
                                                  <a href="Brand/DeleteBrand/'.$bra['Id'].'" class="btn btn-primary btn-xs">Sil</a></td></tr>';
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
