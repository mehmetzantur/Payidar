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
								<div class="col-xs-12">
									<div class="text-left">
										<h6>Marka Ekle</h6>
									</div>
								</div>
							</div>
						</div>

				<form class="form-horizontal" action=<?php echo base_url(). 'Panel/Brand/Update'; ?> method="post" enctype="multipart/form-data">

                    <fieldset id="account">
                    <?php foreach($brandWhId as $bra) { ?>
                        <div class="form-group required">
                        <input type="hidden" class="form-control" id="input-email" placeholder="Sırası" value="<?php echo $bra['Id']; ?>" name="hidden">                                
                            <div class="col-sm-12">
                                <?php echo form_error('order'); ?>
                                <input type="text" class="form-control" id="input-email" placeholder="Sırası" value="<?php echo $bra['Order']; ?>" name="order">
                            </div>
                        </div>
                        <div class="form-group required">
                            <div class="col-sm-12">
                                <?php echo form_error('name'); ?>
                                <input type="text" class="form-control" id="input-lastname" placeholder="Marka Adı" value="<?php echo $bra['Name']; ?>" name="name">
                            </div>
                        </div>                                

                        <div class=" required">
                            <div class="col-sm-12">
                                <img height="80" width="80" src="<?php echo base_url() . 'Uploads/Brand/' .  $bra['Image']; ?>">
                            </div>
                        </div>

                        <div class="form-group required">
                            <div class="col-sm-12">
                            <p style="margin-left:10px;">Marka simgesi en iyi 60x60 ölçülerinde gözükmektedir.<br></p>
                            <input type="file" class="form-control" id="input-password" placeholder="Resim"  name="image">    
                            </div>
                        </div>  
                        <div class="col-sm-12">
                        	<div class="buttons">
							<div class="pull-right">
								<input type="submit" class="btn btn-primary btn-sm" value="Kaydet" name="update">
							</div>
                    	</div>
                        </div>
                    <?php }?>
                    </fieldset>

					<br>

                </form>
					</div>
                </div>
            </div>
        </div>




    </div>
</div>

        <?php $this->load->view("includes/panel/include_script.php"); ?>


</body>

</html>
