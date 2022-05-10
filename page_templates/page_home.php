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

    <section class="homeTools">
        <div class="homeTools__wrap container">
            <h2 class="homeTools__heading">W naszej pracy korzystamy z wielu narzędzi:</h2>
            <div class="homeTools__list">
                <?php
                    $elements = 0;
                    while(have_rows('homeTools')){
                        the_row(); $elements++;
                    };
                ?>
                <?php $count = 0;
                while(have_rows('homeTools')): the_row(); $count++; ?>
                    <?php
                        $last = false;
                        if($count == 4 || $count == 8 || $count == 12 || $count == 16 || $count == $elements){
                            $last = true;
                        }
                    ?>
                    <p class="pos<?php if($last == true){echo ' pos--last';} ?>"><?php echo get_sub_field('homeTools_name'); ?></p>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <section class="homePortfolio">
        <div class="homePortfolio__wrap container">
            <div class="sectionHeading">
                <h2 class="sectionHeading__title">Portfolio</h2>
                <p>Nasze prezentacje są wyświetlane na wielkich<br/>konferencjach, targach i spotkaniach wewnętrznych.</p>
            </div>
            <div class="homePortfolio__list">
                <?php while(have_rows('homePortfolio')): the_row();
                    $logo = get_sub_field('homePortfolio_logo');
                    $content = get_sub_field('homePortfolio_content');
                ?>
                <article class="realization">
                    <div class="realization__content">
                        <div class="logo">
                            <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>"/>
                        </div>
                        <p><?php echo $content; ?></p>
                    </div>
                    <div class="realization__images">
                        <?php while(have_rows('homePortfolio_images')): the_row(); ?>
                        <div class="image">
                            <img src="<?php echo get_sub_field('homePortfolio_images_img')['url']; ?>" alt="<?php echo get_sub_field('homePortfolio_images_img')['alt']; ?>"/>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </article>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>