<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <!-- <a class="navbar-brand" href="#">Template</a> -->
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a class="nav-link" href=<?php echo base_url(). 'Panel/Home/Logout' ?> ><i class="fa fa-fw fa-sign-out"></i> <?php echo $this->session->userdata('adminFirstName') ?> (Çıkış Yap)</a>
                        </li>
                        
                    </ul>

                </div>
            </div>
        </nav>

<input id="waitingMsgCountHidden" type="hidden" value="<?php echo $waitingMsgCount ?>">
<input id="waitingCommentCountHidden" type="hidden" value="<?php echo $waitingCommentCount ?>">