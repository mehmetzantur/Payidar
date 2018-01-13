<?php $msg = $this->session->flashdata('basket_success'); ?>
<?php  if ($msg) {
    echo '<script>toastr.success("'.$msg.'");</script>';
} ?>

<?php $msg = $this->session->flashdata('comment_success'); ?>
<?php  if ($msg) {
    echo '<script>toastr.success("'.$msg.'","Yorumunuz Gönderildi.");</script>';
} ?>


<?php

  function GetProductRate ($getvote){
    switch ($getvote) {
      case 0:
              echo '<span class="fa fa-stack">
                <i class="fa fa-star-o fa-stack-1x"></i>
              </span>';
              echo '<span class="fa fa-stack">
                <i class="fa fa-star-o fa-stack-1x"></i>
              </span>';
              echo '<span class="fa fa-stack">
                <i class="fa fa-star-o fa-stack-1x"></i>
              </span>';
              echo '<span class="fa fa-stack">
                <i class="fa fa-star-o fa-stack-1x"></i>
              </span>';
              echo '<span class="fa fa-stack">
                <i class="fa fa-star-o fa-stack-1x"></i>
              </span>';
          break;
      case 1:
              echo '<span class="fa fa-stack">
                <i class="fa fa-star fa-stack-1x"></i>
                <i class="fa fa-star-o fa-stack-1x"></i>
              </span>';
              echo '<span class="fa fa-stack">
                <i class="fa fa-star-o fa-stack-1x"></i>
              </span>';
              echo '<span class="fa fa-stack">
                <i class="fa fa-star-o fa-stack-1x"></i>
              </span>';
              echo '<span class="fa fa-stack">
                <i class="fa fa-star-o fa-stack-1x"></i>
              </span>';
              echo '<span class="fa fa-stack">
                <i class="fa fa-star-o fa-stack-1x"></i>
              </span>';
          break;
      case 2:
              echo '<span class="fa fa-stack">
              <i class="fa fa-star fa-stack-1x"></i>
              <i class="fa fa-star-o fa-stack-1x"></i>
            </span>';
            echo '<span class="fa fa-stack">
              <i class="fa fa-star fa-stack-1x"></i>
              <i class="fa fa-star-o fa-stack-1x"></i>
            </span>';
            echo '<span class="fa fa-stack">
              <i class="fa fa-star-o fa-stack-1x"></i>
            </span>';
            echo '<span class="fa fa-stack">
              <i class="fa fa-star-o fa-stack-1x"></i>
            </span>';
            echo '<span class="fa fa-stack">
              <i class="fa fa-star-o fa-stack-1x"></i>
            </span>';
          break;
      case 3:
              echo '<span class="fa fa-stack">
              <i class="fa fa-star fa-stack-1x"></i>
              <i class="fa fa-star-o fa-stack-1x"></i>
            </span>';
            echo '<span class="fa fa-stack">
              <i class="fa fa-star fa-stack-1x"></i>
              <i class="fa fa-star-o fa-stack-1x"></i>
            </span>';
            echo '<span class="fa fa-stack">
              <i class="fa fa-star fa-stack-1x"></i>
              <i class="fa fa-star-o fa-stack-1x"></i>
            </span>';
            echo '<span class="fa fa-stack">
              <i class="fa fa-star-o fa-stack-1x"></i>
            </span>';
            echo '<span class="fa fa-stack">
              <i class="fa fa-star-o fa-stack-1x"></i>
            </span>';
          break;
      case 4:
            echo '<span class="fa fa-stack">
              <i class="fa fa-star fa-stack-1x"></i>
              <i class="fa fa-star-o fa-stack-1x"></i>
            </span>';
            echo '<span class="fa fa-stack">
              <i class="fa fa-star fa-stack-1x"></i>
              <i class="fa fa-star-o fa-stack-1x"></i>
            </span>';
            echo '<span class="fa fa-stack">
              <i class="fa fa-star fa-stack-1x"></i>
              <i class="fa fa-star-o fa-stack-1x"></i>
            </span>';
            echo '<span class="fa fa-stack">
              <i class="fa fa-star fa-stack-1x"></i>
              <i class="fa fa-star-o fa-stack-1x"></i>
            </span>';
            echo '<span class="fa fa-stack">
              <i class="fa fa-star-o fa-stack-1x"></i>
            </span>';
          break;
  case 5:
            echo '<span class="fa fa-stack">
              <i class="fa fa-star fa-stack-1x"></i>
              <i class="fa fa-star-o fa-stack-1x"></i>
            </span>';
            echo '<span class="fa fa-stack">
              <i class="fa fa-star fa-stack-1x"></i>
              <i class="fa fa-star-o fa-stack-1x"></i>
            </span>';
            echo '<span class="fa fa-stack">
              <i class="fa fa-star fa-stack-1x"></i>
              <i class="fa fa-star-o fa-stack-1x"></i>
            </span>';
            echo '<span class="fa fa-stack">
              <i class="fa fa-star fa-stack-1x"></i>
              <i class="fa fa-star-o fa-stack-1x"></i>
            </span>';
            echo '<span class="fa fa-stack">
              <i class="fa fa-star fa-stack-1x"></i>
              <i class="fa fa-star-o fa-stack-1x"></i>
            </span>';
      break;
  }

  }
  if (!empty($this->session->userdata('userFirstName'))) {
    $userFirstName = $this->session->userdata('userFirstName');
  }else {
    $userFirstName = '';
  }

  $totalvote=0;
  $votecount=0;
    foreach($GetCommentsWithUserWhId as $comment){
      $vote = $comment['commentVote'];
      $totalvote = $totalvote + $vote;
      $votecount++;

    }


    if($totalvote != 0){
      $totalvote = round(($totalvote / $votecount),0);
    }

