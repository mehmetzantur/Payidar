
<div class="sidebar" data-background-color="black" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper ">
            <div class="logo">
                <a href="<?php echo base_url().'Panel/Home' ?>" class="simple-text">
                    <span class="label label-warning">Motocar</span> <br> <h6>Yönetim Paneli</h6>
                </a>
            </div>

            <ul class="nav">

                <li <?php if($this->uri->segment(2)=="Home" or $this->uri->segment(2)=="home" or $this->uri->segment(2)==""){echo 'class="active"';}?> >
                    <a href="<?php echo base_url().'Panel/Home' ?>">
                        <i class="ti-pie-chart"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li <?php if($this->uri->segment(2)=="Issue" or $this->uri->segment(2)=="Issue"){echo 'class="active"';}?>>
                    <a href="<?php echo base_url().'Panel/Issue' ?>">
                        <i class="fa fa-envelope"></i>
                        <p id="waitingMsgCountSidebar">Mesajlar</p>
                    </a>
                </li>

                <li <?php if($this->uri->segment(2)=="Slider" or $this->uri->segment(2)=="slider"){echo 'class="active"';}?>>
                            <a href="<?php echo base_url().'Panel/Slider' ?>">
                                <i class="fa fa-picture-o"></i>
                                <p>Slider</p>
                            </a>
                </li>

                <li <?php if($this->uri->segment(2)=="Product" or $this->uri->segment(2)=="product"){echo 'class="active"';}?>>
                            <a href="<?php echo base_url().'Panel/Product' ?>">
                                <i class="fa fa-tags"></i>
                                <p>Ürünler</p>
                            </a>
                </li>

                <li <?php if($this->uri->segment(2)=="Comment" or $this->uri->segment(2)=="comment"){echo 'class="active"';}?>>
                            <a href="<?php echo base_url().'Panel/Comment' ?>">
                                <i class="fa fa-comment"></i>
                                <p id="waitingCommentCountSidebar">Yorumlar</p>
                            </a>
                </li>

				<li <?php if($this->uri->segment(2)=="Order" or $this->uri->segment(2)=="order"){echo 'class="active"';}?>>
                    <a href="<?php echo base_url().'Panel/Order' ?>">
                        <i class="fa fa-shopping-basket"></i>
                        <p>Siparişler</p>
                    </a>
                </li>

                <li <?php if($this->uri->segment(2)=="Category" or $this->uri->segment(2)=="category"){echo 'class="active"';}?>>
                    <a href="<?php echo base_url().'Panel/Category' ?>">
                        <i class="fa fa-list"></i>
                        <p>Kategoriler</p>
                    </a>
                </li>

                <li <?php if($this->uri->segment(2)=="Brand" or $this->uri->segment(2)=="brand"){echo 'class="active"';}?>>
                    <a href="<?php echo base_url().'Panel/Brand' ?>">
                        <i class="fa fa-snowflake-o"></i>
                        <p>Markalar</p>
                    </a>
                </li>

                <li <?php if($this->uri->segment(2)=="User" or $this->uri->segment(2)=="user"){echo 'class="active"';}?>>
                    <a href="<?php echo base_url().'Panel/User' ?>">
                        <i class="fa fa-user"></i>
                        <p>Kullanıcılar</p>
                    </a>
                </li>

                <li <?php if($this->uri->segment(2)=="Settings" or $this->uri->segment(2)=="settings"){echo 'class="active"';}?>>
                    <a href="<?php echo base_url().'Panel/Settings' ?>">
                        <i class="fa fa-cogs"></i>
                        <p>Ayarlar</p>
                    </a>
                </li>


            </ul>
    	</div>
    </div>
