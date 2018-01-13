<div id="header">
    <!-- Header Start-->
    <header class="header-row hidden-xs">
        <div class="container">
            <div class="table-container">
                <div class="row">
                    <div class="container no-padding">
                        <div class="col-lg-12 no-padding">
                            <div class="col-lg-2 text-center no-padding">
                                <div class="logo">
                                    <a href="<?php echo base_url() . 'Anasayfa'; ?>"><img src="<?php echo base_url(). 'Uploads/Settings/' . $logo; ?>" alt=""></a>
                                </div>
                            </div>

                            <form action="<?php echo base_url() . 'Ara' ?>" method="post">
                                <div class="col-lg-6 col-md-6 col-md-push-0 col-sm-6 col-xs-6 padding-full">
                                    <div id="search" class="input-group ">
                                        <input id="filter_name" type="text" name="search" value="" placeholder="Ne Aramak İstediniz?" class="form-control input-lg searchbox" />
                                        <button id="filter_button" type="submit" class="button-search"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>




                            <div class="col-sm-2 col-lg-2 ">
                                <div class=" btn-login">
                                    <?php if($userFirstName){
                                                //echo '<a href="' .  base_url() .'Register' . '" class="col-lg-12 btn btn-success"><i class="fa fa-user" aria-hidden="true"></i> '.$userFirstName.'</a>';
                                                ?>
                                                <div id="currency" class="btn-group">
                                                    <?php  echo '<a href="#" class="col-lg-12 btn btn-success dropdown-toggle" data-toggle="dropdown"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;&nbsp;'.$userFirstName.'</a>'; ?>
                                                    <ul class="dropdown-menu" style="display: none; z-index: 1900 !important;">
                                                        <li>
                                                            <a href="<?php echo base_url() . 'Profil' ?>" class="currency-select btn btn-link btn-block btn-user"><p class="btn-user"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Profilim</p></a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo base_url() . 'Mesajlarim' ?>" class="currency-select btn btn-link btn-block btn-user"><p class="btn-user"><i class="fa fa-comment" aria-hidden="true"></i>&nbsp;&nbsp;Mesajlarım</p></a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo base_url() . 'Siparislerim' ?>" class="currency-select btn btn-link btn-block btn-user"><p class="btn-user"><i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;&nbsp;Siparişlerim</p></a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo base_url() . 'Cikis' ?>" class="currency-select btn btn-link btn-block btn-user"><p class="btn-user"><i class="fa fa-power-off" aria-hidden="true"></i>&nbsp;&nbsp;Çıkış Yap</p></a>
                                                        </li>
                                                    </ul>
                                              </div>


                                                <?php
                                            }else{
                                                echo '<a href="' .  base_url() .'Register' . '" class="col-lg-12 btn btn-success"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Giriş Yap / Üye Ol</a>';
                                            }
                                    ?>
                                </div>
                            </div>

                            <div class="col-sm-2 col-lg-2 ">
                                <div class=" btn-login">
                                    <a href="<?php echo base_url() .'Basket' ?>" class="col-lg-12 btn btn-primary"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                      &nbsp;&nbsp;<span id="btn-basket">Sepet (<?php echo count($GetBasket) ?>) </span></a>
                                </div>
                            </div>


                    </div>
                </div>


            </div>
        </div>
    </header>
    <!-- Header End-->

    <?php $this->load->view("includes/site/menu"); ?>

    <!-- XS Header Start-->
    <header class="no-padding header-row visible-xs ">
        <div class="container no-padding">
            <div class="table-container">
                    <div class="col-table-cell col-lg-6 col-md-6 col-md-push-0 col-sm-2 col-sm-push-6 col-xs-12 padding-searchbox">
                        <form action="<?php echo base_url() . 'Ara' ?>" method="post">
                            <div id="search" class="input-group ">
                                <input id="filter_name" type="text" name="search" value="" placeholder="Ne Aramak İstediniz?" class="form-control input-lg searchbox" />
                                <button id="filter_button" type="submit" class="button-search">s<i class="fa fa-search"></i></button>
                            </div>
                        </form>


                    </div>

                    <!-- Sepet Gelecek-->

            </div>
        </div>
    </header>
    <!-- Header End-->




</div>
