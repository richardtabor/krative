<?php /* Template Name: Contact */ ?>

<?php if(isset($_POST['submitted'])) {
		if(trim($_POST['contactName']) === '') {
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}
		
		if(trim($_POST['mailSubject']) === '') {
			$hasError = true;
		} else {
			$sub = trim($_POST['mailSubject']);
		}
		
		if(trim($_POST['email']) === '')  {
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
			
		if(trim($_POST['comments']) === '') {
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}
			
		if(!isset($hasError)) {
		 	
		 	$site_name = get_bloginfo('name');
			$contactEmail = get_theme_mod( 'admin_custom_email');
			
			if (!isset($contactEmail) || ($contactEmail == '') ){
				$contactEmail = get_option('admin_email');
			}
			
			$subject = '['.$site_name.' Contact Form] '.$sub;
			$body = "Name: $name \n\nEmail: $email \n\nSubject: $sub \n\nMessage: $comments";
			$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			wp_mail($contactEmail, $subject, $body, $headers);
			$emailSent = true;
		}
	
} ?>

<?php get_header(); ?>

<?php bean_sidebar_loader(); ?>

<?php //CUSTOMIZER VARIABLES
$maps_embed = get_theme_mod('google_maps');
$contact_hero_img = get_theme_mod('contact_hero');
?>
	
<?php if( $maps_embed != '' OR $contact_hero_img != '' ) {	?>

	<div id="map-container" class="animated BeanFadeIn">

		<?php //IF IFRAME VIA CUSTOMIZER
		if( $maps_embed != '' && $contact_hero_img == '' ) { echo $maps_embed; } ?>
	
	</div><!-- END #map-container -->
	
<?php } //END IF MAPS OR CONTACT IMAGE VIA CUSTOMIZER ?>

<div id="primary-container">  

	<div class="row">
	
		<div class="<?php echo $bean_content_class; ?> mobile-four">	
		
			<div class="entry-content">
					
				<?php //IF PAGE TITLE OPTION IN META IS CHECKED
				$page_title = get_post_meta($post->ID, '_bean_page_title', true); 
				if ( $page_title == true ) { ?><h3><?php wp_title(''); ?>.</h3>
				<?php }?>
			
				<?php while ( have_posts() ) : the_post(); the_content(); endwhile; // THE LOOP ?>
			
				<?php if( get_theme_mod( 'bean_contact_form' ) == true ) { //IF CONTACT FORM IS TRUE VIA CUSTOMIZER ?>		
				
					<script type="text/javascript">
						jQuery(document).ready(function(){ jQuery("#BeanForm").validate({ errors: { contactName: '', email: { required: '', email: '' }, comments: '' } }); });
					</script>
					
					<?php if(isset($emailSent) && $emailSent == true ) { ?>
						
						<div class="bean-alert success">
						
							<?php _e('Awesome! Your message has been sent!', 'bean') ?>
							
						</div><!-- END .alert alert-success -->
				
					<?php } // END SUCCESS ALERT ?>
			
					<?php if(isset($hasError) || isset($captchaError)) { ?>
					
						<div class="bean-alert fail">
						
							<?php _e('Well now... an error occured. Please try again.', 'bean') ?>
						
						</div><!-- END .alert alert-success -->
						
					<?php } // END FAIL ALERT ?>
					
					<?php //IF HIDE REQUIRED IS NOT SELECTED VIA CUSTOMIZER
					if( get_theme_mod( 'hide_required' ) == false ) { $required = '<span class="required">*</span>'; 
					} ?>
					
					<form action="<?php the_permalink(); ?>" id="BeanForm" method="post">
						
						<ul class="bean-contactform">
							
							<li class="six name">
								<label for="contactName"><?php _e('Name:', 'bean'); echo $required ?></label>
								<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required requiredField" />
							</li>
							
							<li class="six email">
								<label for="email"><?php _e('Email:', 'bean'); echo $required ?></label>
								<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email" />
							</li>
							
							<li class="twelve">
								<label for="mailSubject"><?php _e('Subject:', 'bean'); echo $required ?></label>
								<input type="text" name="mailSubject" id="mailSubject" value="<?php if(isset($_POST['mailSubject'])) echo $_POST['mailSubject'];?>" class="required requiredField" />
							</li>
				
							<li class="textarea"><label for="commentsText"><?php _e('Message:', 'bean'); echo $required ?></label>
								<textarea name="comments" id="commentsText" rows="20" cols="30" class="required requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
								
							</li>
							
							<li class="submit">
								<input type="hidden" name="submitted" id="submitted" value="true" />
								<button type="submit" class="button animated BeanButtonShake"><?php echo get_theme_mod( 'contact_button_text', 'Send Message', 'bean' ); ?></button>
							</li>
					
						</ul>
	
					</form><!-- END #BeanForm -->
				
				<?php } //END IF CONTACT FORM IS SELECTED VIA CUSTOMIZER ?>	
				
			</div><!-- END .entry-content -->
		
		</div><!-- END $bean_content_class -->
		
		<?php if( $bean_sidebar_location === 'left' || $bean_sidebar_location === 'right' ) { ?>
		
			<div class="<?php echo $bean_sidebar_class; ?> hide-for-small">
				
				<aside class="sidebar " role="complementary">
					
					<?php get_sidebar(); ?>
				
				</aside><!-- END .sidebar -->
			
			</div><!-- END .four columns hide-for-small -->
			
		<?php } // END SIDEBAR LEFT OR RIGHT ?>
		
	</div><!-- END .row -->

	<?php get_template_part( 'content', 'global-widgets' ); //PULL GLOBAL WIDGET AREA CONTENT ?>	
	
</div><!-- END #primary-container -->	

<?php get_footer(); ?>
