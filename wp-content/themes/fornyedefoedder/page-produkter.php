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
                <article class="produkt_container">
                    <img src="" alt="" class="produktbillede">
                    <h3 class="navn"></h3>
                    <p class="size"></p>
                </article>
            </template>

        <script>
                let produkter;
                let categories;
                let filter = "alle";

                console.log("produkter");

                const url = "https://charlievinther.dk/fornyedefoedder/wp-json/wp/v2/produkt?per_page=100";
                const caturl = "https://charlievinther.dk/fornyedefoedder/wp-json/wp/v2/categories/";

                document.addEventListener("DOMContentLoaded", start);

                function start() {
                    console.log("start");

                    hentData();
                }

                function start() {
                    console.log("start");

                    hentData();
                }

                async function hentData() {
                    const respons = await fetch(url);
                    const catrespons = await fetch(caturl);
                    produkter = await respons.json();
                    categories = await catrespons.json();
                    console.log(produkter);
                    visProdukter();
                    opretKnapper();
                }

                function opretKnapper() {
                    console.log("opretKnapper")

                    categories.forEach(cat => {
                        document.querySelector("#filtrering").innerHTML += `<button class="filter" data-produkter="${cat.id}">${cat.name}</button>`
                    })
                    addEventListenerToButton();
                }

                function addEventListenerToButton() {
                    console.log("button");
                    document.querySelectorAll("#filtrering button").forEach(knap => {
                        knap.addEventListener("click", filtrerProdukter);
                    })
                }

                function filtrerProdukter() {
                    filter = this.dataset.produkter;
                    console.log("filtrerProdukter")

                    visProdukter();
                }

                function visProdukter() {
                    console.log("visProdukter");

                    const dest = document.querySelector("#grid_container_podcast");
                    const temp = document.querySelector("template").content;

                    dest.textContent = "";

                    produkter.forEach(produkt => {
                        console.log("forEachProdukter");


                        if (filter == "alle" || produkter.categories.includes(parseInt(filter))) {

                            console.log("IF");

                            const klon = temp.cloneNode(true);

                            klon.querySelector(".produktbillede").src = produkter.image.guid;
                            klon.querySelector(".navn").textContent = navn.title.rendered;
                            klon.querySelector(".size").textContent =  size.produkter;
                            

                            klon.querySelector(".produkt_container").addEventListener("click", () => location.href = produkter.link);

                            dest.appendChild(klon);
                            //klon.querySelector("").
                        }
                    });


                }




         </script>

</div><!-- #primary -->

<?php
get_footer();