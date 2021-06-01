<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <div id="main_container">
            <section id="first_section">
                <article> 
                <h2>Om fodplejeprodukter</h2>
                <p></p>
                </article>
            </section>

            <section id="second_section">
                <h2 class="produkter">Produkter</h2>
                <nav class="filtrering">
                 <button data-produkter="alle" class="valgt">Alle produkter</button>
                 <button data-produkter="eksem-og-saar" class="eksem-og-saar">Eksem og sår</button>
                 <button data-produkter="haelerevner" class="haelerevner">Hælerevner</button>
                 <button data-produkter="svamp" class="svamp">Problemer med svamp</button>
                 <button data-produkter="psoriasis" class="psoriasis">Psoriasis</button>
                 <button data-produkter="sportsudoevere" class="sportsudoevere">Til sportsudøvere</button>
                 <button data-produkter="sved-og-lugt" class="sved-og-lugt">Sved og lugt</button>
                 <button data-produkter="toerhud" class="toerhud">Tør hud</button>
                 <button data-produkter="tyndhud" class="tyndhud">Tynd hud</button>
             </nav>
            </section>


            <section id="third_section">
                <article class="fodproblemer"></article>
                <h2>Fodproblemer</h2>
                <p></p>
                </section>

    </main><!-- #main -->

    <template>
                    <article>
                     <img src="" alt="" class="billede">
                        <h3 class="produkt"></h3>
                     </article>
                  </template>
                  

</div><!-- #primary -->

<?php
get_footer();