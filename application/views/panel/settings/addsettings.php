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
										<h6>Ayar Ekle</h6>
									</div>
								</div>
							</div>
						</div>

				<form class="form-horizontal" action=<?php echo base_url(). 'Panel/Settings/Add'; ?> method="post" enctype="multipart/form-data">

              <fieldset id="account">
                  <div class="form-group required">
                      <div class="col-sm-12">
                          <?php echo form_error('name'); ?>
                          <input type="text" class="form-control" id="input-email" placeholder="Ayar Adı yada Sayfa Adı" value="<?php echo set_value('name'); ?>" name="name">
                      </div>
                  </div>

                    <div class="form-group required">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="input-email" placeholder="Bu alan bir sayfa mı? (Evet ise 1 hayır ise boş bırakın)" value="<?php echo set_value('ispage'); ?>" name="ispage">
                        </div>
                    </div>

                  <div class="form-group required">
                      <div class="col-sm-12">
                          <input type="text" class="form-control" id="input-email" placeholder="Bu bir ayar ise boş bırakın.Bu bir sayfa ise sıralamasını girin (örn:4)" value="<?php echo set_value('pageorder'); ?>" name="pageorder">
                      </div>
                  </div>



                    <div class="form-group required">
                        <div class="col-sm-12">
                            <?php echo form_error('detail'); ?>
                            <textarea rows="50" name="detail" id="detail" heigh="200">
                                <p><?php echo set_value('detail'); ?></p>
                            </textarea>

                        </div>
                    </div>

                    <div class="form-group required">
                            <div class="col-sm-12">
                            <p style="margin-left:10px;">Logo en iyi 150x30 ölçülerinde gözükmektedir.<br></p>
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
