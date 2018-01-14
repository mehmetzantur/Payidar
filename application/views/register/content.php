<title><?php echo 'Giriş Yap / Üye Ol' . ' - ' . $title ?> </title>
<div id="container">
    <div class="container">
        <!-- Breadcrumb Start-->
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url() . 'Anasayfa'; ?>"><i class="fa fa-home"></i></a></li>
            <li><a href="Register">Hesap</a></li>
        </ul>
        <!-- Breadcrumb End-->
        <div class="row">
            <!--Middle Part Start-->
            <div class="col-sm-8" id="content">
                <h1 class="title">Hesap Oluştur</h1>
                <form class="form-horizontal" action=<?php echo base_url() . 'Register/Login'; ?> method="post">

                    <fieldset id="account">
                        <legend>Kişisel Bilgiler</legend>
                        <div style="display: none;" class="form-group required">
                            <label class="col-sm-2 control-label">Customer Group</label>
                            <div class="col-sm-12">
                                <div class="radio">
                                    <label>
                                        <input type="radio" checked="checked" value="1" name="customer_group_id">
                                        Default</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group required">
                            <div class="col-sm-12">
                                <?php echo form_error('firstname'); ?>
                                <input type="text" class="form-control" id="input-firstname" placeholder="Adınız"
                                       value="<?php echo set_value('firstname'); ?>" name="firstname">
                            </div>
                        </div>
                        <div class="form-group required">
                            <div class="col-sm-12">
                                <?php echo form_error('lastname'); ?>
                                <input type="text" class="form-control" id="input-lastname" placeholder="Soyadınız"
                                       value="<?php echo set_value('lastname'); ?>" name="lastname">
                            </div>
                        </div>
                        <div class="form-group required">
                            <div class="col-sm-12">
                                <?php echo form_error('email'); ?>
                                <input type="email" class="form-control" id="input-email" placeholder="E-Mail"
                                       value="<?php echo set_value('email'); ?>" name="email">
                            </div>
                        </div>
                        <div class="form-group required">
                            <div class="col-sm-12">
                                <?php echo form_error('password'); ?>
                                <input type="password" class="form-control" id="input-password" placeholder="Şifre"
                                       value="<?php echo set_value('password'); ?>" name="password">
                            </div>
                        </div>
                        <div class="form-group required">
                            <div class="col-sm-12">
                                <?php echo form_error('confirm'); ?>
                                <input type="password" class="form-control" id="input-confirm"
                                       placeholder="Şifre Tekrar" value="<?php echo set_value('confirm'); ?>"
                                       name="confirm">
                            </div>
                        </div>
                        <div class="form-group required">
                            <div class="col-sm-12">
                                <?php echo form_error('telephone'); ?>
                                <input type="tel" class="form-control" id="input-telephone" placeholder="Telefon"
                                       value="<?php echo set_value('telephone'); ?>" name="telephone">
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
                                    <?php foreach ($cityList as $city) { ?>
                                        <option  value="<?php echo $city['isim'] ?>"><?php echo $city['isim'] ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>


                        <div class="form-group required">
                            <div class="col-sm-12">
                                <?php echo form_error('address'); ?>
                                <input type="text" class="form-control" id="input-address" placeholder="Adres"
                                       value="<?php echo set_value('address'); ?>" name="address">
                            </div>
                        </div>

                        <div class="form-group required">
                            <div class="col-sm-12">
                                <?php echo form_error('postcode'); ?>
                                <input type="text" class="form-control" id="input-postcode" placeholder="Posta Kodu"
                                       value="<?php echo set_value('postcode'); ?>" name="postcode">
                            </div>
                        </div>
                    </fieldset>

                    <div class="buttons">
                        <div class="pull-right">
                            <input type="checkbox" value="1" name="agree"> &nbsp;Sözleşmeyi okudum ve kabul ediyorum. <a
                                    class="agree" href="#"><b>Gizlilik Sözleşmesi</b></a> &nbsp;
                            <input type="submit" class="btn btn-primary" name="register" value="Hesap Oluştur">
                        </div>
                    </div>
                </form>
            </div>
            <!--Middle Part End -->
            <!--Right Part Start -->
            <div class="col-sm-4" id="content">
                <h1 class="title">Zaten Üye Misin?</h1>
                <form class="form-horizontal" action=<?php echo base_url() . 'Register/Login'; ?> method="post">
                    <fieldset id="account">
                        <legend>Giriş Yap</legend>
                        <div style="display: none;" class="form-group required">
                            <label class="col-sm-2 control-label">Customer Group</label>
                            <div class="col-sm-12">
                                <div class="radio">
                                    <label>
                                        <input type="radio" checked="checked" value="1" name="customer_group_id">
                                        Default</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group required">
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="input-email" placeholder="E-Mail" value=""
                                       name="login_email">
                                <?php echo form_error('login_email'); ?>
                            </div>
                        </div>
                        <div class="form-group required">
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="input-password" placeholder="Şifre"
                                       value="" name="login_password">
                                <?php echo form_error('login_password'); ?>
                            </div>
                        </div>
                    </fieldset>
                    <div class="buttons">
                        <div class="pull-left"><input type="checkbox" value="1" name="agree">&nbsp;&nbsp;Beni Hatırla
                        </div>
                        <div class="pull-right">
                            &nbsp;<a href="<?php echo base_url(). 'Register/GetForget' ?>">Şifremi Unuttum</a> &nbsp;
                            <input type="submit" class="btn btn-primary" value="Giriş Yap" name="login">
                        </div>
                    </div>
                </form>


            </div>
            <!--Right Part End -->
        </div>
    </div>
</div>
