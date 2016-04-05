<?php /* 404 Template */ ?>

<?php get_header(); ?>

<div id="primary-container">

	<div class="row">
		
		<div class="four columns centered">
			<h3><?php _e( '404 Error', 'bean' ); ?></h3>
			 <p> <?php echo get_theme_mod( 'error_text'); ?><br>&larr; <b><a href="javascript:javascript:history.go(-1)"><?php _e( 'Go Back', 'bean' ); ?></a></b><?php _e( ' or ', 'bean' ); ?><b><a href="<?php echo home_url(); ?>"><?php _e( 'Go Home', 'bean' ); ?></a></b> &rarr;</p>

    	</div><!-- END .eight columns centered -->
		
	</div><!-- END .row -->
	
</div><!-- END #primary-container -->

<?php get_footer(); ?>