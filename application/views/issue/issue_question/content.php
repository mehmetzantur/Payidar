<title><?php echo 'Mesajlarım' . ' - ' .  $title ?> </title>

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
                            <div class="col-xs-8">
                                <span class="badge badge-warning"><i style="font-size: 15px;" class="fa fa-question fa-1" aria-hidden="true"></i> : Bekliyor</span>
                                <span class="badge badge-success"><i style="font-size: 15px;" class="fa fa-check fa-1" aria-hidden="true"></i> : Cevaplandı</span>
                                <span class="badge badge-danger"><i style="font-size: 15px;" class="fa fa-times fa-1" aria-hidden="true"></i> : Kapatıldı</span>
                            </div>
                            <div class="col-xs-4 text-right">
                                <span class="badge badge-success"><a href="<?php echo base_url() . 'YeniSoru' ?>"
                                                       class="" style="color:white; font-weight: bold;"><i class="fa fa-plus" aria-hidden="true"></i> Yeni Soru Sor</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="col-xs-1 text-center" scope="col"><i class="fa fa-info" aria-hidden="true"></i></th>
                                <th class="col-xs-10" scope="col">Başlık</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($GetUserQuestions as $question){ ?>

                            <tr>
                                <td class="col-xs-1 text-center">

                                    <?php if($question['issue_questionStatus'] == 0){ ?>
                                        <span style="margin-top: 7px; font-size: 15px !important;" class="badge badge-warning"><i style="" class="fa fa-question" aria-hidden="true"></i></span>
                                    <?php } ?>

                                    <?php if($question['issue_questionStatus'] == 1){ ?>
                                        <span style="margin-top: 7px; font-size: 15px !important;" class="badge badge-success"><i style="" class="fa fa-check" aria-hidden="true"></i></span>
                                    <?php } ?>

                                    <?php if($question['issue_questionStatus'] == 2){ ?>
                                        <span style="margin-top: 7px; font-size: 15px !important;" class="badge badge-danger"><i style="" class="fa fa-times" aria-hidden="true"></i></span>
                                    <?php } ?>

                                </td>
                                <td class="col-xs-10 text-left">
                                    <div class="col-xs-12 no-padding-left no-padding-right" style="font-size: 13px; font-weight: bold;">
                                        <a style="color:black;" href="<?php echo base_url() . 'Soru/' . getTrCh($question['issue_questionTitle']) . '/' . $question['issue_questionId'] ?>"><?php echo $question['issue_questionTitle'] ?></a>
                                    </div>
                                    <div class="col-xs-12 no-padding-left no-padding-right" style="font-size: 11px; color:dimgray;">
                                        <?php echo '#' . $question['issue_questionId'] ?> | <?php echo mdate($datestring,strtotime($question['issue_questionTime'])); ?>
                                    </div>
                                </td>
                            </tr>

                            <?php } ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
