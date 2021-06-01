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
                 <button data-produkter="alle" class="valgt">Alle</button>
                 <button data-produkter="haard hud" class="haardhud">Hård hud</button>
                 <button data-produkter="neglebehandling" class="neglebehandling">Neglebehandling</button>
                 <button data-produkter="saarbehandling" class="saarbehandling">Sårbehandling</button>
                 <button data-produkter="saaler" class="saaler">Såler</button>
             </nav>
             <h2 class="alle">Alle</h2>
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