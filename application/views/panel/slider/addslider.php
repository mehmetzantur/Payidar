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
										<h6>Slide Ekle</h6>
									</div>
								</div>
							</div>
						</div>

				<form class="form-horizontal" action=<?php echo base_url(). 'Panel/Slider/Add'; ?> method="post" enctype="multipart/form-data">

                    <fieldset id="account">
                        <div class="form-group required">
                            <div class="col-sm-12">
                                <?php echo form_error('title'); ?>
                                <input type="text" class="form-control" id="input-email" placeholder="Başlık" value="<?php echo set_value('title'); ?>" name="title">
                            </div>
                        </div>
                        <div class="form-group required">
                            <div class="col-sm-12">
                                <?php echo form_error('url'); ?>
                                <input type="text" class="form-control" id="input-lastname" placeholder="Yönlenecek Adres(ör: http://www....)" value="<?php echo set_value('url'); ?>" name="url">
                            </div>
                        </div>
                        <div class="form-group required" style="margin:0 !important;">
                            <div class="col-sm-12">
                                <?php echo form_error('isactive'); ?>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="isactive" checked class="form-control" value="<?php echo set_value('isactive'); ?>">Aktif?</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group required">
                            <div class="col-sm-12">
                            <p style="margin-left:10px;">Marka simgesi en iyi 1170x400 ölçülerinde gözükmektedir.<br></p>
                                <input type="file" class="form-control" id="input-password" placeholder="Resim"  name="image">
                            </div>
                        </div>
                        <div class="col-sm-12">
                        	<div class="buttons">
							<div class="pull-right">
								<input type="submit" class="btn btn-success btn-sm btn-fill" value="Kaydet" name="add">
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
