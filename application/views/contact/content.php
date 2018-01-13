<?php $msg = $this->session->flashdata('mail_success'); ?>
<?php $msg2 = $this->session->flashdata('mail_danger'); ?>
<?php  if ($msg) {
    echo '<script>toastr.success("'.$msg.'");</script>';
} ?>

<?php  if ($msg2) {
    echo '<script>toastr.success("'.$msg2.'");</script>';
} ?>

<div class="container"><br>

    <div class="col-sm-4 " id="content">
        <div class="panel panel-warning">
            <div class="panel-heading">Firma Bilgileri</div>
            <div class="panel-body">
                <i class="fa fa-map-marker"> </i> Adres : <?php echo $address; ?> <br> <br>
                <i class="fa fa-phone"> </i> Telefon : <?php echo $telefon; ?> <br> <br>
            </div>
        </div>

    </div>

    <div class="col-sm-8" id="content">
        <div class="panel panel-warning">
            <div class="panel-heading">İletişim</div>
            <div class="panel-body">

                <form action="<?php echo base_url() . 'Contact/SendMail' ?>" method="post" class="form-horizontal">
                    <fieldset>
                        <div class="form-group required">
                            <label class="col-md-2 col-sm-3 control-label" for="input-name">Adınız:</label>
                            <div class="col-md-10 col-sm-9">
                                <?php echo form_error('name'); ?>
                                <input type="text" name="name" value="" id="input-name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-md-2 col-sm-3 control-label" for="input-email">E-Mail Adresi:</label>
                            <div class="col-md-10 col-sm-9">
                                <?php echo form_error('email'); ?>
                                <input type="text" name="email" value="" id="input-email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-md-2 col-sm-3 control-label" for="input-enquiry">Mesajınız:</label>
                            <div class="col-md-10 col-sm-9">
                                <?php echo form_error('message'); ?>
                                <textarea name="message" rows="10" id="input-enquiry" class="form-control"></textarea>
                            </div>
                        </div>
                    </fieldset>
                    <div class="buttons">
                        <div class="pull-right">
                            <input type="submit" class="btn btn-primary" name="sendmail" value="Gönder">
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>