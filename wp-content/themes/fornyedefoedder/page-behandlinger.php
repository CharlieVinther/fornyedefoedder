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
    <main id="main" class="site-main behandlinger">

        <div id="main_container">
			<div id="splash_section">
	<h1>
		Behandlinger og priser
				</h1>
		</div>
            <section id="section_one">
				<div class="container">
					<div class="col">


                <div id="behandling_container">
                
                    <div id="Fodbehandlinger_container" class="priser">
						<h2>
							Fodbehandlinger
						</h2>
						<h4>
							Pris
						</h4>
                    </div>
                    
                    <div id="Neglebehandlinger_container" class="priser">
						<h2>
							Neglebehandlinger
						</h2>
						<h4>
							Pris
						</h4>
					</div>
					</div>
						</div>
                    
                    <div class="col">


                    <div id="Gebyr_container" class="priser">
						<h2>
							Andre tillæg og gebyrer
						</h2>
						<h4>
							Pris
						</h4>
					</div>
                    
                    
                    <div id="Saar_container" class="priser">
						<h2>
							Sårbehandling
						</h2><h4>
						pris
						</h4>
					</div>
                       
                    

                    <div id="Indlaeg_container" class="priser">
						<h2>Indlæg
						</h2><h4>
						pris
						</h4>
					</div>
                    <p>Afbud skal ske senest 24 timer før din tid, ved senere afbud eller
udeblivelse, tager jeg et gebyr på 250 kr.</p>
                </div>

					</div>

            </section>

					</div>

		<section id="tilskud">
					<div id="behandling_text_container" class="container">

                    <h2>Tilskud og henvisning</h2>
                    <p>Patienter har følgende tildkudsmuligheder</p>
						<ul>
							<li><a href="">Sygeforsikring Danmark</a></li>
							<li><a href="">Helbredstillæg fra kommunen</a></li>
							<li><a href="">Den offentlige sygesikring</a></li>
						</ul>


                    <p>Du er velkommen til at <a href="">kontakte</a> mig ved yderligere spørgsmål.</p>
                </div>
			</section>
            <section id="second_section">
				<div class="container">


                <h2>Info om fødder og fodsygdomme</h2>
					</div>
            </section>
            <section id="third_section">
            <div id="formular">
            <div class="container">
                <h2 class="bliv_kontaktet">Bliv kontaktet</h2>
                <p>Hvis du har spørgsmål eller gerne vil bestille en tid, kan du bruge nedenstående formular til at
                    blive kontaktet, så vi sammen kan finde frem til den rette behandling.</p>

			<?php echo do_shortcode( '[wpforms id="283"]' ); ?>
				<p>
					Jeg bestræber efter at vende tilbage inden 24 timer
				</p>
			</div>
		</div>
            </section>

    </main><!-- #main -->
    <template>
        <h3 class="navn"></h3>
        <p class="pris"></p>

    </template>

    <script>
        let behandlinger;
        let cat;

        const url = "http://charlievinther.dk/fornyedefoedder/wp-json/wp/v2/behandling?per_page=100";

        console.log("behandlinger");

        document.addEventListener("DOMContentLoaded", start);

        function start() {
            console.log("start");
            
            hentData();
        }
    
        async function hentData () {
            const respons = await fetch(url);
            behandlinger = await respons.json();

            console.log(behandlinger);

            visBehandlinger();
        }

        function visBehandlinger() {
            const temp = document.querySelector("template").content;

            behandlinger.forEach(e => {
                console.log("forEachBehandlinger");

                const klon = temp.cloneNode(true);

                cat = e.kategori;
                let dest = document.querySelector("#" + cat + "_container");

                klon.querySelector(".navn").innerHTML = e.navn;
                klon.querySelector(".pris").textContent = e.pris + " Kr";

                console.log(dest);

                dest.appendChild(klon);



            });
        }
    
    
    
    
    
    
    
    
    
    </script>



</div><!-- #primary -->

<?php
get_footer();
