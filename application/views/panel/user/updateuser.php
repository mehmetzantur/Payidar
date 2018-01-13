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

				<form class="form-horizontal" action=<?php echo base_url(). 'Panel/User/Update'; ?> method="post"enctype="multipart/form-data">
                    <fieldset id="account">
                       <div class="col-sm-12">
                       <br>
                            <?php foreach($users as $user) { ?>
                                <div class="form-group required no-margin input-margin-bottom">
                                        <input type="hidden" class="form-control" id="input-email" placeholder="Sırası" value="<?php echo $user['Id']; ?>" name="hidden">
                                </div>
                                <div class="col-sm-6 form-group required no-margin input-margin-bottom" >
                                    <div class="">
                                        <?php echo form_error('email'); ?>
                                        Email:<input type="text" class="form-control border-input" id="input-email" placeholder="Email" value="<?php echo $user['Email']; ?>" name="email">
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group required no-margin input-margin-bottom" >
                                    <div class="content">
                                        <?php echo form_error('password'); ?>
                                        Şifre:<input type="password" class="form-control border-input" id="input-lastname" placeholder="Şifre" value="<?php echo  $user['Password']; ?>" name="password">
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group required no-margin input-margin-bottom" >
                                    <div class="">
                                        <?php echo form_error('firstname'); ?>
                                        Adı:<input type="text" class="form-control border-input" id="input-lastname" placeholder="Adı" value="<?php echo  $user['FirstName']; ?>" name="firstname">
                                    </div>
                                </div>    
                                <div class="col-sm-6 form-group required no-margin input-margin-bottom" >
                                    <div class="">
                                        <?php echo form_error('lastname'); ?>
                                        Soyadı:<input type="text" class="form-control border-input" id="input-lastname" placeholder="Soyadı" value="<?php echo  $user['LastName']; ?>" name="lastname">
                                    </div>
                                </div> 
                                <div class="col-sm-6 form-group required no-margin input-margin-bottom" >
                                    <div class="">
                                        <?php echo form_error('address'); ?>
                                        Adres:<textarea class="form-control border-input" placeholder="Adres" rows="4" cols="50" name="address">
                                            <?php echo  $user['Address']; ?>
                                        </textarea>
                                    </div>
                                </div> 
                                <div class="col-sm-6 form-group required no-margin input-margin-bottom" >
                                    <div class="">
                                        <?php echo form_error('authority'); ?>
                                        Yetki:<input type="text" class="form-control border-input" id="input-lastname" placeholder="Yetki (Standart:10 , Admin:100)" value="<?php echo  $user['Authority']; ?>" name="authority">
                                    </div>
                                </div> 
                                <div class="col-sm-6 form-group required no-margin input-margin-bottom" >
                                    <div class="">
                                        <?php echo form_error('telephone'); ?>
                                        Telefon:<input type="text" class="form-control border-input" id="input-lastname" placeholder="Telefon" value="<?php echo  $user['Telephone']; ?>" name="telephone">
                                    </div>
                                </div>     
                                <div class="col-sm-6 form-group required no-margin input-margin-bottom" >
                                    <div class="">
                                        <?php echo form_error('postcode'); ?>
                                        Posta Kodu:<input type="text" class="form-control border-input" id="input-lastname" placeholder="Posta Kodu" value="<?php echo  $user['PostCode']; ?>" name="postcode">
                                    </div>
                                </div>    
                                <div class="col-sm-6 form-group required no-margin input-margin-bottom">
                                    <div class="card">
                                                <div class="content">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class="icon-warning text-center">
                                                                <img class="img-thumbnail" src="<?php echo base_url() . 'Uploads/User/' .  $user['Image']; ?>">
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
                                <div class="col-sm-12 form-group required no-margin input-margin-bottom " >
                                    <div class="pull-right">
                                    <input type="submit" class="btn btn-fill btn-success btn-xl" value="Kaydet" name="update">
                                    </div>
                                </div>  
                            <?php } ?>            
                       </div>

                    </fieldset>

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



