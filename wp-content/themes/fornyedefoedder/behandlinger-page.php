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
                <div id="behandling_container"></div>
                <div id="behandling_text_container">
                    <h2>Tilskud og henvisning</h2>
                    <p>Patienter har følgende tildkudsmuligheder</p>
                    <a href=""></a>
                    <a href=""></a>
                    <a href=""></a>
                    <p>Du er velkommen til at <a href="">kontakte</a> mig ved yderligere spørgsmål.</p>
                </div>
            </section>
            <section id="second_section">
                <h2>Info om fødder og fodsygdomme</h2>
            </section>
            <section id="third_section">
                <div id="formular_img_container"></div>
                <div id="formular_container">
                    <div class="section_two_container_one">
                        <h2 class="bliv_kontaktet">Bliv kontaktet</h2>
                        <p>Hvis du har spørgsmål eller gerne vil bestille en tid, kan du bruge nedenstående formular til
                            at blive kontaktet, så vi sammen kan finde frem til den rette behandling.</p>
                        <p>Hvordan vil du kontaktes?</p>
                        <form>
                            <input type="checkbox">
                            <label>Ring mig op</label>
                            <input type="checkbox">
                            <label>SMS</label>
                            <input type="checkbox">
                            <label>E-mail</label>
                    </div>
                    <div id="section_two_container_two">
                        <input type="tel">
                        <input type="email">
                    </div>
                    <div id="section_two_container_three">
                        <textarea name="besked" rows="10"></textarea>
                        <button>Send</button>
                        <p>OBS. Jeg bestræber mig på at vende tilbage inden 24 timer.</p>
                    </div>
                    </form>
                </div>
            </section>
            <section id="fourth_section">
                <div id="kontakt_container">
                    <img src="" alt="">
                    <p>+45 2014 4866</p>
                    <img src="" alt="">
                    <p>fornyedefoedder@gmail.com</p>
                    <img src="" alt="">
                    <p>fornyedefødder</p>
                </div>
            </section>

        </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();