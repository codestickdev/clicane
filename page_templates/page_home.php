<?php
    /**
     * Template name: Strona główna
     */
get_header(); ?>

<main class="clicane clicane--home">
    <section class="homeHeader">
        <div class="homeHeader__wrap container">
            <div class="homeHeader__content">
                <img src="<?php echo get_template_directory_uri() . '/images/homeHeader_hello.svg'; ?>" class="hello"/>
                <h1><?php echo get_field('homeHeader_title'); ?></h1>
                <a href="" class="btn"><span><?php echo get_field('homeHeader_btn'); ?></span></a>
            </div>
            <div class="homeHeader__image">
                <img src="<?php echo get_field('homeHeader_image')['url']; ?>" alt="<?php echo get_field('homeHeader_image')['alt']; ?>"/>
            </div>
        </div>
        <div class="homeHeader__nav">
            <a href="#">
                <img src="<?php echo get_template_directory_uri() . '/images/scrollArrow.svg'; ?>"/>
            </a>
        </div>
    </section>

    <section class="homeVideo">
        <div class="homeVideo__wrap container">
            <?php
            $attr = array(
                'src'       => get_field('homeVideo')['url'],
                'poster'    => get_field('homeVideo_bg')['url'],
            );
            echo wp_video_shortcode($attr); ?>
            <div class="homeVideo__play">
                <span>zobacz film</span>
            </div>
        </div>
    </section>

    <section class="homeText">
        <div class="homeText__wrap">
            <h2>Nie musisz już więcej klikać,<br/> zrobimy to za Ciebie.</h2>
        </div>
    </section>

    <section class="homeOffer">
        <div class="sectionHeading">
            <h2 class="sectionHeading__title"><?php echo get_field('homeOffer_title'); ?></h2>
            <p><?php echo get_field('homeOffer_lead'); ?></p>
        </div>
        <h2 class="homeOffer__heading">Prezentacje multimedialne</h2>
        <div class="homeOffer__list container">
            <?php while(have_rows('homeOffer_list')): the_row(); ?>
            <div class="pos">
                <div class="pos__icon">
                    <img src="<?php echo get_sub_field('homeOffer_list_icon')['url']; ?>" alt="<?php echo get_sub_field('homeOffer_list_icon')['alt']; ?>"/>
                </div>
                <p><?php echo get_sub_field('homeOffer_list_text'); ?></p>
            </div>
            <?php endwhile; ?>
        </div>
        <h2 class="homeOffer__heading">Prezentacje multimedialne</h2>
        <div class="homeOffer__list homeOffer__list--short container">
            <?php while(have_rows('homeOffer_list_short')): the_row(); ?>
            <div class="pos">
                <div class="pos__icon">
                    <img src="<?php echo get_sub_field('homeOffer_list_short_icon')['url']; ?>" alt="<?php echo get_sub_field('homeOffer_list_short_icon')['alt']; ?>"/>
                </div>
                <p><?php echo get_sub_field('homeOffer_list_short_text'); ?></p>
            </div>
            <?php endwhile; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>