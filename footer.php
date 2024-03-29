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
			<div class="siteFooter__column siteFooter__column--mobile">
				<h3><?php pll_e('odwiedź nas'); ?></h3>
				<div class="social">
					<a href="https://instagram.com/clicane_presentation_design" target="_blank">
						<img src="<?php echo get_template_directory_uri() . '/images/icons/ig_ico.svg'; ?>"/>
					</a>
					<a href="https://www.linkedin.com/company/clicane" target="_blank">
						<img src="<?php echo get_template_directory_uri() . '/images/icons/in_ico.svg'; ?>"/>
					</a>
				</div>
			</div>
			<div class="siteFooter__column">
				<a href="mailto:info@clicane.com" class="siteFooter__position">
					<img src="<?php echo get_template_directory_uri() . '/images/icons/mail_ico.svg'; ?>"/>
					<span>info@clicane.com</span>
				</a>
				<?php if(!get_field('footer_phone_hide')): ?>
				<a href="tel:+48<?php echo get_field('footer_phone'); ?>" class="siteFooter__position">
					<img src="<?php echo get_template_directory_uri() . '/images/icons/phone_ico.svg'; ?>"/>
					<span>+48 <?php echo get_field('footer_phone'); ?></span>
				</a>
				<?php endif; ?>
			</div>
			<div class="siteFooter__column siteFooter__column--desktop">
				<h3><?php pll_e('odwiedź nas'); ?></h3>
				<div class="social">
					<a href="https://instagram.com/clicane_presentation_design" target="_blank">
						<img src="<?php echo get_template_directory_uri() . '/images/icons/ig_ico.svg'; ?>"/>
					</a>
					<a href="https://www.linkedin.com/company/clicane" target="_blank">
						<img src="<?php echo get_template_directory_uri() . '/images/icons/in_ico.svg'; ?>"/>
					</a>
				</div>
			</div>
			<div class="siteFooter__column">
				<a href="<?php echo get_field('footer_address_map'); ?>" target="_blank" class="siteFooter__position">
					<img src="<?php echo get_template_directory_uri() . '/images/icons/marker_ico.svg'; ?>"/>
					<span><?php echo get_field('footer_address'); ?></span>
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
