<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MWBC
 */

?>

</div><!-- #content -->

<footer id="footer">
	<h1 class="outline">Footer</h1>
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-4 col-md-3">
				<div>
					<img src="<?php echo get_template_directory_uri(); ?>/images/MWBC_logo.svg" alt="logo"
						class="img-fluid w-100">
				</div>
			</div>
			<div class="col-8">
				<div class="footer-menu-wrap">
					<div id="footer-menu-1">
						<ul class="navbar-nav flex-wrap flex-row justify-content-end" role="menu">
							<?php 
							$footer_nav = wp_get_nav_menu_items(4); 
							foreach ($footer_nav as $key => $item) {
							?>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a>
							</li>
							<?php
							}
							?>
						</ul>
					</div>
					<div id="footer-menu-2">
						<ul class="navbar-nav flex-wrap flex-row justify-content-end" role="menu">
							<?php 
							$footer_nav = wp_get_nav_menu_items(5); 
							foreach ($footer_nav as $key => $item) {
							?>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a>
							</li>
							<?php
							}
							?>
						</ul>
					</div>
				</div>

				<div class="row m-0">
					<div class="col-md-4">
						<div class="locations">
							<h6 class="text-l-blue font-weight-bold">Montgomery County</h6>
							<a href="https://goo.gl/maps/o4BEpuPtHYVz28aa7" target="_blank" class="text-white">
								<address class="mb-2">
									51 Monroe Street, PE-20 <br>
									Rockville, MD&nbsp;20850
								</address>
							</a>
							<a href="tel:(301) 315-8091" class="text-white">
								<p>(301) 315-8091</p>
							</a>
						</div>
					</div>
					<div class="col-md-4">
						<div class="locations">
							<h6 class="text-l-blue font-weight-bold">Prince George’s County</h6>
							<p class="m-0 mt-2">Bowie Business Innovation Center&nbsp;(BIC)</p>
							<a href="https://goo.gl/maps/Xhm3rVgxzFt1489c8" target="_blank" class="text-white">
								<address class="mb-2 mt-1">
									Bowie State University<br>
									14001 Jericho Park Road A119
									Bowie, MD 20715
								</address>
							</a>
							<a href="tel:301-315-8091" class="text-white">
								<p>(301) 315-8091</p>
							</a>
						</div>
					</div>
					<div class="col-md-4">
						<div class="locations">
							<h6 class="text-l-blue font-weight-bold">Frederick County</h6>
							<p class="mb-2">Office Of Economic Development</p>
							<a href="https://goo.gl/maps/TUeba6KZCFXjQAKb6" target="_blank" class="text-white">
								<address class="mb-2">
									118 North Market Street,<br>Third&nbsp;Floor
									Frederick, MD&nbsp;21701
								</address>
							</a>
							<a href="tel:301-315-8091" class="text-white">
								<p>(301) 315-8091</p>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="container">
		<div id="copyright" class="row">
			<div class="col-6">
				<p class="m-0">© <?php echo date("Y"); ?> Maryland Women’s Business Center. All Rights Reserved</p>
			</div>
			<div class="col-6">
				<div class="social-menu text-right">
					<a target="_blank" href="https://www.facebook.com/Marylandwbc/">
						<img src="<?php echo get_template_directory_uri(); ?>/images/icons/facebook.svg" alt="Facebook">
					</a>
					<a target="_blank" href="https://www.linkedin.com/company/4848444">
						<img src="<?php echo get_template_directory_uri(); ?>/images/icons/linkedin.svg" alt="Linkedin">
					</a>
					<a target="_blank" href="https://twitter.com/marylandwbc">
						<img src="<?php echo get_template_directory_uri(); ?>/images/icons/twitter.svg" alt="Twitter">
					</a>
					<a target="_blank" href="https://www.instagram.com/maryland.wbc/">
						<img src="<?php echo get_template_directory_uri(); ?>/images/icons/instagram.svg"
							alt="Instagram">
					</a>
					<a target="_blank" href="https://www.youtube.com/channel/UClpl_Jc75mf_jfXloXuEjSw">
						<img src="<?php echo get_template_directory_uri(); ?>/images/icons/youtube.svg" alt="Youtube">
					</a>
				</div>
			</div>
		</div>
	</div>
</footer>
</div><!-- #page -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<?php wp_footer(); ?>
</body>

</html>