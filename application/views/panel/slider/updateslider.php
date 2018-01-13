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

				<form class="form-horizontal" action=<?php echo base_url(). 'Panel/Slider/Update'; ?> method="post" enctype="multipart/form-data">

                    <?php foreach($sliderWhId as $slide) { ?>
                        <input type="hidden" class="form-control" id="input-email" placeholder="Sırası" value="<?php echo $slide['Id']; ?>" name="hidden">
                        <fieldset id="account">
                            <div class="form-group required">
                                <div class="col-sm-12">
                                    <?php echo form_error('title'); ?>
                                    <input type="text" class="form-control" id="input-email" placeholder="Başlık" value="<?php echo $slide['Title']; ?>" name="title">
                                </div>
                            </div>
                            <div class="form-group required">
                                <div class="col-sm-12">
                                    <?php echo form_error('url'); ?>
                                    <input type="text" class="form-control" id="input-lastname" placeholder="Yönlenecek Adres(ör: http://www....)" value="<?php echo $slide['Url']; ?>" name="url">
                                </div>
                            </div>
                            <div class="form-group required" style="margin:0 !important;">
                                <div class="col-sm-12">
                                    <?php echo form_error('isactive'); ?>
                                    <div class="checkbox">
                                        <?php if($slide['IsActive'] == 1) { ?>
                                            <label><input type="checkbox" checked name="isactive" class="form-control">Aktif?</label>
                                        <?php } else{ ?>
                                            <label><input type="checkbox" name="isactive" class="form-control">Aktif?</label>
                                         <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group required">
                                <div class="col-sm-12">
                                    <div class="col-sm-12 text-center">
                                            <div class="card">
                                                <div class="content">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class="icon-warning text-center">
                                                                <img class="img-thumbnail" src="<?php echo base_url() . 'Uploads/Slider/' .  $slide['Image']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="footer">
                                                        <hr>
                                                        <div class="stats">
                                                            <?php echo form_error('image'); ?>
                                                            <p style="margin-left:10px;">Marka simgesi en iyi 1170x400 ölçülerinde gözükmektedir.<br></p>
                                                            <input type="file" class="form-control" id="input-password" placeholder="Resim"  name="image">
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="col-sm-12">
                                <div class="buttons">
                                <div class="pull-right">
                                    <input type="submit" class="btn btn-success btn-sm btn-fill" value="Kaydet" name="update">
                                </div>
                            </div>
                            </div>
                        </fieldset>

                        <br>
                    <?php } ?>
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
