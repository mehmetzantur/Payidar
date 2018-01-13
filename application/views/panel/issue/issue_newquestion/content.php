<div id="container">
    <div class="container">
        <!-- Breadcrumb Start-->
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i></a></li>
            <li><a href="<?php echo base_url() . 'Profil/Mesajlarim' ?>">Mesajlarım</a></li>
        </ul>
        <!-- Breadcrumb End-->
        <div class="row">

            <div class="col-sm-4" id="content">
                <div class="panel panel-info">
                    <div class="panel-heading"><b>İşlemler</b></div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
                            <li role="presentation"><a href="<?php echo base_url() . 'Profil' ?>">Profilim</a></li>
                            <li role="presentation" class="active"><a
                                        href="<?php echo base_url() . 'Profil/Mesajlarim' ?>">Mesajlarım</a></li>
                            <li role="presentation"><a href="<?php echo base_url() . 'Profil/Siparislerim' ?>">Siparişlerim</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-sm-8" id="content">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12"><b>Yeni Soru</b></div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="<?php echo base_url() . 'Issue/AddNewQuestion'; ?>" method="post">
                            <fieldset id="account">
                                <div class="form-group required">
                                    <label for="input-payment-firstname" class="control-label">Başlık</label>
                                    <?php echo form_error('title'); ?>
                                    <input type="text" class="form-control" id="input-payment-firstname"
                                           placeholder="Başlık" value="" name="title">
                                </div>
                                <div class="form-group required">
                                    <label for="input-payment-firstname" class="control-label">Mesaj</label>
                                    <?php echo form_error('question'); ?>
                                    <textarea class="form-control" rows="5" name="question" placeholder="Mesajınız..."></textarea>
                                </div>
                                <div class="form-group required text-right" >
                                    <input type="submit" name="add" class="btn btn-primary"
                                           data-loading-text="Loading..."
                                           id="button-coupon" value="Gönder">
                                </div>

                            </fieldset>


                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
