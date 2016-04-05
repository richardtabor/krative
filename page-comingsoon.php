<?php /* Template Name: Coming Soon */ ?>

<?php get_header(); ?>

<?php 
// VARIABLES FROM THEME CUSTOMIZER
$years = get_theme_mod('comingsoon_year');
$months = get_theme_mod('comingsoon_month');
$days = get_theme_mod('comingsoon_day');
?>

<div id="primary-container">  

	<div class="row">
	
		<div class="twelve columns">	
		
			<div class="entry-content">
			
				<h1><?php wp_title(''); ?></h1>
			
				<?php while ( have_posts() ) : the_post(); the_content(); endwhile; // THE LOOP ?>
				
				<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'bean' ) . '</span>', 'after' => '</div>' ) ); ?>
				
			</div><!-- END .entry-content -->
		
		</div><!-- END twelve columns -->
			
		<div class="bean-coming-soon" data-years="<?php echo $years ?>" data-months="<?php echo $months ?>" data-days="<?php echo $days ?>" data-hours="00" data-minutes="00" data-seconds="00">

			<div class="three columns mobile-two animated BeanBounceFromBottom days">
				<div class="count-inner">
					<div class="animated BeanFadeIn">
						<div class="count"></div>
						<h6><div class="text">DAYS</div></h6>
					</div><!-- END .animated BeanFadeIn -->
				</div><!-- END .count-inner -->	
			</div><!-- END .days -->

			<div class="three columns mobile-two animated BeanBounceFromBottom hours">
				<div class="count-inner">
					<div class="animated BeanFadeIn">
						<div class="count"></div>
						<h6><div class="text">HOURS</div></h6>
					</div><!-- END .animated BeanFadeIn -->		
				</div><!-- END .count-inner -->		
			</div><!-- END .hours -->	

			<div class="three columns mobile-two animated BeanBounceFromBottom minutes">
				<div class="count-inner">
					<div class="animated BeanFadeIn">
						<div class="count"></div>
						<h6><div class="text">MINUTES</div></h6>
					</div><!-- END .animated BeanFadeIn -->
				</div><!-- END .count-inner -->		
			</div><!-- END .minutes -->
				
			<div class="three columns mobile-two animated BeanBounceFromBottom seconds">
				<div class="count-inner">
					<div class="animated BeanFadeIn">
						<div class="count"></div>
						<h6><div class="text">SECONDS</div></h6>
					</div><!-- END .animated BeanFadeIn -->
				</div><!-- END .count-inner -->		
			</div><!-- END .seconds -->	
			
		</div><!-- END bean-coming-soon -->

	</div><!-- END .row -->	
	
</div><!-- END #primary-container -->	

<?php get_footer(); ?>