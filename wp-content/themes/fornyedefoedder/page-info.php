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
                <nav>
                    <button data-info="Alle"></button>
                </nav>
            </section>
            <section id="second_section">
                
            </section>
        </div>

    </main><!-- #main -->
    <template>
        <article></article>
    </template>


    <script>
        let info;
        let url;
    
    
    </script>

</div><!-- #primary -->

<?php
get_footer();