<?php
/**
 * Template Name: Home Page
 *
 * This is the template that displays the homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CT_Custom
 */

get_header('home');
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="breadcrumb">
				<p>Home / Who we are / Contact </p>
			</section>
			
			<section class="content">
			<?php
				while ( have_posts() ) :
					the_post();

					the_content();

				endwhile; // End of the loop.
			?>
			</section>

			<section class="connect">
				<div class="connect__contact">
					<h2>Contact Us</h2>
					<form>
						<div class="form-control">
                            <input type="text" id="fullname" name="fullname" placeholder="Name *">
						</div>
						<div class="form-control">
                            <input type="tel" id="phone" name="phone" placeholder="Phone *">
							<input type="email" id="email" name="email" placeholder="Email *">
						</div>
						<div class="form-control">
                            <textarea id="message" name="message" placeholder="Message *" cols="50" rows="5"  ></textarea>
						</div>
						<button type="submit">Submit</button>
					</form>
				</div>
				<div class="connect__socialmedia">
						<h2>Reach Us</h2>
						<p><strong>Coalition Skills Test</strong> <br/>

						<?php
							$address = get_option('address');
							if(empty($address)) {
								$address = '535 La Pata Street, 4200 Argentina';
							}

							$phone_number = get_option('phone_number');
							if(empty($phone_number)) {
								$phone_number = '385.154.11.28.35';
							}

							$fax = get_option('fax');
							if(empty($fax)) {
								$fax = '385.154.35.66.78';
							}

							$facebook = get_option('facebook');
							if(empty($facebook)) {
								$facebook = 'https://www.facebook.com/';
							}
							$twitter = get_option('twitter');
							if(empty($twitter)) {
								$twitter = 'https://twitter.com/';
							}
							$linkedin = get_option('linkedin');
							if(empty($linkedin)) {
								$linkedin = 'https://www.linkedin.com/feed/';
							}
							$pinterest = get_option('pinterest');
							if(empty($pinterest)) {
								$pinterest = 'https://www.pinterest.com/';
							}
						?>

						<?php echo $address; ?>
						</p>
						<p>Phone: <?php echo $phone_number; ?> <br/>
							Fax: <?php echo $fax; ?>
						</p>
						<ul>
							<li><a class="active" href="<?php echo $facebook; ?>"><i class="fa fa-facebook fa-sm" style="color: white;"></i></a></li>
							<li><a href="<?php echo $twitter; ?>"><i class="fa fa-twitter fa-sm" style="color: white;"></i></a></li>
							<li><a href="<?php echo $linkedin; ?>"><i class="fa fa-linkedin fa-sm" style="color: white;"></i></a></li>
							<li><a href="<?php echo $pinterest; ?>"><i class="fa fa-pinterest fa-sm" style="color: white;"></i></a></li>
						</ul>
				</div>
			<section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
