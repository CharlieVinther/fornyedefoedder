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
                <nav id="filtrering">
                 <button data-produkter="alle" class="valgt">Alle produkter</button>
             </nav>
            </section>

            <section id="produktliste"></section>


            <section id="third_section">
                <article class="fodproblemer"></article>
                <h2>Fodproblemer</h2>
                <p></p>
                </section>

    </main><!-- #main -->

    <template>
                <article id="produkt_container">
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

                    const dest = document.querySelector("#produktliste");
                    const temp = document.querySelector("template").content;

                    produkter.forEach(produkt => {
                        console.log("forEachProdukter");


                        if (filter == "alle" || produkt.categories.includes(parseInt(filter))) {

                            console.log("IF");

                            const klon = temp.cloneNode(true);

                            // klon.querySelector(".produktbillede").src = produkt.image.guid; //
                            klon.querySelector(".navn").textContent = produkt.navn;
                            klon.querySelector(".size").textContent = produkt.size;
                            

                            klon.querySelector("#produkt_container").addEventListener("click", () => location.href = produkt.link);

                            dest.appendChild(klon);
                            //klon.querySelector("").
                        }
                    });


                }




         </script>

</div><!-- #primary -->

<?php
get_footer();