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


                <!-- Super Fırsatlar Product Start-->
                <h3 class="subtitle"><?php echo '"' . $SearchedText . '"' ?> aramasına ait ürünler</h3>


                <?php foreach ($GetSearchedProducts as $pro) {
                    $title = url_title(convert_accented_characters($pro['Name']));
                    $name = $pro['Name'] . '...';
                    $name = character_limiter($name, 25);
                    ?>

                    <div class="product-layout product-grid col-lg-3 col-md-3 col-sm-4 col-xs-12">


                        <div class="product-thumb clearfix">
                            <div class="image"><a
                                    href="<?php echo base_url() . 'Urun/' . $title . '/' . $pro['Id']; ?>"><img
                                        class="product-home-img"
                                        src="<?php echo base_url() . 'Uploads/Product/' . $pro['Image']; ?>"
                                        alt="<?php echo $pro['Name']; ?>" title="<?php echo $pro['Name']; ?>"
                                        class="img-responsive"/></a></div>
                            <div class="caption">
                                <h4>
                                    <a href="<?php echo base_url() . 'Urun/' . $title . '/' . $pro['Id']; ?>"><?php echo $name; ?></a>
                                </h4>
                                <p class="price"><span class="price-new"><?php echo $pro['Price']; ?> TL</span></p>
                            </div>
                            <div class="button-group">
                                <?php if (!empty($userFirstName)) { ?>
                                    <form class="" action="<?php echo base_url() . 'Basket/AddBasket' ?>" method="post">
                                        <input type="hidden" name="productid" value="<?php echo $pro['Id'] ?>">
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
