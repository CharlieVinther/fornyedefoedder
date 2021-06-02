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
    <main id="main" class="site-main container">

        <div id="main_container">
            <section id="first_section">
                <div id="behandling_container">
                
                    <div id="Fodbehandlinger_container">
                    <p>Fodbehandlinger</p></div>
                    
                    <div id="Neglebehandlinger_container">
                    <p>Neglebehandlinger</p></div>
                    
                    <div id="Gebyr_container">
                    <p>Andre tillæg og gebyrer</p></div>
                    
                    <div id="Saar_container">
                        <p>Sårbehandlinger</p></div>
                    
                    <div id="Indlaeg_container"><p>Indlægssåler</p></div>
                    <p>Afbud skal ske senest 24 timer før din tid, ved senere afbud eller
udeblivelse, tager jeg et gebyr på 250 kr.</p>
                </div>
                <div id="behandling_text_container">
                    <h2>Tilskud og henvisning</h2>
                    <p>Patienter har følgende tildkudsmuligheder</p>
                    <a href=""></a>
                    <a href=""></a>
                    <a href=""></a>
                    <p>Du er velkommen til at <a href="">kontakte</a> mig ved yderligere spørgsmål.</p>
                </div>
            </section>
            <section id="second_section">
                <h2>Info om fødder og fodsygdomme</h2>
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
            <section id="fourth_section">
                <div id="kontakt_container">
                    <img src="" alt="">
                    <p>+45 2014 4866</p>
                    <img src="" alt="">
                    <p>fornyedefoedder@gmail.com</p>
                    <img src="" alt="">
                    <p>fornyedefødder</p>
                </div>
            </section>

        </div>

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
                klon.querySelector(".pris").textContent = e.pris + " DKK";

                console.log(dest);

                dest.appendChild(klon);



            });
        }
    
    
    
    
    
    
    
    
    
    </script>



</div><!-- #primary -->

<?php
get_footer();