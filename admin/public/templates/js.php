<!-- Vendor -->
<script src="<?php echo URL ?>public/assets/vendor/jquery/jquery.js"></script>
<script src="<?php echo URL ?>public/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="<?php echo URL ?>public/assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo URL ?>public/assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="<?php echo URL ?>public/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo URL ?>public/assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="<?php echo URL ?>public/assets/vendor/jquery-placeholder/jquery-placeholder.js"></script>

<!-- Specific Page Vendor -->
<script src="<?php echo URL ?>public/assets/vendor/jquery-validation/jquery.validate.js"></script>
<script src="<?php echo URL ?>public/assets/vendor/select2/js/select2.js"></script>

<!-- tag -->
<script src="<?php echo URL ?>public/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="<?php echo URL ?>public/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>	
<!-- tag -->

<script src="<?php echo URL ?>public/assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
<script src="<?php echo URL ?>public/assets/vendor/bootstrap-timepicker/bootstrap-timepicker.js"></script>

<script src="<?php echo URL ?>public/assets/vendor/summernote/summernote.js"></script>
<script src="<?php echo URL ?>public/assets/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>	
<script src="<?php echo URL ?>public/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>


<!-- Theme Base, Components and Settings -->
<script src="<?php echo URL ?>public/assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="<?php echo URL ?>public/assets/javascripts/theme.custom.js"></script>
<script src="<?php echo URL ?>public/assets/javascripts/valida.js"></script>

<!-- Theme Initialization Files -->
<script src="<?php echo URL ?>public/assets/javascripts/theme.init.js"></script>

<!-- exameple -->
<script src="<?php echo URL ?>public/assets/javascripts/ui-elements/gdm.modals.js"></script>
<script src="<?php echo URL ?>public/assets/javascripts/forms/gdm.validation.js"></script>

<script>
    // Preserve Scroll Position
    if (typeof localStorage !== 'undefined') {
        if (localStorage.getItem('sidebar-left-position') !== null) {
            var initialPosition = localStorage.getItem('sidebar-left-position'),
                    sidebarLeft = document.querySelector('#sidebar-left .nano-content');

            sidebarLeft.scrollTop = initialPosition;
        }
    }
</script>