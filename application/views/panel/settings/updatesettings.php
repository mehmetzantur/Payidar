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
										<h6>Ayar Düzenle</h6>
									</div>
								</div>
							</div>
						</div>

				<form class="form-horizontal" action=<?php echo base_url(). 'Panel/Settings/Update'; ?> method="post"enctype="multipart/form-data">
                    <fieldset id="account">
                       <div class="col-sm-12">
                       <br>
                            <?php foreach($settingsWhId as $set) { ?>
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <input type="hidden" class="form-control" id="input-email" placeholder="Sırası" value="<?php echo $set['Id']; ?>" name="hidden">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <?php echo form_error('name'); ?>
                                        <input type="text" class="form-control border-input" id="input-email" placeholder="Ayar Adı" value="<?php echo $set['Name']; ?>" name="name">
                                    </div>
                                </div>
                           <div class="form-group required">
                               <div class="col-sm-12">
                                   <input type="text" class="form-control" id="input-email" placeholder="Bu alan bir sayfa mı? (Evet ise 1 hayır ise boş bırakın)" value="<?php echo $set['IsPage']; ?>" name="ispage">
                               </div>
                           </div>

                           <div class="form-group required">
                               <div class="col-sm-12">
                                   <input type="text" class="form-control" id="input-email" placeholder="Bu bir ayar ise boş bırakın.Bu bir sayfa ise sıralamasını girin (örn:4)" value="<?php echo $set['PageOrder']; ?>" name="pageorder">
                               </div>
                           </div>
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <?php echo form_error('detail'); ?>
                                        <textarea rows="1" name="detail" id="detail">
                                            <p><?php echo  $set['Detail']; ?></p>
                                        </textarea>

                                    </div>
                                </div>
                                                    
                       </div>
                       
                       <div class="col-sm-4">
                       <div class=" required ">

                               <div class="col-sm-10">
                                   <div class="card">
                                       <div class="content">
                                           <div class="row">
                                               <div class="col-xs-12">
                                                   <div class="icon-warning text-center">
                                                       <img class="img-thumbnail" src="<?php echo base_url() . 'Uploads/Settings/' .  $set['Image']; ?>">
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="footer">
                                               <hr>
                                               <div class="stats">
                                                   <?php echo form_error('image'); ?>
                                                   <p style="margin-left:10px;">Logo en iyi 150x30 ölçülerinde gözükmektedir.<br></p>
                                                   <input type="file" class="form-control" id="input-password" placeholder="Resim" value="<?php echo set_value('image'); ?>" name="image">
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



