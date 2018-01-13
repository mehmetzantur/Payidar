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
										<h6>Ürün Düzenle</h6>
									</div>
								</div>
							</div>
						</div>

				<form class="form-horizontal" action=<?php echo base_url(). 'Panel/Product/Update'; ?> method="post" enctype="multipart/form-data">
                    <fieldset id="account">
                       <div class="col-sm-10">
                       <br>
                            <?php foreach($productWhId as $pro) { ?>
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                    <input type="hidden" class="form-control" id="input-email" placeholder="Sırası" value="<?php echo $pro['Id']; ?>" name="hidden">
                                    <select class="form-control border-input" name="categoryid">

                                        <option value="0" disabled selected>Kategori Seçiniz</option>
                                            <?php
                                                foreach($category as $cat2){
                                                    if($cat2['ParentId'] == $cat2['Id']){
                                                        if($cat2['ParentId'] == 0){
                                if ($cat2['Id'] == $pro['CategoryId']) {
                                    echo '<option value="'.$cat2['Id'].'" selected>+ '.$cat2['Name'].'</option>';
                                }else {
                                    echo '<option value="'.$cat2['Id'].'">+ '.$cat2['Name'].'</option>';
                                }
                                }
                                                        else{
                                if ($cat2['Id'] == $pro['CategoryId']) {
                                    echo '<option value="'.$cat2['Id'].'" selected>- '.$cat2['Name'].'</option>';
                                }else {
                                    echo '<option value="'.$cat2['Id'].'">- '.$cat2['Name'].'</option>';
                                }
                                }

                                                    }

                                                    else{
                                                        if($cat2['ParentId'] == 0){
                                if ($cat2['Id'] == $pro['CategoryId']) {
                                    echo '<option value="'.$cat2['Id'].'" selected>+ '.$cat2['Name'].'</option>';
                                }else {
                                    echo '<option value="'.$cat2['Id'].'">+ '.$cat2['Name'].'</option>';
                                }
                                }
                                                        else{
                                if ($cat2['Id'] == $pro['CategoryId']) {
                                    echo '<option value="'.$cat2['Id'].'" selected>- '.$cat2['Name'].'</option>';
                                }else {
                                    echo '<option value="'.$cat2['Id'].'">- '.$cat2['Name'].'</option>';
                                }
                                }
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
                                        <input type="text" class="form-control border-input" id="input-email" placeholder="Sırası" value="<?php echo $pro['Order']; ?>" name="order">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <?php echo form_error('name'); ?>
                                        <input type="text" class="form-control border-input" id="input-lastname" placeholder="Ürün Adı" value="<?php echo  $pro['Name']; ?>" name="name">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <?php echo form_error('price'); ?>
                                        <input type="text" class="form-control border-input" id="input-lastname" placeholder="Ürün Fiyatı" value="<?php echo  $pro['Price']; ?>" name="price">
                                    </div>
                                </div>   
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <?php echo form_error('oldprice'); ?>
                                        <input type="text" class="form-control border-input" id="input-lastname" placeholder="Ürün Eski Fiyatı" value="<?php echo  $pro['OldPrice']; ?>" name="oldprice">
                                    </div>
                                </div>                         
                       </div>
                       <div class="col-sm-2">
                            <div class=" required ">

                                    <div class="col-sm-10  pull-right">
                                        <div class="card">
                                            <div class="content">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="icon-warning text-center">
                                                            <img class="img-thumbnail" src="<?php echo base_url() . 'Uploads/Product/' .  $pro['Image']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="footer">
                                                    <hr>
                                                    <div class="stats">
                                                        <?php echo form_error('image'); ?>
                                                        <input type="file" class="form-control" id="input-password" placeholder="Resim" value="<?php echo set_value('image'); ?>" name="image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                       </div>

                        <div class="col-sm-10">
                            <div class="form-group required">
                                <div class="col-sm-12">
                                    <?php echo form_error('detail'); ?>
                                    <textarea rows="1" name="detail" id="detail">
                                        <p><?php echo  $pro['Detail']; ?></p>
                                    </textarea>

                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-2">
                            <div class="col-sm-12">
                                <div class="buttons">
                                    <div class="text-center">
                                        <input type="submit" class="btn btn-fill btn-success btn-xl" value="Kaydet" name="update">
                                    </div>
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

            <form class="form-horizontal" action=<?php echo base_url(). 'Panel/Product/AddGallery'; ?> method="post"enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="input-email" placeholder="Sırası" value="<?php echo $pro['Id']; ?>" name="hidden">
                    <div class="col-sm-2"><br>
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="icon-warning">
                                        <input  type="file" class="form-control" id="input-password" placeholder="Resim" value="<?php echo set_value('image'); ?>" name="galleryimage">
                                        </div>
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <hr>
                                    <div class="stats">
                                        <?php echo form_error('image'); ?>
                                        <input type="submit" class="btn btn-fill text-center btn-success btn-xl" value="Yükle" name="upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <?php foreach($galleryWhId as $gal) { ?>
                            <div class="col-sm-2"><br>
                                    <div class="card">
                                        <div class="content">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="icon-warning">
                                                        <img class="img-thumbnail" src="<?php echo base_url() . 'Uploads/Product/Gallery/' .  $gal['Image']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="footer text-center">
                                                <hr>
                                                <div class="stats"> 
                                                        <a href=<?php echo base_url().'Panel/Product/DeleteGallery/'.$gal['Id'].'/'.$gal['ProductId'];; ?> class="btn btn-fill text-center btn-danger btn-xl">Sil</a>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        <?php } ?>

                    </div>
                    
                </form>


        </div>


        

    </div>
</div>



        <?php $this->load->view("includes/panel/include_script.php"); ?>


</body>

</html>



