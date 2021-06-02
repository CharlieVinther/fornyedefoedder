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

		<template>    
            <article>
            <div>
           <section id="first_section" class="single-produkt">
           <img src="" alt="" class="billede">
           <h3 class="navn"></h3>
           <h2 class="beskrivelse"></h2>
           <img src="" alt="" class="brandlogo">
           </section>
           </div>
           </article>
           </template>

           <section id="second_section" class="single-produkt">
           <h2>Lignende produkter</h2>
           </section>
            
		</main><!-- #main -->

       

        <script>
            let produkt;
            
            let aktueltProdukt = <?php echo get_the_ID() ?>;
            let produktInfo;


            const dbUrl = "https://charlievinther.dk/fornyedefoedder/wp-json/wp/v2/produkt/" + aktueltProdukt;


            const produktUrl = "https://charlievinther.dk/fornyedefoedder/wp-json/wp/v2/produkt?per_page=100";

            const container = document.querySelector("#produkt");

            document.addEventListener("DOMContentLoaded", start);

            function start() {
                console.log("start");



                getJSON();
            }

            async function getJSON() {
                const data = await fetch(dbUrl);
                podcast = await data.json();

                const data2 = await fetch(produktUrl);
                produkter = await data2.json();
                console.log("produkt: ", produkter);

                visProdukt();
                //getProdukter();
                //visProdukter();
            }

            function visProdukt() {
                console.log("visProdukt");
                //document.querySelector(".billede").src = produkt.image.guid;
                document.querySelector(".navn").textContent = produkt.navn;
                document.querySelector(".beskrivelse").textContent = produkt.beskrivelse;
                document.querySelector(".brandlogo").src = produkt.image.guid;
                
            }

            //async function getProdukter() {
                //let produktForhold = "https://charlievinther.dk/fornyedefoedder/wp-json/wp/v2/produkt/";


                //produkt.produkter.forEach(async produkterne => {
                    //let data3 = "data" + produkterne;
                    //data3 = await fetch(produktForhold + produkterne);
                    //produktInfo = await data3.json();

                    //console.log(produktInfo);
                    //visProdukter();


                //})


           // }

            // function visProdukter() {
            //     console.log("visProdukter");
            //     let temp = document.querySelector("template");
            //     let klon = temp.cloneNode(true).content;

            //     console.log("loop id :", aktueltProdukt);

            //     klon.querySelector(".navn").innerHTML = episodeInfo.title.rendered;
            //     document.querySelector(".billede").src = produkt.image.guid;

            //     klon.querySelector("article").addEventListener("click", () => {
            //         location.href = produktInfo.link;
            //     });
            //     klon.querySelector("a").href = produktInfo.link;
            //     console.log("produkt", produktInfo.link);
            //     container.appendChild(klon);

            // }
        



            </script>
	</div>
    <!-- #primary -->

<?php
get_footer();
