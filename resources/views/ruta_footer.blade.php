<footer class="footer" style="left:0px;">
	<!-- To the right -->
	<div  class="pull-right hidden-xs"><a href="http://www.easynet.com.co" target="_blank">www.easynet.com.co</a></div>
	<!-- Default to the left -->
	<strong>Copyright &copy; <?php echo date('Y'); ?> <a href="http://www.easynet.com.co" target="_blank">EasyNet.</a></strong> {{ __('All rights reserved.') }}
</footer>

<script>
jQuery(document).ready(function($){
    // ocultar manualmente la barra de menu lateral
    $(".button-menu-mobile").trigger('click');
});
</script>
