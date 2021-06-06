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
    <main id="main" class="site-main singleview single-info">
    <section id="splash_section">

    </section>
        <section id="first_section" class="single-info">
			<div class="container">

			<div class="brodkrumme">
				<p class="bread">

				</p>
				<a href="http://charlievinther.dk/fornyedefoedder/info/" class="tilbage">
					Gå tilbage
				</a>
			</div>

            <article id="info_container_single">
                <div class="col">
                    <img src="" alt="" class="billede">
					<a class="se_mere" href="" target="_blank"></a>
                </div>
                <div class="col">
                    <h2 class="navn"></h2>
                    <p class="beskrivelse"></p>
                </div>
            </article>
				</div>
        </section>


    </main><!-- #main -->



    <script>
		let info;
    let infoer;
    let aktueltInfo = <?php echo get_the_ID() ?>;


    const dbUrl = "https://charlievinther.dk/fornyedefoedder/wp-json/wp/v2/info/" + aktueltInfo;


    const infoUrl = "https://charlievinther.dk/fornyedefoedder/wp-json/wp/v2/info?per_page=100";

		const caturl = "https://charlievinther.dk/fornyedefoedder/wp-json/wp/v2/categories/";


    document.addEventListener("DOMContentLoaded", start);

    function start() {
        console.log("start");
		getJSON();
    }

    async function getJSON() {
        const data = await fetch(dbUrl);
        info = await data.json();
		const catrespons = await fetch(caturl);
                    categories = await catrespons.json();


        hentData();


    }

    async function hentData() {
        const respons = await fetch(infoUrl);
        infoer = await respons.json();
        console.log(infoer);
        visInfo();

    }

    function visInfo() {
        console.log("visInfo");
        document.querySelector(".billede").src = info.illu.guid;
        document.querySelector(".navn").textContent = info.titel;
        document.querySelector(".beskrivelse").textContent = info.indhold;
		document.querySelector(".se_mere").href = info.se_mere;
		document.querySelector(".se_mere").textContent = info.kildelink;
		document.querySelector(".bread").textContent = "Info / " +"<?php echo ''. get_the_category( $id )[0]->name .''?> / " + info.titel;
        //document.querySelector(".brandlogo").src = produkt.billede.guid;



            }


    </script>
</div>
<!-- #primary -->

<?php
get_footer();
