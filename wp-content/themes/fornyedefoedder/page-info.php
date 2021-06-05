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
    <main id="main" class="site-main info_fodder">

        <div id="main_container">
			<div id="splash_section">
				<h1>
					Info om fødder
				</h1>
			</div>
			 <section id="second_section">
            <div class="container">
                <nav id="filtrering">
                <button data-info="alle" class="valgt filter">Alle artikler</button>
             </nav>
             </div>
            </section>
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
			<div class="info_grid">
            <p class="kilde"></p>
            <a href="" target="_blank" class="link">
                <button>Læs mere</button>
            </a>
				</div>
        </article>
    </template>


    <script>
                async function hentData() {

                    const catrespons = await fetch(caturl);
                    categories = await catrespons.json();
                    console.log(produkter);

                    opretKnapper();
                }





    let infoer;
    let categories;
    let filter = "alle";

    const url = "https://charlievinther.dk/fornyedefoedder/wp-json/wp/v2/info?per_page=100";
	const caturl = "https://charlievinther.dk/fornyedefoedder/wp-json/wp/v2/categories/";

    console.log("info")

    document.addEventListener("DOMContentLoaded", start);

    function start() {
        console.log("start");

        hentData();
    }

    async function hentData() {
        const respons = await fetch(url);
        info = await respons.json();
		const catrespons = await fetch(caturl);
                    categories = await catrespons.json();
                    console.log(info);

                    opretKnapper();

        console.log(info);

        visInfo();
    }



		function opretKnapper() {
                    console.log("opretKnapper")

                    categories.forEach(cat => {

						if (cat.id > 11) {
							 document.querySelector("#filtrering").innerHTML += `<button class="filter" data-info="${cat.id}">${cat.name}</button>`
							 addEventListenerToButton();

						}
                    })

                }


                function addEventListenerToButton() {
                    console.log("button");
                    document.querySelectorAll(".filter").forEach(knap => {
                        knap.addEventListener("click", filtrerInfo);
                    })
                }

                function filtrerInfo() {
                    filter = this.dataset.info;
                    console.log("filtrerInfo")

                    visInfo();
				}

    function visInfo() {
        console.log("visInfo");

        const temp = document.querySelector("template").content;
        const dest = document.querySelector("#info_loop");

        dest.textContent = "";

        info.forEach(e => {
            console.log("forEach");

            if (filter == "alle" || e.categories.includes(parseInt(filter))) {

            const klon = temp.cloneNode(true);

            

            klon.querySelector(".titel").innerHTML = e.titel;
            klon.querySelector("img").src = e.illu.guid;
            klon.querySelector(".kilde").innerHTML = e.kilde;

            klon.querySelector(".link").href = e.kildelink;

            dest.appendChild(klon);

            }

        });

    }
    </script>

</div><!-- #primary -->

<?php
get_footer();
