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
        <section id="produkt">
        <article id="produkt_container">
            <div>
           <section id="first_section" class="single-produkt">
           <img src="" alt="" class="billede">
           <h3 class="navn"></h3>
           <h2 class="beskrivelse"></h2>
           <img src="" alt="" class="brandlogo">
           </section>
           </div>
           </article></section>
		<template>    
            <h2 class="lignendenavn"></h2>
            <p class="lignendesize"></p>
           </template>

           <section id="second_section" class="single-produkt">
           <h2>Lignende produkter</h2>
           </section>
            
		</main><!-- #main -->

       

        <script>
            let produkt;
            let produkter;
            let aktueltProdukt = <?php echo get_the_ID() ?>;


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
                produkt = await data.json();

                
                hentData();
                
                
            }

            async function hentData() {
                    const respons = await fetch(produktUrl);
                  
                    produkter = await respons.json();
                    
                    console.log(produkter);
                    visProdukt();
                    
                }


            function visProdukt() {
                console.log("visProdukt");
                //document.querySelector(".billede").src = produkt.image.guid;
                document.querySelector(".navn").textContent = produkt.navn;
                document.querySelector(".beskrivelse").textContent = produkt.beskrivelse;
                //document.querySelector(".brandlogo").src = produkt.image.guid;

                produkter.forEach(lignende => {
                        console.log("forEachProdukt");
                        const dest = document.querySelector("#second_section");
                    const temp = document.querySelector("template").content;

                        if (lignende.categories.includes(parseInt(produkt.categories))) {

                            console.log("IF");

                            const klon = temp.cloneNode(true);

                            // klon.querySelector(".produktbillede").src = produkt.image.guid; //
                            klon.querySelector(".lignendenavn").textContent = produkt.navn;
                            klon.querySelector(".lignendesize").textContent = produkt.size;
                            

                            klon.querySelector("#produkt_container").addEventListener("click", () => location.href = produkt.link);

                            dest.appendChild(klon);
                            //klon.querySelector("").
                        }
           });

        }


        



            </script>
	</div>
    <!-- #primary -->

<?php
get_footer();
