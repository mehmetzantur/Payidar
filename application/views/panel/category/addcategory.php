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
										<h6>Kategori Ekle</h6>
									</div>
								</div>
							</div>
						</div>

				<form class="form-horizontal" action=<?php echo base_url(). 'Panel/Category/Add'; ?> method="post" enctype="multipart/form-data">

                    <fieldset id="account">
                        <div class="form-group required">
                            <div class="col-sm-12">

                                <select class="form-control" name="parentid">
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
                                <input type="text" class="form-control" id="input-email" placeholder="Sırası" value="<?php echo set_value('order'); ?>" name="order">
                            </div>
                        </div>
                        <div class="form-group required">
                            <div class="col-sm-12">
                                <?php echo form_error('name'); ?>
                                <input type="text" class="form-control" id="input-lastname" placeholder="Kategori Adı" value="<?php echo set_value('name'); ?>" name="name">
                            </div>
                        </div>
                        <div class="form-group required">
                            <div class="col-sm-12">
                                <input type="file" class="form-control" id="input-password" placeholder="Resim"  name="image">
                            </div>
                        </div>
                        <div class="col-sm-12">
                        	<div class="buttons">
							<div class="pull-right">
								<input type="submit" class="btn btn-primary btn-sm" value="Kaydet" name="add">
							</div>
                    	</div>
                        </div>
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
