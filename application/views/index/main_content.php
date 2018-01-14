

<title><?php echo $title ?> </title>

<div id="container">
    <div class="container">
        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-xs-12">
                <div class="row">
                    <div class="col-sm-12">

                        <?php $msg = $this->session->flashdata('basket_success'); ?>
                        <?php if ($msg) {
                            echo '<script>toastr.success("' . $msg . '");</script>';
                        } ?>

                        <!-- Slideshow Start-->
                        <div class="slideshow single-slider owl-carousel">
                            <?php
                            foreach ($homeSlider as $slider) {
                                echo '<div class="item"> <a href="'. $slider['Url'] .'"><img class="img-responsive slider-image" src=' . base_url() . 'Uploads/Slider/' . $slider['Image'] . ' alt="banner 2" /></a></div>';
                            }
                            ?>

                        </div>
                        <!-- Slideshow End-->
                    </div>
                    <!-- <div class="col-sm-4 pull-right flip">
                            <div class="marketshop-banner">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <a href="#"><img title="sample-banner1" alt="sample-banner1"
                                    src=<?php echo base_url() . 'assets/image/banner/sp-small-banner-360x185.jpg'; ?> /> </a></div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <a href="#"><img title="sample-banner" alt="sample-banner" src=<?php echo base_url() . 'assets/image/banner/sp-small-banner1-360x185.jpg'; ?> /> </a></div>
                                </div>
                            </div>
                        </div>
                    -->
                </div>
                <!-- Super Fırsatlar Product Start-->
                <h3 class="subtitle">Süper Fırsatlar - <a class="viewall"
                                                          href="<?php echo base_url() . 'Urunler/SuperFirsatlar' ?>">Hepsini
                        Gör</a></h3>
                <div class="owl-carousel product_carousel">
                    <?php foreach ($discounts as $disc) {
                        $itemdisc = ((($disc['Price'] / $disc['OldPrice']) * 100));
                        $itemdisc = 100 - $itemdisc;
                        $itemdisc = round($itemdisc, 0);
                        if ($itemdisc != 0) {
                            $title = getTrCh($disc['Name']);
                            $name = $disc['Name'] . '...';
                            $name = character_limiter($name, 25);
                            ?>

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
                                    <p class="price"><span class="price-new"><?php echo $disc['Price']; ?> TL</span>
                                        <span class="price-old"><?php echo $disc['OldPrice']; ?> TL</span> <span
                                                class="saving"><?php echo "%" . $itemdisc ?></span></p>
                                </div>
                                <div class="button-group">
                                    <?php if (!empty($userFirstName)) { ?>
                                        <form class="" action="<?php echo base_url() . 'Basket/AddBasket' ?>"
                                              method="post">
                                            <input type="hidden" name="productid" value="<?php echo $disc['Id'] ?>">
                                            <input type="hidden" name="amount" value="1">
                                            <button name="add" class="btn-primary" type="submit" onClick=""><span><i
                                                            class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;Sepete Ekle</span>
                                            </button>
                                        </form>
                                    <?php } ?>
                                </div>
                            </div>

                        <?php }
                    } ?>


                </div>


                <!-- En Yeniler Product Start-->
                <h3 class="subtitle">En Yeniler - <a class="viewall"
                                                     href="<?php echo base_url() . 'Urunler/EnYeniler' ?>">Hepsini
                        Gör</a></h3>
                <div class="owl-carousel product_carousel">
                    <?php foreach ($thenewests as $disc) {
                        $title = url_title(convert_accented_characters($disc['Name']));
                        $name = $disc['Name'] . '...';
                        $name = character_limiter($name, 25);
                        ?>

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

                    <?php } ?>


                </div>
                <!-- En Yeniler Product End-->

                <!-- Çok Satanlar Product Start-->
                <h3 class="subtitle">Çok Satanlar - <a class="viewall"
                                                       href="<?php echo base_url() . 'Urunler/CokSatanlar' ?>">Hepsini
                        Gör</a></h3>
                <div class="owl-carousel product_carousel">
                    <?php foreach ($Bestsellers as $disc) {
                        $title = url_title(convert_accented_characters($disc['Name']));
                        $name = $disc['Name'] . '...';
                        $name = character_limiter($name, 25);
                        ?>

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
                                            class="saving-new"><i class="fa fa-star" aria-hidden="true"></i></span></p>
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

                    <?php } ?>


                </div>
                <!-- En Yeniler Product End-->


            </div>
            <!--Middle Part End-->
        </div>
    </div>
</div>
