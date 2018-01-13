<nav id="menu" class="navbar">
    <div class="container">
        <div class="navbar-header"> 
            <span class="visible-xs visible-sm logo-xs">
                    <div class="col-xs-2 text-left"><i class="fa fa-bars" aria-hidden="true"></i></div>
                    <div class="col-xs-8 logo-img-xs">
                        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(). 'Uploads/Settings/' . $logo_xs; ?>" alt=""></a>
                    </div>
                    <div class="col-xs-2 text-right"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
            </span>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="hidden-xs"><a class="home_link " title="Home" href="<?php echo base_url() . 'Anasayfa' ?>"><span>Anasayfa</span></a></li>
                    <li class="dropdown text-right visible-xs"><a href=<?php echo base_url() . 'Basket' ?>>Sepet</a>
                    <li class="dropdown"><a>Tüm Kategoriler</a>
                        <div class="dropdown-menu">
                            <ul>
                                
                            <?php

                                if ($allcategory) {
                                    foreach ($allcategory as $menu) {
                                        $title = url_title(convert_accented_characters($menu->Name));
                                        if(!empty($menu->sub)){
                                            echo "<li><a href='".base_url()."Urunler/" . $title . '/' .$menu->Id."'><b>".$menu->Name."</b><span>&rsaquo;</span></a>";
                                        }else{
                                            echo "<li><a href='".base_url()."Urunler/" . $title . '/' .$menu->Id."'><b>".$menu->Name."</b></a>";
                                        }
                                            if (!empty($menu->sub)) {
                                                echo "<div class='dropdown-menu'>";
                                                    echo "<ul>";
                                                        fetch_sub_menu($menu->sub);
                                                echo "</ul>";
                                            }
                                            echo "</li>";
                                        }
                                }
                                function fetch_sub_menu($sub_menu)
                                {
                                    foreach ($sub_menu as $menu) {
                                        $title = url_title(convert_accented_characters($menu->Name));
                                        echo "<li>";
                                        if (!empty($menu->sub)) {
                                            echo "<a href='".base_url()."Urunler/" . $title . '/' .$menu->Id."'>".$menu->Name."<span>&rsaquo;</span></a>";
                                        }else{
                                            echo "<a href='".base_url()."Urunler/" . $title . '/' .$menu->Id."'>".$menu->Name."</a>";
                                        }

                                        if (!empty($menu->sub)) {
                                            echo "<div class='dropdown-menu'>";
                                                echo "<ul>";
                                                    fetch_sub_menu($menu->sub);
                                            echo "</ul>";
                                        }
                                        echo "</li>";
                                    }
                                }
                            ?>
                            </ul>
                        </div>
                    </li>

                    

                    <li class="menu_brands dropdown"><a href="#">Markalar</a>
                            <div class="dropdown-menu">
                                <?php
                                    foreach ($allbrand as $bra){
                                        $title = url_title(convert_accented_characters($bra['Name']));
                                        echo '<div class="col-lg-1 col-md-2 col-sm-3 col-xs-6">';
                                            echo '<a href='.base_url()."Marka/". $title . '/' .$bra['Id'].'><img class="menubrandlogo" src='.base_url()."Uploads/Brand/".$bra['Image'].' title="'.$bra['Name'].'" alt="'.$bra['Name'].'" /></a>';
                                            echo '<h5><b><a href='.base_url()."Marka/". $title . '/' .$bra['Id'].'>'.$bra['Name'].'</a></b></h5>';
                                        echo '</div>';
                                    }
                                ?>
                            </div>
                    </li>

                    <li class="custom-link-left"><a href="<?php echo base_url() . 'Urunler/SuperFirsatlar'; ?>">Süper Fırsatlar</a></li>
                    <li class="custom-link-left"><a href="<?php echo base_url() . 'Urunler/EnYeniler'; ?>">En Yeniler</a></li>
                    <li class="custom-link-left"><a href="<?php echo base_url() . 'Urunler/CokSatanlar'; ?>">Çok Satanlar</a></li>

                    <li class="custom-link-right"><a href="<?php echo base_url() . 'Iletisim' ?>" target="_blank">İletişim</a></li>

                <?php foreach ($customPages as $page) { ?>
                    <li class="custom-link-right"><a href="<?php echo base_url() . 'Sayfa/' . getTrCh($page['Name']) . '/' . $page['Id']; ?>"><?php echo $page['Name'] ?></a></li>
                <?php } ?>


            </ul>
        </div>
</div>
</nav>