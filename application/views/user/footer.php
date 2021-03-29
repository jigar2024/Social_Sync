<footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2018 <a href="<?php echo site_url('user/Dashboard/index');?>" target="_blank" class="text-bold-800 grey darken-2">Social Sync </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">Hand-crafted & Made with <i class="icon-heart5 pink"></i></span></p>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo base_url();?>assets/user/app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/user/app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/user/app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/user/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/user/app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/user/app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/user/app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/user/app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/user/app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?php echo base_url();?>assets/user/app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="<?php echo base_url();?>assets/user/app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/user/app-assets/js/core/app.js" type="text/javascript"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?php echo base_url();?>assets/user/app-assets/js/scripts/pages/dashboard-lite.js" type="text/javascript"></script>
	
	<script src="<?php echo base_url();?>assets/user/assets/js/multiple-select.js" type="text/javascript"></script>
	
	<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
				$("#add").click(function(){
					$("#addplus").clone().appendTo("#past");
				});
				
				$('#multi-select').multipleSelect({
						filter:true,
						placeholder:"Select Accounts"
				});
				$('#blah').css("opacity","0");
				$('#choose_pic').change(function(){
					
					$('#blah').css("opacity","1");
				});
				
		});
		
		function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
						.width(50)
                        .height(50);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	</script>
    <!-- END PAGE LEVEL JS-->
  </body>
</html>
