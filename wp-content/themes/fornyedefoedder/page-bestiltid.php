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
                    <h2></h2>
                    <p></p>
                </article>
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
            </section>
            <section id="second_section">
                <div id="map">
                    <h2></h2>
                    <img src="" alt="">
                </div>
                <article>
                    <h2></h2>
                    <p></p>
                    <h2></h2>
                    <p></p>
                    <p></p>
                </article>
            </section>
           

        </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();