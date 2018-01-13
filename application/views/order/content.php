<?php $msg = $this->session->flashdata('order_remove'); ?>
<?php  if ($msg) {
    echo '<script>toastr.success("'.$msg.'");</script>';
} ?>

<?php $msg = $this->session->flashdata('basket_checkout'); ?>
<?php  if ($msg) {
    echo '<script>toastr.success("Siparişleriniz aşağıdadır.","'.$msg.'");</script>';
} ?>

<title><?php echo 'Siparişlerim' . ' - ' . $title  ?> </title>

<div id="container">
    <div class="container">
        <!-- Breadcrumb Start-->
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url() . 'Anasayfa'; ?>"><i class="fa fa-home"></i></a></li>
            <li><a href="<?php echo base_url() . 'Siparislerim' ?>">Siparişlerim</a></li>
        </ul>
        <!-- Breadcrumb End-->
        <div class="row">

            <div class="col-sm-12" id="content">
                <div class="panel panel-warning">
                    <div class="panel-heading"><b>Siparişlerim</b></b></div>
                    <div class="panel-body">

                        <?php if (!empty($GetUserOrders[0])) { ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Sip.Kodu</th>
                                        <th class="text-center">Ür.Kodu</th>
                                        <th class="text-center">Ür.Resmi</th>
                                        <th>Ürün</th>
                                        <th class="text-center">Adet</th>
                                        <th class="text-right">Fiyat</th>
                                        <th class="text-right">Toplam</th>
                                        <th class="text-center">Tarih</th>
                                        <th class="text-center">Durum</th>
                                        <th>Kargo Takip No</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($GetUserOrders as $item) { ?>
                                        <tr>
                                            <td class="text-center padding-top-25"><?php echo $item['basketId'] ?></td>
                                            <td class="text-center padding-top-25"><a
                                                        href="<?php echo base_url() . 'Urun/' . getTrCh($item['productName']) . '/' . $item['productId'] ?>"><?php echo $item['productId'] ?></a><br>
                                            <td class="text-center"><a
                                                        href="<?php echo base_url() . 'Urun/' . getTrCh($item['productName']) . '/' . $item['productId'] ?>"><img
                                                            style="height:50px; width:50px;"
                                                            src="<?php echo base_url() . 'Uploads/Product/' . $item['productImage'] ?>"
                                                            alt="" title="<?php echo $item['productName'] ?>" class=""></a>
                                            </td>
                                            <td class="col-xs-4 text-left padding-top-25"><a
                                                        href="<?php echo base_url() . 'Urun/' . getTrCh($item['productName']) . '/' . $item['productId'] ?>"><?php echo $item['productName'] ?></a><br>
                                            <td class=" text-center padding-top-25"><?php echo $item['basketAmount'] ?></td>
                                            <td class="text-right padding-top-25"><?php echo $item['productPrice'] ?>
                                                TL
                                            </td>
                                            <td class="text-right padding-top-25"><?php echo $item['basketTotal'] * $item['basketAmount'] ?>
                                                TL
                                            </td>
                                            <td class=" text-center padding-top-15"><?php echo mdate($datestring2, strtotime($item['basketTime'])); ?></td>
                                            <td class="text-center padding-top-25">

                                                <?php if ($item['basketStatus'] == -1) { ?>
                                                    <span class="badge badge-danger">İptal Edildi</span>
                                                <?php } ?>

                                                <?php if ($item['basketStatus'] == 2) { ?>
                                                    <span class="badge badge-warning">Hazırlanıyor</span>
                                                    <?php if ($item['basketStatus'] != -1 || $item['basketStatus'] != 2) { ?>
                                                        <a href="<?php echo base_url() . 'Siparis/Iptal/' . $item['basketId'] ?>"><span
                                                                    class="badge badge-danger">İptal Et</span></a>
                                                    <?php } ?>
                                                <?php } ?>

                                                <?php if ($item['basketStatus'] == 1) { ?>
                                                    <span class="badge badge-success">Gönderildi</span>
                                                <?php } ?>

                                            </td>
                                            <td class="text-left padding-top-25"><?php echo $item['basketTrackingNumber'] ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-info text-center no-margin" role="alert">
                                Henüz siparişiniz yok.
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
