<?php $msg = $this->session->flashdata('profile_success'); ?>
<?php if ($msg) {
    echo '<script>toastr.success("' . $msg . '");</script>';
} ?>

<title><?php echo $GetUserProfile[0]['FirstName'] . ' ' . $GetUserProfile[0]['LastName'] . ' - ' . $title; ?> </title>

<div id="container">
    <form class="form-horizontal" action=<?php echo base_url() . 'Profil/Guncelle'; ?> method="post"
          enctype="multipart/form-data">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url() . 'Anasayfa'; ?>"><i class="fa fa-home"></i></a></li>
                <li><a href="Profil">Profil</a></li>
            </ul>
            <!-- Breadcrumb End-->
            <div class="row">
                <!--Middle Part Start-->
                <div class="col-sm-4" id="content">
                    <div class="panel panel-warning">
                        <div class="panel-heading">Profil</div>
                        <div class="panel-body">
                            <img src="<?php echo base_url() . 'Uploads/User/' . $GetUserProfile[0]['Image']; ?>"
                                 class="img-responsive" alt="Cinque Terre">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" id="input-password" placeholder="Resim"
                                           name="image">
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!--Middle Part End -->
                <!--Right Part Start -->
                <div class="col-sm-8" id="content">
                    <div class="panel panel-warning">
                        <div class="panel-heading">Bilgilerim</div>
                        <div class="panel-body">


                            <fieldset id="account">
                                <legend>Kişisel Bilgiler</legend>
                                <div style="display: none;" class="form-group required">
                                    <label class="col-sm-2 control-label">Customer Group</label>
                                    <div class="col-sm-12">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" checked="checked" value="1"
                                                       name="customer_group_id">
                                                Default</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <?php echo form_error('firstname'); ?>
                                        <input type="text" class="form-control" id="input-firstname"
                                               placeholder="Adınız"
                                               value="<?php echo $GetUserProfile[0]['FirstName']; ?>" name="firstname">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <?php echo form_error('lastname'); ?>
                                        <input type="text" class="form-control" id="input-lastname"
                                               placeholder="Soyadınız"
                                               value="<?php echo $GetUserProfile[0]['LastName']; ?>" name="lastname">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <?php echo form_error('email'); ?>
                                        <input type="email" class="form-control" id="input-email" placeholder="E-Mail"
                                               value="<?php echo $GetUserProfile[0]['Email']; ?>" name="email">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <?php echo form_error('password'); ?>
                                        <input type="password" class="form-control" id="input-password"
                                               placeholder="Şifre" value="<?php echo $GetUserProfile[0]['Password']; ?>"
                                               name="password">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <?php echo form_error('confirm'); ?>
                                        <input type="password" class="form-control" id="input-confirm"
                                               placeholder="Şifre Tekrar"
                                               value="<?php echo $GetUserProfile[0]['Password']; ?>" name="confirm">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <?php echo form_error('telephone'); ?>
                                        <input type="tel" class="form-control" id="input-telephone"
                                               placeholder="Telefon"
                                               value="<?php echo $GetUserProfile[0]['Telephone']; ?>" name="telephone">
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset id="address">
                                <legend>Adres Bilgileri</legend>
                                <!--<div class="form-group">
                        <div class="col-sm-12">
                          <input type="text" class="form-control" id="input-company" placeholder="Adres Adı" value="" name="company">
                        </div>
                      </div>-->
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <?php echo form_error('city'); ?>
                                        <select class="form-control" name="city">
                                            <?php foreach ($cityList as $city) {
                                                if ($city['isim'] == $GetUserProfile[0]['City']) { ?>
                                                    <option name="city" selected
                                                            value="<?php echo $city['isim'] ?>"><?php echo $city['isim'] ?></option>
                                                <?php } else { ?>
                                                    <option name="city" value="<?php echo $city['isim'] ?>"><?php echo $city['isim'] ?></option>
                                                <?php } ?>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <?php echo form_error('address'); ?>
                                        <input type="text" class="form-control" id="input-address" placeholder="Adres"
                                               value="<?php echo $GetUserProfile[0]['Address']; ?>" name="address">
                                    </div>
                                </div>

                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <?php echo form_error('postcode'); ?>
                                        <input type="text" class="form-control" id="input-postcode"
                                               placeholder="Posta Kodu"
                                               value="<?php echo $GetUserProfile[0]['PostCode']; ?>" name="postcode">
                                    </div>
                                </div>
                            </fieldset>

                            <div class="buttons">
                                <div class="pull-right">
                                    <input type="submit" class="btn btn-primary" name="update"
                                           value="Değişiklikleri Kaydet">
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!--Right Part End -->
            </div>
        </div>
    </form>
</div>
