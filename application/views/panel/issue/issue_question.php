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
                    <?php $this->load->view("panel/issue/issue_question/content"); ?>
                </div>
            </div>
        </div>




    </div>
</div>

<?php $this->load->view("includes/panel/include_script.php"); ?>


</body>

</html>
