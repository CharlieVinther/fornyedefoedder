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
                <div class="container">
                    <div id="info_loop">
                    </div>
                </div>
            </section>
        </div>

    </main><!-- #main -->
    <template>
        <article>
            <img src="" alt="" class="illu">
            <h3 class="titel"></h3>
            <p class="kilde"></p>
            <a href="" class="kildelink">
                <button>Læs mere</button>
            </a>
        </article>
    </template>


    <script>
        let info;
        const url = "";

        console.log("info")

        document.addEventListener("DOMContentLoaded", start);

        function start() {
            console.log("start");
            
            hentData();
        }
    
        async function hentData () {
            const respons = await fetch(url);
            info = await respons.json();

            console.log(info);

            visInfo();
        }

        visInfo() {
            console.log("visInfo");

            const temp = document.querySelector("template").content;
            const dest = document.querySelector("#info_loop");

            info.forEach(e => {
                console.log("forEach");

                const klon = temp.cloneNode(true);

                klon.querySelector(".titel").innerHTML = e.titel;
                klon.querySelector("img").src = e.illu.guid;
                klon.querySelector(".kilde").innerHTML = e.kilde;
                klon.querySelector(".kildelink").href = e.kildelink;
                
                

                dest.appendChild(klon);

            });

        }
    
    
    </script>

</div><!-- #primary -->

<?php
get_footer();