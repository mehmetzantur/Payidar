<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php echo meta('description', $this->settingsmodel->GetSetting('Açıklama')[0]->Detail);
echo meta('keywords', $this->settingsmodel->GetSetting('Keywords')[0]->Detail); ?>

<!-- <title><?php echo $title; ?></title>

<?php $this->load->view("includes/site/include_style"); ?>

<?php
function getTrCh($data)
{
    return url_title(convert_accented_characters($data));
}

?>

<script src="<?php echo base_url("assets/js/jquery-3.2.1.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/toastr.min.js"); ?>"></script>


<script>
    $(document).ready(function () {




        $('.sp-wrap').smoothproducts();

        $("#btndegerlendir").click(function () {
            $('html,body').animate({
                    scrollTop: $(".review").offset().top
                },
                'slow');
        });

        $("#btnyorumdegerlendir").click(function () {
            $('html,body').animate({
                    scrollTop: $(".review").offset().top
                },
                'slow');
        });

    });

    toastr.options = {
        timeOut: 3000,
        positionClass: "toast-top-center text-center"
    };
</script>