?>

<title><?php echo $GetProduct[0]['Name'] . ' - ' . $title;  ?> </title>

<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
      <li><a href="<?php echo base_url() . 'Anasayfa' ?>" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a></li>
          <?php

            for($i=count($GetProductCategories)-1; $i >=0; $i--){
                $catname = $GetProductCategories[$i]['Name'];
                $catid = $GetProductCategories[$i]['Id'];
                echo '<li><a href="' . base_url() . 'Urunler/' . getTrCh($catname) . '/' . $catid . '" itemprop="url"><span itemprop="title">' . $catname . '</span></a></li>';
          ?>
        <?php } ?>
        <!-- <li><a href="<?php echo base_url() . 'Urun/' . getTrCh($GetProduct[0]['Name']) . '/' . $GetProduct[0]['Id']; ?>" itemprop="url"><span itemprop="title"><?php echo $GetProduct[0]['Name'];  ?></span></a></li> -->
      <?php //echo $GetProduct[0]['Categories']; ?>
    </ul>
      <!-- Breadcrumb End-->

      <div class="row">
      <!--Right Part Start -->

        <!--Right Part End -->
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <div itemscope="" itemtype="http://schema.org/Product">
            <div class="row product-info">
              <div class="col-sm-6 col-xs-12" style="z-index:1;">
                <!-- <div class="image"><div style="height:350px;width:350px;" class="zoomWrapper"><img class="img-responsive" itemprop="image" id="zoom_01" src="<?php echo base_url() . 'Uploads/Product/' .$GetProduct[0]['Image']; ?>" title="Laptop Silver blackaaaa" alt="Laptop Silver black" data-zoom-image="<?php echo base_url() . 'Uploads/Product/' .$GetProduct[0]['Image']; ?>" style="position: absolute;"></div> </div> -->
                <!-- <div class="sp-loading"><img src="<?php echo base_url() . 'assets/image/sp-loading.gif' ?>" alt=""><br>LOADING IMAGES</div>-->
                  <div class="sp-wrap">
                  <a href="<?php echo base_url() . 'Uploads/Product/' .$GetProduct[0]['Image']; ?>" ><img class="img-responsive" src="<?php echo base_url() . 'Uploads/Product/' .$GetProduct[0]['Image']; ?>" alt="aa"></a>
                    <?php

                      foreach($GetGallery as $gallery){ ?>
                        <a href="<?php echo base_url() . 'Uploads/Product/Gallery/' . $gallery['Image'] ?>"><img src="<?php echo base_url() . 'Uploads/Product/Gallery/' . $gallery['Image'] ?>" alt=""></a>

                    <?php } ?>
                  </div> <br>

                </div>
              <div class="col-sm-6 col-xs-12 ">
                <div class="panel panel-default">
                <div class="panel-heading col-xs-12 no-padding-left no-padding-right">
                  <div class="col-xs-8"><h3 class="title" itemprop="name"><?php echo $GetProduct[0]['Name']; ?></h3></div>
                  <!-- <div class="col-xs-4 text-right "><button type="button" class="wishlist" onclick=""><i class="fa fa-heart"></i></button></div>-->

                </div>
                <div class="panel-body">
                <div class="col-sm-3 col-xs-6 text-right"><b><h4>Marka:</h4></b></div>
                <div class="col-sm-9 col-xs-6"><b><h4><a href="<?php echo base_url() . 'Marka/' . getTrCh($GetProductBrand[0]['Name']) . '/' . $GetProductBrand[0]['Id'] ?>"><span itemprop="brand"><?php echo $GetProductBrand[0]['Name']; ?></span></a></h4></b></div>

                <div class="col-sm-3 col-xs-6 text-right"><b><h4>Kodu:</h4></b></div>
                <div class="col-sm-9 col-xs-6"><b><h4>#<?php echo $GetProduct[0]['Id']; ?></h4></b></div>

                <div class="col-sm-3 col-xs-6 text-right"><b><h4>Durumu:</h4></b></div>
                <div class="col-sm-9 col-xs-6"><b><h4><span class="instock">Stokta var</span></h4></b></div>


                <?php if($GetProduct[0]['OldPrice'] != 0){
                  $itemdisc = ((($GetProduct[0]['Price'] / $GetProduct[0]['OldPrice'])*100));
                  $itemdisc = 100 - $itemdisc;
                  $itemdisc = round($itemdisc,0);
                ?>
                  <div class="col-sm-3 col-xs-6 text-center"><b><h4><div class="col-xs-12 product-discont"> <div class="col-xs-12">% <?php echo $itemdisc ?></div> <div class="col-xs-12 no-margin">İndirim</div> </div></h4></b></div>
                    <div class="col-sm-3 col-xs-6 text-left">
                      <div class="col-xs-12 price-old">
                            <?php echo $GetProduct[0]['OldPrice'] . 'TL' ?>
                      </div>
                      <div class="col-xs-12 price">
                            <?php echo $GetProduct[0]['Price'] . 'TL' ?>
                      </div>
                    </div>


                <?php } ?>


                <?php if($GetProduct[0]['OldPrice'] == 0){ ?>
                  <div class="col-sm-3 col-xs-6 text-right"><b><h4>Fiyat:</h4></b></div>
                    <div class="col-sm-3 col-xs-6 text-left">
                      <div class="col-xs-12 price no-padding">
                            <?php echo $GetProduct[0]['Price'] . 'TL' ?>
                      </div>
                    </div>


                <?php } ?>


                <div class="col-sm-6 col-xs-12 text-right">
                      <div class="col-xs-12 text-center">
                        <div class="rating" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                          <meta itemprop="ratingValue" content="0">


                          <?php GetProductRate($totalvote); ?>



                            </div>


                            <div class="col-xs-12 ">
                              <a id="btnyorumdegerlendir" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;" href="#">
                                <span itemprop="reviewCount"><?php echo $votecount ?> Yorum / </span>
                              </a>
                              <a id="btndegerlendir"  onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;" href="#">Değerlendir</a>
                              </a>
                            </div>

                          </div>
                </div>

            <?php if(!empty($userFirstName)){ ?>
              <form class="" action="<?php echo base_url() . 'Basket/AddBasket' ?>" method="post">
                <input type="hidden" name="productid" value="<?php echo $GetProduct[0]['Id'] ?>">
                <div class="col-sm-12 col-xs-12 no-padding">
                  <hr class="hr-margin">
                  <div class="form-group">
                    <div class="col-sm-2 col-sm-offset-6 col-xs-2 col-xs-offset-5 no-padding text-center">
                        <input name="amount" value="1" type="text" class="form-control input-md text-center" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adet">
                    </div>
                    <div class="col-sm-4 col-xs-4 ">
                        <input type="submit"  class="btn btn-primary btn-lg" value="Sepete Ekle" name="add">
                    </div>
                  </div>
                </div>
              </form>
              <?php }else{?>
                <form>
                  <input type="hidden" name="productid" value="<?php echo $GetProduct[0]['Id'] ?>">
                  <div class="col-sm-12 col-xs-12 no-padding">
                    <hr class="hr-margin">
                    <div class="form-group">
                      <div class="col-sm-2 col-sm-offset-4 col-xs-2 col-xs-offset-5 no-padding text-center">
                          <input name="amount" value="1" type="text" class="form-control input-md text-center" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adet">
                      </div>
                      <div class="col-sm-6 col-xs-6 ">
                        <div class="no-margin-top">
                          <a href="<?php echo base_url() . 'Register' ?>" class="col-sm-12 btn btn-success btn-sm">
                            <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Sepete eklemek için giriş yap</a></div>
                        </div>
                    </div>
                  </div>
                </form>
              <?php } ?>




              </div>


              </div></div>


            </div>
            <ul class="nav nav-tabs review">
              <li class="active"><a href="#tab-description" data-toggle="tab">Açıklama</a></li>
              <li><a href="#tab-review" data-toggle="tab">Yorumlar (<?php echo $votecount;  ?>)</a></li>
            </ul>
            <div class="tab-content">
              <div itemprop="description" id="tab-description" class="tab-pane active">
                <div>
                  <?php echo $GetProduct[0]['Detail'];  ?>
                </div>
              </div>

              <div id="tab-review" class="tab-pane">

                  <div id="review">
                    <div>
                      <!-- mdate($datestring,strtotime($commenttime)) -->
                      <?php
                        foreach($GetCommentsWithUserWhId as $comment){
                          $usercomment = $comment['commentComment'];
                          $commenttime = $comment['commentVoteTime'];
                          $commentid = $comment['commentId'];

                          //$datestring = '%d.%m.%Y - %h:%i %a';
                          $userfirstlastname = $comment['userFirstName'] .  ' ' . $comment['userLastName']  ;
                          echo '<table class="table table-striped table-bordered">
                                  <tbody>
                                    <tr>';
                          echo        '<td style="width: 50%;"><strong><span>'. $userfirstlastname .'</span></strong></td>
                                       <td class="text-right"><span>'.mdate($datestring,strtotime($commenttime)).' - #' . $commentid . '</span></td>';
                          echo      '</tr>';
                          echo      '<tr>
                                       <td colspan="2"><p>' . $usercomment . '</p>
                                          <div class="rating">';
                                          switch ($comment['commentVote']) {
                                            case 0:
                                                    echo '<span class="fa fa-stack">
                                                      <i class="fa fa-star-o fa-stack-1x"></i>
                                                    </span>';
                                                    echo '<span class="fa fa-stack">
                                                      <i class="fa fa-star-o fa-stack-1x"></i>
                                                    </span>';
                                                    echo '<span class="fa fa-stack">
                                                      <i class="fa fa-star-o fa-stack-1x"></i>
                                                    </span>';
                                                    echo '<span class="fa fa-stack">
                                                      <i class="fa fa-star-o fa-stack-1x"></i>
                                                    </span>';
                                                    echo '<span class="fa fa-stack">
                                                      <i class="fa fa-star-o fa-stack-1x"></i>
                                                    </span>';
                                                break;
                                            case 1:
                                                    echo '<span class="fa fa-stack">
                                                      <i class="fa fa-star fa-stack-1x"></i>
                                                      <i class="fa fa-star-o fa-stack-1x"></i>
                                                    </span>';
                                                    echo '<span class="fa fa-stack">
                                                      <i class="fa fa-star-o fa-stack-1x"></i>
                                                    </span>';
                                                    echo '<span class="fa fa-stack">
                                                      <i class="fa fa-star-o fa-stack-1x"></i>
                                                    </span>';
                                                    echo '<span class="fa fa-stack">
                                                      <i class="fa fa-star-o fa-stack-1x"></i>
                                                    </span>';
                                                    echo '<span class="fa fa-stack">
                                                      <i class="fa fa-star-o fa-stack-1x"></i>
                                                    </span>';
                                                break;
                                            case 2:
                                                    echo '<span class="fa fa-stack">
                                                    <i class="fa fa-star fa-stack-1x"></i>
                                                    <i class="fa fa-star-o fa-stack-1x"></i>
                                                  </span>';
                                                  echo '<span class="fa fa-stack">
                                                    <i class="fa fa-star fa-stack-1x"></i>
                                                    <i class="fa fa-star-o fa-stack-1x"></i>
                                                  </span>';
                                                  echo '<span class="fa fa-stack">
                                                    <i class="fa fa-star-o fa-stack-1x"></i>
                                                  </span>';
                                                  echo '<span class="fa fa-stack">
                                                    <i class="fa fa-star-o fa-stack-1x"></i>
                                                  </span>';
                                                  echo '<span class="fa fa-stack">
                                                    <i class="fa fa-star-o fa-stack-1x"></i>
                                                  </span>';
                                                break;
                                            case 3:
                                                    echo '<span class="fa fa-stack">
                                                    <i class="fa fa-star fa-stack-1x"></i>
                                                    <i class="fa fa-star-o fa-stack-1x"></i>
                                                  </span>';
                                                  echo '<span class="fa fa-stack">
                                                    <i class="fa fa-star fa-stack-1x"></i>
                                                    <i class="fa fa-star-o fa-stack-1x"></i>
                                                  </span>';
                                                  echo '<span class="fa fa-stack">
                                                    <i class="fa fa-star fa-stack-1x"></i>
                                                    <i class="fa fa-star-o fa-stack-1x"></i>
                                                  </span>';
                                                  echo '<span class="fa fa-stack">
                                                    <i class="fa fa-star-o fa-stack-1x"></i>
                                                  </span>';
                                                  echo '<span class="fa fa-stack">
                                                    <i class="fa fa-star-o fa-stack-1x"></i>
                                                  </span>';
                                                break;
                                            case 4:
                                                  echo '<span class="fa fa-stack">
                                                    <i class="fa fa-star fa-stack-1x"></i>
                                                    <i class="fa fa-star-o fa-stack-1x"></i>
                                                  </span>';
                                                  echo '<span class="fa fa-stack">
                                                    <i class="fa fa-star fa-stack-1x"></i>
                                                    <i class="fa fa-star-o fa-stack-1x"></i>
                                                  </span>';
                                                  echo '<span class="fa fa-stack">
                                                    <i class="fa fa-star fa-stack-1x"></i>
                                                    <i class="fa fa-star-o fa-stack-1x"></i>
                                                  </span>';
                                                  echo '<span class="fa fa-stack">
                                                    <i class="fa fa-star fa-stack-1x"></i>
                                                    <i class="fa fa-star-o fa-stack-1x"></i>
                                                  </span>';
                                                  echo '<span class="fa fa-stack">
                                                    <i class="fa fa-star-o fa-stack-1x"></i>
                                                  </span>';
                                                break;
                                        case 5:
                                                  echo '<span class="fa fa-stack">
                                                    <i class="fa fa-star fa-stack-1x"></i>
                                                    <i class="fa fa-star-o fa-stack-1x"></i>
                                                  </span>';
                                                  echo '<span class="fa fa-stack">
                                                    <i class="fa fa-star fa-stack-1x"></i>
                                                    <i class="fa fa-star-o fa-stack-1x"></i>
                                                  </span>';
                                                  echo '<span class="fa fa-stack">
                                                    <i class="fa fa-star fa-stack-1x"></i>
                                                    <i class="fa fa-star-o fa-stack-1x"></i>
                                                  </span>';
                                                  echo '<span class="fa fa-stack">
                                                    <i class="fa fa-star fa-stack-1x"></i>
                                                    <i class="fa fa-star-o fa-stack-1x"></i>
                                                  </span>';
                                                  echo '<span class="fa fa-stack">
                                                    <i class="fa fa-star fa-stack-1x"></i>
                                                    <i class="fa fa-star-o fa-stack-1x"></i>
                                                  </span>';
                                            break;
                                        }
                          echo '</div>
                                       </td>
                                      </tr>
                                    </tbody>
                                  </table>';

                        }
                      ?>

                    </div>
                    <div class="text-right"></div>
                  </div>

                  <?php if (!empty($userFirstName)) { ?>

                <form class="form-horizontal" action=<?php echo base_url(). 'Product/AddComment'; ?> method="post">
                  <h2>Ürünü Değerlendir</h2>
                  <div class="form-group required">
                    <input type="hidden" name="productId" value="<?php echo $GetProduct[0]['Id']; ?>">
                    <input type="hidden" name="returnUrl" value="<?php echo base_url() . 'Urun/'. getTrCh($GetProduct[0]['Name']) . '/' . $GetProduct[0]['Id']; ?>">
                    <div class="col-sm-12">
                      <textarea class="form-control" id="input-review" rows="5" name="txtcomment" placeholder="Yorumunuz..."></textarea>
                    </div>
                  </div>
                  <div class="form-group required">
                    <div class="col-sm-12">
                      <?php echo form_error('Vote'); ?>
                      &nbsp;&nbsp;&nbsp; Çok Kötü&nbsp;
                      <input type="radio" value="1" name="rating">
                      &nbsp;
                      <input type="radio" value="2" name="rating">
                      &nbsp;
                      <input type="radio" value="3" name="rating">
                      &nbsp;
                      <input type="radio" value="4" name="rating">
                      &nbsp;
                      <input type="radio" value="5" name="rating">
                      &nbsp;Süper</div>
                  </div>
                  <div class="buttons">
                    <div class="pull-right">
                      <input type="submit" class="btn btn-primary btn-sm" value="Gönder" name="addcomment">
                    </div>
                  </div>

                <?php }else {
                  echo 'Ürünü değerlendirmek için giriş yapın...';
                } ?>

                </form>
              </div>
            </div>
            </div>
        </div>
        <!--Middle Part End -->

      </div>
    </div>
  </div>
