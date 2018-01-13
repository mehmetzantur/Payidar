<title><?php echo $GetUserQuestion[0]['issue_questionTitle'] . ' - ' . $title;  ?> </title>

<div id="container">
    <div class="container">
        <!-- Breadcrumb Start-->
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url() . 'Anasayfa'; ?>"><i class="fa fa-home"></i></a></li>
            <li><a href="<?php echo base_url() . 'Mesajlarim' ?>">Mesajlarım</a></li>
        </ul>
        <!-- Breadcrumb End-->
        <div class="row">



            <div class="col-sm-12" id="content">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-10">
                                <b><?php echo $GetUserQuestion[0]['issue_questionTitle']; ?></b>
                            </div>
                            <div class="col-xs-2 text-right">
                                <?php if($GetUserQuestion[0]['issue_questionStatus'] == 0){ ?>
                                    <span class="badge badge-warning"><i style="font-size: 15px;" class="fa fa-question fa-1" aria-hidden="true"></i></span>
                                <?php } ?>

                                <?php if($GetUserQuestion[0]['issue_questionStatus'] == 1){ ?>
                                    <span class="badge badge-success"><i style="font-size: 15px;" class="fa fa-check fa-1" aria-hidden="true"></i></span>
                                <?php } ?>

                                <?php if($GetUserQuestion[0]['issue_questionStatus'] == 2){ ?>
                                    <span class="badge badge-danger"><i style="font-size: 15px;" class="fa fa-times fa-1" aria-hidden="true"></i></span>
                                <?php } ?>
                                <span class="badge badge-secondary"><?php echo '#' . $GetUserQuestion[0]['issue_questionId']; ?></span>

                            </div>
                        </div>
                    </div>
                    <div class="panel-body">

                        <?php foreach ($GetReply as $reply) { ?>

                            <div class="timeline-centered">
                                <article class="timeline-entry">
                                    <div class="timeline-entry-inner">
                                        <div class="timeline-icon bg-success">
                                            <img src="<?php echo base_url() . 'Uploads/User/' . $reply['userImage']; ?>"
                                                 alt="" class="img-responsive">
                                        </div>
                                        <div class="timeline-label">
                                            <h2>
                                                <b><?php echo $reply['userFirstName'] . ' ' . $reply['userLastName']; ?></b>
                                            </h2>
                                            <p style="color:black;">
                                                <?php echo $reply['issue_replyMessage'] ?>
                                            </p>
                                            <br>
                                            <h2 class="no-margin">
                                                <span style="font-size: 10px;"> <?php echo mdate($datestring, strtotime($reply['issue_questionTime'])); ?></span>
                                                <span class="pull-right" style="font-size: 10px; margin-top:5px;"><?php echo '#' . $reply['issue_replyId'] ?></span>
                                            </h2>
                                        </div>
                                    </div>
                                </article>
                            </div>

                        <?php } ?>

                    </div>
                </div>
            </div>

            <?php if ($GetUserQuestion[0]['issue_questionStatus'] != 2) { ?>
                <div class="col-sm-12" id="content">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12"><b>Cevap Yaz</b></div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo base_url() . 'Issue/AddNewReply'; ?>" method="post">
                                <fieldset id="account">
                                    <div class="form-group required">
                                        <label for="input-payment-firstname" class="control-label">Mesaj</label>
                                        <?php echo form_error('message'); ?>
                                        <textarea class="form-control" rows="5" name="message" placeholder="Mesajınız..."></textarea>
                                    </div>

                                    <div class="col-xs-6 no-padding">

                                        <div class="form-group required text-left" >
                                            <input type="submit" name="closeQuestion" class="btn btn-danger"
                                                   data-loading-text="Loading..."
                                                   id="button-coupon" value="Soruyu Kapat">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 no-padding">
                                        <div class="form-group required text-right" >
                                            <input type="hidden" name="questionid" value="<?php echo  $GetUserQuestion[0]['issue_questionId']; ?>">
                                            <input type="submit" name="reply" class="btn btn-primary"
                                                   data-loading-text="Loading..."
                                                   id="button-coupon" value="Gönder">
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            <?php }else{ ?>
                <div class="col-sm-8 col-sm-offset-4 text-center" id="content">
                    <div class="alert alert-danger" role="alert">
                        <b>Bu soru çözüme kavuştuğu için kullanıcı yada yönetici tarafından kapatılmıştır.</b>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
