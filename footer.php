<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Clicane
 */

?>

	<footer id="colophon" class="siteFooter">
		<div class="siteFooter__wrap container">
			<div class="siteFooter__column">
				<a href="mailto:info@clicane.com" class="siteFooter__position">
					<img src="<?php echo get_template_directory_uri() . '/images/icons/mail_ico.svg'; ?>"/>
					<span>info@clicane.com</span>
				</a>
				<a href="tel:+48795757009" class="siteFooter__position">
					<img src="<?php echo get_template_directory_uri() . '/images/icons/phone_ico.svg'; ?>"/>
					<span>+48 795 757 009</span>
				</a>
			</div>
			<div class="siteFooter__column">
				<h3>odwiedź nas</h3>
				<div class="social">
					<a href="#" target="_blank">
						<img src="<?php echo get_template_directory_uri() . '/images/icons/ig_ico.svg'; ?>"/>
					</a>
					<a href="#" target="_blank">
						<img src="<?php echo get_template_directory_uri() . '/images/icons/in_ico.svg'; ?>"/>
					</a>
				</div>
			</div>
			<div class="siteFooter__column">
				<a href="https://goo.gl/maps/jDxhNc4kN7eHXMbp9" target="_blank" class="siteFooter__position">
					<img src="<?php echo get_template_directory_uri() . '/images/icons/marker_ico.svg'; ?>"/>
					<span>Konstruktorska 12a<br/>
					02-673 Warszawa<br/>
					Polska</span>
				</a>
			</div>
		</div>
		<div class="siteFooter__copy">
			<p>© clicane <?php echo get_the_date('Y'); ?></p>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
