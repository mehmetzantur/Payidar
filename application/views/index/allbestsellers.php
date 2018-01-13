<?php $msg = $this->session->flashdata('basket_success'); ?>
<?php if ($msg) {
    echo '<script>toastr.success("' . $msg . '");</script>';
} ?>

<title><?php echo $title ?> </title>

<div id="container">
    <div class="container">
        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-xs-12">

                <!-- Breadcrumb Start-->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url() . 'Anasayfa'; ?>"><i class="fa fa-home"></i></a></li>
                    <li><a href="<?php echo base_url() . 'Urunler/CokSatanlar' ?>">Çok Satanlar</a></li>
                </ul>
                <!-- Breadcrumb End-->

                <!-- Super Fırsatlar Product Start-->
                <h3 class="subtitle">Çok Satanlar</h3>


                <?php foreach ($AllBestsellers as $disc) {
                    $title = url_title(convert_accented_characters($disc['Name']));
                    $name = $disc['Name'] . '...';
                    $name = character_limiter($name, 25);
                    ?>

                    <div class="product-layout product-grid col-lg-3 col-md-3 col-sm-4 col-xs-12">


                        <div class="product-thumb clearfix">
                            <div class="image"><a
                                    href="<?php echo base_url() . 'Urun/' . $title . '/' . $disc['Id']; ?>"><img
                                        class="product-home-img"
                                        src="<?php echo base_url() . 'Uploads/Product/' . $disc['Image']; ?>"
                                        alt="<?php echo $disc['Name']; ?>" title="<?php echo $disc['Name']; ?>"
                                        class="img-responsive"/></a></div>
                            <div class="caption">
                                <h4>
                                    <a href="<?php echo base_url() . 'Urun/' . $title . '/' . $disc['Id']; ?>"><?php echo $name; ?></a>
                                </h4>
                                <p class="price"><span class="price-new"><?php echo $disc['Price']; ?> TL</span> <span
                                        class="saving-new"><?php echo "Yeni!" ?></span></p>
                            </div>
                            <div class="button-group">
                                <?php if (!empty($userFirstName)) { ?>
                                    <form class="" action="<?php echo base_url() . 'Basket/AddBasket' ?>" method="post">
                                        <input type="hidden" name="productid" value="<?php echo $disc['Id'] ?>">
                                        <input type="hidden" name="amount" value="1">
                                        <button name="add" class="btn-primary" type="submit" onClick=""><span><i
                                                    class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;Sepete Ekle</span>
                                        </button>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>


                    </div>
                <?php  } ?>
            </div>
            <!--Middle Part End-->
        </div>
    </div>
</div>
