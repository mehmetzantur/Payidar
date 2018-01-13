<div id="container">

    <div class="col-sm-12 no-padding" id="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-8">
                        <div class="text-left">
                            <h6><b><?php echo $GetQuestion[0]['issue_questionTitle']; ?></b></h6>
                        </div>
                    </div>
                    <div class="col-xs-4" style="margin-top: 5px;">
                        <div class="text-right">
                            <?php if ($GetQuestion[0]['issue_questionStatus'] == 0) { ?>
                                <span class="badge badge-warning"><i style="font-size: 15px;"
                                                                     class="fa fa-question fa-1" aria-hidden="true"></i></span>
                            <?php } ?>

                            <?php if ($GetQuestion[0]['issue_questionStatus'] == 1) { ?>
                                <span class="badge badge-success"><i style="font-size: 15px;" class="fa fa-check fa-1"
                                                                     aria-hidden="true"></i></span>
                            <?php } ?>

                            <?php if ($GetQuestion[0]['issue_questionStatus'] == 2) { ?>
                                <span class="badge badge-danger"><i style="font-size: 15px;" class="fa fa-times fa-1"
                                                                    aria-hidden="true"></i></span>
                            <?php } ?>
                            <span class="badge badge-secondary"><?php echo '#' . $GetQuestion[0]['issue_questionId']; ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-hover">
                <tbody>
                <?php foreach ($GetReply as $reply) { ?>

                    <div class="" style="margin: 15px 15px 15px 15px;">
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
                                            <span class="pull-right"
                                                  style="font-size: 10px; margin-top:5px;"><?php echo '#' . $reply['issue_replyId'] ?></span>
                                        </h2>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>

                <?php } ?>

                </tbody>
            </table>
        </div>
    </div>

    <?php if ($GetQuestion[0]['issue_questionStatus'] != 2) { ?>
        <div class="col-sm-12 no-padding" id="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="text-left">
                                <h6><b>Cevap Yaz</b></h6>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table table-hover">
                    <tbody>
                    <div class="col-xs-12">
                        <form action="<?php echo base_url() . 'Panel/Issue/AddNewReply'; ?>" method="post">
                            <fieldset id="account">
                                <div class="form-group required">
                                    <?php echo form_error('message'); ?>
                                    <textarea class="form-control" rows="5" name="message"
                                              placeholder="Mesajınız..."></textarea>
                                </div>

                                <div class="col-xs-6 no-padding">

                                    <div class="form-group required text-left">
                                        <input type="submit" name="closeQuestion" class="btn btn-danger"
                                               data-loading-text="Loading..."
                                               id="button-coupon" value="Soruyu Kapat">
                                    </div>
                                </div>

                                <div class="col-xs-6 no-padding">
                                    <div class="form-group required text-right">
                                        <input type="hidden" name="questionid"
                                               value="<?php echo $GetQuestion[0]['issue_questionId']; ?>">
                                        <input type="submit" name="reply" class="btn btn-primary"
                                               data-loading-text="Loading..."
                                               id="button-coupon" value="Gönder">
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } else { ?>
        <div class="col-sm-12 no-padding text-center" id="content">
            <div class="alert alert-danger" role="alert">
                <b>Bu soru çözüme kavuştuğu için kullanıcı yada yönetici tarafından kapatılmıştır.</b>
            </div>
        </div>
    <?php } ?>


</div>

