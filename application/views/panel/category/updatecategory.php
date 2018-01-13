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
										<h6>Kategori Düzenle</h6>
									</div>
								</div>
							</div>
						</div>

				<form class="form-horizontal" action=<?php echo base_url(). 'Panel/Category/Update'; ?> method="post"enctype="multipart/form-data">
                    <fieldset id="account">
                       <?php foreach($categoryWhId as $cat) { ?>
                        <div class="form-group required">
                            <div class="col-sm-12">
                              <input type="hidden" class="form-control" id="input-email" placeholder="Sırası" value="<?php echo $cat['Id']; ?>" name="hidden">                                <select class="form-control" name="parentid">
                                	<option value="0">+ Üst Kategori</option>
									<?php
										 foreach($category as $cat2){
											 if($cat['ParentId'] == $cat2['Id']){
												 if($cat2['ParentId'] == 0)
										 			echo '<option value="'.$cat2['Id'].'" selected>+ '.$cat2['Name'].'</option>';
												 else
													echo '<option value="'.$cat2['Id'].'" selected>- '.$cat2['Name'].'</option>';
											 }

											 else{
												 if($cat2['ParentId'] == 0)
										 			echo '<option value="'.$cat2['Id'].'">+ '.$cat2['Name'].'</option>';
												 else
													echo '<option value="'.$cat2['Id'].'">- '.$cat2['Name'].'</option>';
											 }
									 }
									?>
									</select>
                            </div>
                        </div>
                        <div class="form-group required">
                            <div class="col-sm-12">
                                <?php echo form_error('order'); ?>
                                <input type="text" class="form-control" id="input-email" placeholder="Sırası" value="<?php echo $cat['Order']; ?>" name="order">
                            </div>
                        </div>
                        <div class="form-group required">
                            <div class="col-sm-12">
                                <?php echo form_error('name'); ?>
                                <input type="text" class="form-control" id="input-lastname" placeholder="Kategori Adı" value="<?php echo  $cat['Name']; ?>" name="name">
                            </div>
                        </div>
                        <div class=" required">
                            <div class="col-sm-12" >
                                <?php echo form_error('image'); ?>
                                <img height="80" width="80" src="<?php echo base_url() . 'Uploads/' .  $cat['Image']; ?>">
                            </div>
                            <div class="form-group col-sm-12">
                                <input type="file" class="form-control" id="input-password" placeholder="Resim" value="<?php echo set_value('image'); ?>" name="image">
                            </div>
                        </div>
                        <div class="col-sm-12">
                        	<div class="buttons">
							<div class="pull-right">
								<input type="submit" class="btn btn-primary btn-sm" value="Kaydet" name="update">
							</div>
                    	</div>
                        </div>

                        	<?php } ?>

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
