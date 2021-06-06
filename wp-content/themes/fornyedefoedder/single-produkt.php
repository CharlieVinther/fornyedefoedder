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
    <main id="main" class="site-main singleview single-produkt">
    <section id="splash_section">
   
    </section>
        <section id="first_section" class="single-produkt container">
			<div class="brodkrumme">
				<p class="bread">

				</p>
				<a href="http://charlievinther.dk/fornyedefoedder/produkter/" class="tilbage">
					Gå tilbage
				</a>
			</div>

            <article id="produkt_container_single">
                <div class="col">
                    <img src="" alt="" class="billede">
                </div>
                <div class="col2">
                    <h2 class="navn"></h2>
                    <p class="beskrivelse"></p>
					<p class="size"></p>
                </div>
            </article>
        </section>
        <template>
            <article id="lignende_container">
                <img src="" alt="" class="produktbillede">
                <div class="col">
                    <h2 class="lignendenavn"></h2>
                    <p class="lignendesize"></p>
                </div>
            </article>
        </template>

        <section id="second_section" class="single-produkt">
			<div class="container">

        <h2 class="lignendeprodukter">Lignende produkter</h2>
				</div>
            <div id="lignendeliste" class="container">

                
            </div>
        </section>

    </main><!-- #main -->



    <script>
    let produkt;
    let produkter;
    let aktueltProdukt = <?php echo get_the_ID() ?>;


    const dbUrl = "https://charlievinther.dk/fornyedefoedder/wp-json/wp/v2/produkt/" + aktueltProdukt;


    const produktUrl = "https://charlievinther.dk/fornyedefoedder/wp-json/wp/v2/produkt?per_page=100";

		const caturl = "https://charlievinther.dk/fornyedefoedder/wp-json/wp/v2/categories/";

    const container = document.querySelector("#produkt");

    document.addEventListener("DOMContentLoaded", start);

    function start() {
        console.log("start");



        getJSON();
    }

    async function getJSON() {
        const data = await fetch(dbUrl);
        produkt = await data.json();
		const catrespons = await fetch(caturl);
                    categories = await catrespons.json();


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
        document.querySelector(".billede").src = produkt.billede.guid;
        document.querySelector(".navn").textContent = produkt.navn;
        document.querySelector(".beskrivelse").textContent = produkt.beskrivelse;
		document.querySelector(".size").textContent = produkt.size;
		document.querySelector(".bread").textContent = "Produkter / " +"<?php echo ''. get_the_category( $id )[0]->name .''?> / " + produkt.navn;
        //document.querySelector(".brandlogo").src = produkt.billede.guid;

        produkter.forEach(lignende => {
            console.log("forEachProdukt");
            const dest = document.querySelector("#lignendeliste");
            const temp = document.querySelector("template").content;

            if (lignende.id != produkt.id && lignende.categories.includes(parseInt(produkt.categories))) {

                console.log("IF");

                const klon = temp.cloneNode(true);

                klon.querySelector(".produktbillede").src = lignende.billede.guid;
                klon.querySelector(".lignendenavn").textContent = lignende.navn;
                klon.querySelector(".lignendesize").textContent = lignende.size;



                klon.querySelector("#lignende_container").addEventListener("click", () => location.href =
                    lignende
                    .link);

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
