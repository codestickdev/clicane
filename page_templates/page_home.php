<?php
    /**
     * Template name: Strona główna
     */
get_header(); ?>

<main class="clicane clicane--home">
    <section class="homeHeader">
        <div class="homeHeader__wrap container">
            <div class="homeHeader__content">
                <p class="hello"><?php pll_e('Cześć!') ?></p>
                <h1><?php echo get_field('homeHeader_title'); ?></h1>
                <a href="#contact" class="btn"><span><?php echo get_field('homeHeader_btn'); ?></span></a>
            </div>
            <div class="homeHeader__image">
                <img src="<?php echo get_field('homeHeader_image')['url']; ?>" alt="<?php echo get_field('homeHeader_image')['alt']; ?>"/>
            </div>
        </div>
    </section>

    <section id="video" class="homeVideo">
        <div class="homeVideo__wrap container">
            <?php
            $attr = array(
                'src'       => get_field('homeVideo')['url'],
                'poster'    => get_field('homeVideo_bg')['url'],
            );
            echo wp_video_shortcode($attr); ?>
        </div>
    </section>

    <section class="homeText">
        <div class="homeText__wrap">
            <h2><?php pll_e('Nie musisz już więcej klikać,<br/> zrobimy to za Ciebie.') ?></h2>
        </div>
    </section>

    <section id="offer" class="homeOffer">
        <div class="sectionHeading">
            <h2 class="sectionHeading__title"><?php echo get_field('homeOffer_title'); ?></h2>
            <p><?php echo get_field('homeOffer_lead'); ?></p>
        </div>
        <h2 class="homeOffer__heading"><?php pll_e('Prezentacje multimedialne'); ?></h2>
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
        <h2 class="homeOffer__heading"><?php pll_e('Dokumenty multimedialne'); ?></h2>
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
            <h2 class="homeTools__heading"><?php pll_e('W naszej pracy korzystamy z wielu narzędzi:'); ?></h2>
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

    <section id="portfolio" class="homePortfolio">
        <div class="homePortfolio__wrap container">
            <div class="sectionHeading">
                <h2 class="sectionHeading__title">Portfolio</h2>
                <p><?php pll_e('Nasze prezentacje są wyświetlane na wielkich <br/>konferencjach, targach i spotkaniach wewnętrznych.'); ?></p>
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
                    <div class="realization__logo">
                        <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>"/>
                    </div>
                </article>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <section id="clients" class="homeClients">
        <div class="homeClients__wrap container">
            <div class="sectionHeading">
                <h2 class="sectionHeading__title"><?php pll_e('Klienci'); ?></h2>
                <p><?php pll_e('Współpracujemy z klientami z wielu branż.<br/>Oto niektórzy z nich:'); ?></p>
            </div>
            <div class="homeClients__list">
                <?php while(have_rows('homeClients')): the_row(); ?>
                <div class="client">
                    <img src="<?php echo get_sub_field('homeClients_logo')['url']; ?>" alt="<?php echo get_sub_field('homeClients_logo')['alt']; ?>"/>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <section id="about" class="homeAbout">
        <div class="homeAbout__wrap">
            <div class="sectionHeading">
                <h2 class="sectionHeading__title"><?php echo get_field('homeAbout_title'); ?></h2>
                <p><?php echo get_field('homeAbout_lead'); ?></p>
            </div>
            <div class="homeAbout__row container">
                <?php while(have_rows('homeAbout')): the_row();
                    $thumb = get_sub_field('homeAbout_image');
                    $name = get_sub_field('homeAbout_name');
                    $desc = get_sub_field('homeAbout_desc');
                ?>
                <div class="owner">
                    <div class="owner__thumb">
                        <img src="<?php echo $thumb['url']; ?>" alt="<?php echo $thumb['alt']; ?>"/>
                    </div>
                    <h3><?php echo $name; ?></h3>
                    <p><?php echo $desc; ?></p>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <section class="homeText homeText--small">
        <div class="homeText__wrap">
            <h2><?php pll_e('Oboje mamy głowy pełne <br/>pomysłów i chętnie Ci pomożemy!'); ?></h2>
        </div>
    </section>

    <section id="contact" class="homeContact">
        <div class="homeContact__wrap container">
            <div class="sectionHeading">
                <h2 class="sectionHeading__title"><?php pll_e('Kontakt'); ?></h2>
                <p><?php pll_e('Skontaktuj się z nami. Stwórzmy coś niesamowitego!'); ?></p>
            </div>  
            <div class="homeContact__content">
                <div class="homeContact__image">
                    <img src="<?php echo get_template_directory_uri() . '/images/homeContact_img.svg'; ?>"/>
                </div>          
                <div class="homeContact__form">
                    <form id="contactForm" class="contactForm" name="contactForm" type="POST">
                        <h3><?php pll_e('Wyślij nam wiadomość:'); ?></h3>
                        <div class="contactForm__alert"><p></p></div>
                        <div class="contactForm__row">
                            <div class="contactForm__input">
                                <input type="phone" class="input" name="contactPhone" placeholder="<?php pll_e('Telefon'); ?>" optional="true"/>
                            </div>
                        </div>
                        <div class="contactForm__row">
                            <div class="contactForm__input">
                                <input type="mail" class="input" name="contactMail" placeholder="Email"/>
                            </div>
                        </div>
                        <div class="contactForm__row">
                            <div class="contactForm__input">
                                <textarea class="input input--textarea" name="contactMessage" placeholder="<?php pll_e('Wiadomość'); ?>"></textarea>
                            </div>
                        </div>
                        <div class="contactForm__row">
                            <div class="contactForm__input contactForm__input--checkbox">
                                <div class="checkbox-trigger"></div>
                                <input type="checkbox" name="contactAcceptance" required/>
                                <label><?php pll_e('Przyjmuję do wiadomości, że moje dane osobowe podane przeze mnie w formularzu kontaktowym są przetwarzane przez firmę Kamil Rasiński w celu udzielenia odpowiedzi na moje zapytanie, zgodnie z <a href="https://clicane.com/polityka-prywatnosci.pdf" target="_blank">Polityką prywatności</a>.', 'clicane'); ?></label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn--button contactForm__submit"><span><?php pll_e('wyślij'); ?></span></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>