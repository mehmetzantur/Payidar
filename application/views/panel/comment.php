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


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="panel panel-default">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-12">
									<div class="text-left">
										<h6>Yorumlar </h6>
									</div>
								</div>
							</div>
						</div>

							<table class="table">
							   <thead>
							   <tr>
								  <th>#</th>
								  <th>Ürün</th>
									<th>Kullanıcı</th>
									<th>Yorum</th>
                  <th>Tarih Saat</th>
									<th>Durum</th>
									<th class="text-right"></th>
								</tr>
								</thead>
									<tbody>
									<?php
										 foreach($GetCommentAll as $comment){
										  	if($comment['commentIsActive'] == 1){
                          echo '<tr><th scope="row">'.$comment['commentId'].'</td>';
    											echo '<td>'.$comment['productName'].'</td>';
    											echo '<td>'.$comment['userFirstName'].'</td>';
    											echo '<td>'.$comment['commentComment'].'</td>';
    											echo '<td>'.mdate($datestring,strtotime($comment['commentVoteTime'])).'</td>';
                          echo '<td><span class="badge badge-success">Onaylandı</span></td>';
                          echo '<td class="text-right"><a href="Comment/DeActiveComment/'.$comment['commentId'].'" class="btn btn-warning btn-xs">Kaldır</a>
                                <a href="Comment/DeleteComment/'.$comment['commentId'].'" class="btn btn-danger btn-xs">Sil</a></td></tr>';
                        }else {
                          echo '<tr class=""><th scope="row">'.$comment['commentId'].'</td>';
    											echo '<td>'.$comment['productName'].'</td>';
    											echo '<td>'.$comment['userFirstName'].'</td>';
    											echo '<td>'.$comment['commentComment'].'</td>';
                          echo '<td>'.mdate($datestring,strtotime($comment['commentVoteTime'])).'</td>';
    											echo '<td><span class="badge badge-warning">Bekliyor</span></td>';
    											echo '<td class="text-right"><a href="Comment/ActiveComment/'.$comment['commentId'].'" class="btn btn-success btn-xs">Onayla</a>
    													  <a href="Comment/DeleteComment/'.$comment['commentId'].'" class="btn btn-danger btn-xs">Sil</a></td></tr>';
                        }
									 }
									?>
									 </tbody>
							</table>
					</div>
                </div>
            </div>
        </div>




    </div>
</div>

        <?php $this->load->view("includes/panel/include_script.php"); ?>


</body>

</html>
