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


        <div class="content no-padding-right no-padding-left">
            <div class="container-fluid">
                <div class="row">


                    <div class="col-lg-3 col-sm-6">
                        <a href="<?php echo base_url() . 'Panel/Issue' ?>">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <div class="icon-big icon-warning text-center">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <div class="numbers">
                                                <p><b>Mesajlar</b></p>
                                                <span class="badge badge-info"><?php echo 'Toplam: ' . $dashboard['Issue']['allCount'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer text-right">
                                        <hr>
                                        <div class="stats">
                                            <span class="badge badge-warning"><?php echo 'Bekleyen: ' . $dashboard['Issue']['warningCount'] ?></span>
                                            <span class="badge badge-success"><?php echo 'Açık: ' . $dashboard['Issue']['successCount'] ?></span>
                                            <span class="badge badge-danger"><?php echo 'Kapalı: ' . $dashboard['Issue']['dangerCount'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-lg-3 col-sm-6">
                        <a href="<?php echo base_url() . 'Panel/Slider' ?>">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <div class="icon-big icon-warning text-center">
                                                <i class="fa fa-picture-o"></i>
                                            </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <div class="numbers">
                                                <p><b>Slider</b></p>
                                                <span class="badge badge-info"><?php echo 'Toplam: ' . $dashboard['Slider']['allCount'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer text-right">
                                        <hr>
                                        <div class="stats">
                                            <span class="badge badge-success"><?php echo 'Aktif: ' . $dashboard['Slider']['activeCount'] ?></span>
                                            <span class="badge badge-danger"><?php echo 'Pasif: ' . $dashboard['Slider']['deactiveCount'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-lg-3 col-sm-6">
                        <a href="<?php echo base_url() . 'Panel/Product' ?>">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <div class="icon-big icon-warning text-center">
                                                <i class="fa fa-tags"></i>
                                            </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <div class="numbers">
                                                <p><b>Ürünler</b></p>
                                                <span class="badge badge-info"><?php echo 'Toplam: ' . $dashboard['Product']['allCount'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer text-right">
                                        <hr>
                                        <div class="stats">
                                            <span class="badge badge-info"><?php echo 'Toplam Adet: ' . $dashboard['Product']['amountSum'][0]['Amount']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-lg-3 col-sm-6">
                        <a href="<?php echo base_url() . 'Panel/Comment' ?>">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <div class="icon-big icon-warning text-center">
                                                <i class="fa fa-comment"></i>
                                            </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <div class="numbers">
                                                <p><b>Yorumlar</b></p>
                                                <span class="badge badge-info"><?php echo 'Toplam: ' . $dashboard['Comment']['allCount'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer text-right">
                                        <hr>
                                        <div class="stats">
                                            <span class="badge badge-warning"><?php echo 'Bekleyen: ' . $dashboard['Comment']['deactiveCount'] ?></span>
                                            <span class="badge badge-success"><?php echo 'Onaylanan: ' . $dashboard['Comment']['activeCount'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-lg-3 col-sm-6">
                        <a href="<?php echo base_url() . 'Panel/Order' ?>">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <div class="icon-big icon-warning text-center">
                                                <i class="fa fa-shopping-basket"></i>
                                            </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <div class="numbers">
                                                <p><b>Siparişler</b></p>
                                                <span class="badge badge-info"><?php echo 'Toplam: ' . $dashboard['Order']['allCount'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer text-right">
                                        <hr>
                                        <div class="stats">
                                            <span class="badge badge-warning"><?php echo 'Bekleyen: ' . $dashboard['Order']['warningCount'] ?></span>
                                            <span class="badge badge-success"><?php echo 'Giden: ' . $dashboard['Order']['successCount'] ?></span>
                                            <span class="badge badge-danger"><?php echo 'İptal: ' . $dashboard['Order']['dangerCount'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-lg-3 col-sm-6">
                        <a href="<?php echo base_url() . 'Panel/Category' ?>">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <div class="icon-big icon-warning text-center">
                                                <i class="fa fa-list"></i>
                                            </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <div class="numbers">
                                                <p><b>Kategoriler</b></p>
                                                <span class="badge badge-info"><?php echo 'Toplam: ' . $dashboard['Order']['allCount'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr>
                                        <div class="stats">
                                            <i class="fa fa-arrow-right" aria-hidden="true"></i> Kategorilere git
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-lg-3 col-sm-6">
                        <a href="<?php echo base_url() . 'Panel/Brand' ?>">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <div class="icon-big icon-warning text-center">
                                                <i class="fa fa-snowflake-o"></i>
                                            </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <div class="numbers">
                                                <p><b>Markalar</b></p>
                                                <span class="badge badge-info"><?php echo 'Toplam: ' . $dashboard['Brand']['allCount'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr>
                                        <div class="stats">
                                            <i class="fa fa-arrow-right" aria-hidden="true"></i> Markalara git
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-lg-3 col-sm-6">
                        <a href="<?php echo base_url() . 'Panel/User' ?>">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <div class="icon-big icon-warning text-center">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <div class="numbers">
                                                <p><b>Kullanıcılar</b></p>
                                                <span class="badge badge-info"><?php echo 'Toplam: ' . $dashboard['User']['allCount'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer text-right">
                                        <hr>
                                        <div class="stats">
                                            <span class="badge badge-secondary"><?php echo 'Kullanıcı: ' . $dashboard['User']['userCount'] ?></span>
                                            <span class="badge badge-dark"><?php echo 'Admin: ' . $dashboard['User']['adminCount'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-lg-3 col-sm-6">
                        <a href="<?php echo base_url() . 'Panel/Settings' ?>">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <div class="icon-big icon-warning text-center">
                                                <i class="fa fa-cogs"></i>
                                            </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <div class="numbers">
                                                <p><b>Ayarlar</b></p>
                                                <span class="badge badge-info"><?php echo 'Toplam: ' . $dashboard['Settings']['allCount'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr>
                                        <div class="stats">
                                            <i class="fa fa-arrow-right" aria-hidden="true"></i> Ayarlara git
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>



                </div>
            </div>
        </div>


        

    </div>
</div>
       
        <?php $this->load->view("includes/panel/include_script.php"); ?>

   
</body>

</html>
