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
                                <div class="col-xs-6">
                                    <div class="text-left">
                                        <h6>Siparişler</h6>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="text-right">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th class="text-center">Sip.Kodu</th>
                                <th class="text-center">Ür.Kodu</th>
                                <th class="text-left">Adı Soyadı</th>
                                <th class="text-left">Kargo T.No</th>
                                <th class="text-center">Durum</th>
                                <th class="text-right"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($GetOrders as $item) { ?>

                                <tr>
                                    <td class="text-center padding-top-25"><?php echo $item['basketId'] ?></td>
                                    <td class="text-center padding-top-25"><a
                                                href="<?php echo base_url() . 'Panel/Product/UpdateProduct/' . $item['basketProductId'] ?>"><?php echo '#' . $item['basketProductId'] ?></a>
                                    </td>
                                    <td class="text-left padding-top-25"><a
                                                href="<?php echo base_url() . 'Panel/User/UpdateUser/' . $item['userId']; ?>"><?php echo '#' . $item['userId'] . ' - ' . $item['userFirstName'] . ' ' . $item['userLastName'] ?></a>
                                    </td>

                                    <td class="text-left padding-top-25">

                                        <form action="<?php echo base_url() . 'Panel/Order/UpdateTracking/' . $item['basketId'] ?>" method="post">
                                            <input name="trackingno" type="text" class="col-xs-8 no-padding "
                                                   placeholder="Kargo Takip No..." value="<?php echo $item['basketTrackingNumber']; ?>"> &nbsp;
                                            <input type="submit" class="btn btn-success btn-xs"  style="border-width: 1px !important;" name="tracking" value="Güncelle">
                                        </form>

                                    </td>

                                    <td class="text-center padding-top-25">
                                        <?php if ($item['basketStatus'] == -1) { ?>
                                            <span class="badge badge-danger">İptal Edildi</span>
                                        <?php } ?>

                                        <?php if ($item['basketStatus'] == 2) { ?>
                                            <span class="badge badge-warning">Hazırlanıyor</span>

                                            <a href="<?php echo base_url() . 'Panel/Order/OkOrder/' . $item['basketId'] ?>"><span
                                                        class="badge badge-success">Gönder</span></a>

                                            <a href="<?php echo base_url() . 'Panel/Order/CancelOrder/' . $item['basketId'] ?>"><span
                                                        class="badge badge-danger">İptal Et</span></a>
                                        <?php } ?>

                                        <?php if ($item['basketStatus'] == 1) { ?>
                                            <span class="badge badge-success">Gönderildi</span>

                                            <a href="<?php echo base_url() . 'Panel/Order/CancelOrder/' . $item['basketId'] ?>"><span
                                                        class="badge badge-danger">İptal Et</span></a>
                                        <?php } ?>
                                    </td>
                                </tr>

                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<?php $this->load->view("includes/panel/include_script.php"); ?>


</body>

</html>
