<?php $msg = $this->session->flashdata('basket_success'); ?>
<?php  if ($msg) {
    echo '<script>toastr.success("'.$msg.'");</script>';
} ?>

<?php $msg = $this->session->flashdata('basket_remove'); ?>
<?php  if ($msg) {
    echo '<script>toastr.success("'.$msg.'");</script>';
} ?>

<?php $msg = $this->session->flashdata('basket_checkout'); ?>
<?php  if ($msg) {
    echo '<script>toastr.success("'.$msg.'");</script>';
} ?>

<div class="container">
  <div class="row">
    <div class="col-xs-12 padding-20">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url() . 'Anasayfa'; ?>"><i class="fa fa-home"></i></a></li>
            <li><a href="<?php echo base_url() . 'Basket' ?>">Sepetim</a></li>
        </ul>
      <div class="panel panel-warning">
        <div class="panel-heading">
          <h4 class="panel-title"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Sepetim</h4>
        </div>
          <div class="panel-body">


            <?php if (!empty($GetBasketWhUserIdWithProduct)) { ?>
                <div id="content" class="col-sm-12">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <td class="text-center">#</td>
                      <td class="text-center">Kodu</td>
                      <td class="text-left">Ürün Adı</td>
                      <td class="text-center">Adet</td>
                      <td class="text-right">Birim Fiyatı</td>
                      <td class="text-right">Toplam</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $total = 0;
                      $fulltotal = 0;
                    ?>



                    <?php foreach ($GetBasketWhUserIdWithProduct as $item) { ?>
                      <tr>
                        <td class="text-center"><a href="<?php echo base_url() . 'Urun/' . getTrCh($item['productName']) . '/' . $item['productId'] ?>"><img style="height:50px; width:50px;" src="<?php echo base_url() . 'Uploads/Product/' . $item['productImage'] ?>" alt="" title="<?php echo $item['productName'] ?>" class=""></a></td>
                        <td class="col-xs-1 text-center padding-top-25"><a href="<?php echo base_url() . 'Urun/' . getTrCh($item['productName']) . '/' . $item['productId'] ?>"><?php echo $item['productId'] ?></a><br>
                        <td class="col-xs-5 text-left padding-top-25"><a href="<?php echo base_url() . 'Urun/' . getTrCh($item['productName']) . '/' . $item['productId'] ?>"><?php echo $item['productName'] ?></a><br>
                        <td class="col-xs-2  text-left ">
                            <form class="" action="<?php echo base_url() . 'Basket/UpdateBasket' ?>" method="post">
                              <div class="input-group btn-block quantity padding-top-10">
                                <input type="text" name="quantity" value="<?php echo $item['basketAmount'] ?>"  class="form-control input-sm">
                                <input type="hidden" name="basketId" value="<?php echo $item['basketId'] ?>"  class="form-control input-sm">
                                <span class="input-group-btn">
                                  <button type="submit" name="update" data-toggle="tooltip" title="" class="btn btn-success btn-xs" onclick="" data-original-title="Adeti Güncelle"><i class="fa fa-refresh"></i></button>
                                  <button type="submit" name="delete" data-toggle="tooltip" title="" class="btn btn-danger btn-xs" onclick="" data-original-title="Sil"><i class="fa fa-times-circle"></i></button>
                                </span>
                              </div>
                            </form>
                        </td>
                        <td class="col-xs-2 text-right padding-top-25"><?php echo $item['basketPrice'] ?> TL</td>
                        <td class="col-xs-2 text-right padding-top-25"><?php echo $item['basketTotal'] ?> TL</td>
                      </tr>
                      <?php $total += $item['basketTotal']; ?>
                    <?php } ?>
                  </tbody>
                </table>
              </div>


              <div class="row">
                <div class="col-sm-4 col-sm-offset-8">
                  <table class="table table-bordered">
                    <tbody><tr>
                      <td class="text-right"><strong>Ara Toplam:</strong></td>
                      <td class="text-right"><?php echo $total; ?> TL</td>
                    </tr>
                    <tr>
                      <td class="text-right"><strong>Kargo Ücreti:</strong></td>
                      <td class="text-right"><?php echo $shippingPrice ?> TL</td>
                    </tr>
                    <tr>
                      <td class="text-right"><strong>Genel Toplam:</strong></td>
                      <td class="text-right"><?php echo $total + $shippingPrice; ?> TL</td>
                    </tr>
                  </tbody></table>
                </div>
              </div>

              <div class="buttons">
                <div class="pull-left"><a href="<?php echo base_url(); ?>" class="btn btn-default">Alışverişe Devam Et</a></div>
                <div class="pull-right"><a href="<?php echo base_url() . 'Basket/Checkout/'; ?>" class="btn btn-primary">Sipariş Ver</a></div>
              </div>
            </div>
          <?php }else { ?>
                <div class="alert alert-info text-center" role="alert">
                    Henüz siparişiniz yok.
                </div>
          <?php } ?>

          </div>
        </div>
    </div>
  </div>
</div>
