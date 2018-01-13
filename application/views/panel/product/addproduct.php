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
										<h6>Ürün Ekle</h6>
									</div>
								</div>
							</div>
						</div>

				<form class="form-horizontal" action=<?php echo base_url(). 'Panel/Product/Add'; ?> method="post" enctype="multipart/form-data">

              <fieldset id="account">
                  <div class="form-group required">
                      <div class="col-sm-12">

                          <select class="form-control" name="categoryid">
                          	<option value="0" selected disabled>Kategori Seçiniz</option>
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
                                    <select class="form-control border-input" name="brandid">

                                        <option value="0" disabled selected>Marka Seçiniz</option>
                                            <?php
                                                foreach($brand as $bra){
                                                    if ($bra['Id'] == $pro['BrandId']) {
                                                        echo '<option value="'.$bra['Id'].'" selected> '.$bra['Name'].'</option>';
                                                    }else {
                                                        echo '<option value="'.$bra['Id'].'"> '.$bra['Name'].'</option>';
                                                    }                                                }
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
                          <input type="text" class="form-control" id="input-lastname" placeholder="Ürün Adı" value="<?php echo set_value('name'); ?>" name="name">
                      </div>
                  </div>

                  <div class="form-group required">
                      <div class="col-sm-12">
                          <?php echo form_error('price'); ?>
                          <input type="text" class="form-control" id="input-lastname" placeholder="Ürün Fiyatı" value="<?php echo set_value('price'); ?>" name="price">
                      </div>
                  </div>

                  <div class="form-group required">
                      <div class="col-sm-12">
                          <?php echo form_error('oldprice'); ?>
                          <input type="text" class="form-control" id="input-lastname" placeholder="Ürün Eski Fiyatı" value="<?php echo set_value('oldprice'); ?>" name="oldprice">
                      </div>
                  </div>

                  <div class="form-group required">
                      <div class="col-sm-12">
                          <?php echo form_error('detail'); ?>
                          <textarea rows="1" name="detail" id="detail" heigh="200">
                              <p><?php echo set_value('detail'); ?></p>
                          </textarea>

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
