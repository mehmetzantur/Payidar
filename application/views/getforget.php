<!DOCTYPE html>
<html lang="tr">

<head>
    <?php $this->load->view("includes/site/head"); ?>
</head>

<body>
<div class="wrapper-wide">

    <?php $this->load->view("includes/site/header"); ?>

    <title><?php echo $title ?> </title>
    <?php $msg = $this->session->flashdata('mail_ok'); ?>
    <?php $msg2 = $this->session->flashdata('mail_danger'); ?>
    <?php if ($msg) {
        echo '<script>toastr.success("' . $msg . '");</script>';
    } ?>

    <?php if ($msg2) {
        echo '<script>toastr.error("' . $msg2 . '");</script>';
    } ?>

    <div class="container"><br>

        <div class="col-xs-12" id="content">
            <div class="panel panel-warning">
                <div class="panel-heading">Şifremi Unuttum</div>
                <div class="panel-body">


                    <form action="<?php echo base_url() . 'Register/SendForget' ?>" method="post">
                        <div class="col-xs-12">
                            <div class="form-group required">
                                <div class="col-xs-6 text-center">
                                    <input type="email"  class="form-control" name="usermail"
                                           placeholder="Email Adresiniz...">
                                    <?php echo form_error('usermail'); ?>
                                </div>
                                <div class="col-xs-6">
                                    <input type="submit" name="sendforget" class="btn btn-success btn-xs"
                                           value="Şifremi Gönder">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


    <?php $this->load->view("includes/site/footer"); ?>

</div>
</body>

</html>
