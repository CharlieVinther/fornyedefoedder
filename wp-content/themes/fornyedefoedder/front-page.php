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

        <div id="section_one">
            <div id="index_section_one" class="container">
                <div id="behandlinger">
                    <img src="" alt="">
                    <h2 class="behandlinger">Behandlinger og priser</h2>
                    <p></p>
                    <button>Se mere</button>
                </div>

                <div id="fodproblemer">
                    <img src="" alt="">
                    <h2 class="fodproblemer">Info om fødder og fodsygdomme</h2>
                    <p></p>
                    <button>Se mere</button>
                </div>
                <div id="om_klinikken">
                    <img src="" alt="">
                    <h2 class="om_klinikken">Om klinikken</h2>
                    <p></p>
                    <button>Se mere</button>
                </div>

            </div>

            <div class="container">
                <img src="" alt="">
                <h2 class="statsautoriseret_fodterapeut">Statsautoriseret fodterapeut</h2>
                <p>Indsæt spændende lang tekst lol</p>
                <h2 class="statsautoriseret_fodterapeut_two">Hvem har brug for en fodterapeut?</h2>
                <p>Mere spændende lang tekst - dobbelt lol</p>
            </div>

        </div>

        <div id="section_two">
            <div class="container">
                <h2 class="bliv_kontaktet">Bliv kontaktet</h2>
                <p>Hvis du har spørgsmål eller gerne vil bestille en tid, kan du bruge nedenstående formular til at
                    blive kontaktet, så vi sammen kan finde frem til den rette behandling.</p>
                <p>Hvordan vil du kontaktes?</p>
                <form>
                    <input type="checkbox">
                    <label>Ring mig op</label>
                    <input type="checkbox">
                    <label>SMS</label>
                    <input type="checkbox">
                    <label>E-mail</label>
            </div>

            <div class="container">
                <input type="tel">
                <input type="email">
            </div>

            <div id="section_two_container_three">
                <textarea name="besked" rows="10"></textarea>
					<button>Send</button>
					<p>OBS. Jeg bestræber mig på at vende tilbage inden 24 timer.</p>
				</div>
				</form>	
			</div>

			<div id="section_three">
				<div class="container">
					<div id="map"></div>
					<h2 class="adresse">Adresse</h2>
					<p>Vandtårnsvej 62A, 
						2860 Søborg
					</p>
					<h2 class="aabningstider">Åbningstider</h2>
					<p>Mandag - fredag: Efter aftale
						Lørdag - søndag: Lukket
					</p>
				</div>

			</div>

			<div id="section_four">
				<div class="container">
					<img src="" alt="">
					<p>+45 2014 4866</p>
					<img src="" alt="">
					<p>fornyedefoedder@gmail.com</p>
					<img src="" alt="">
					<p>fornyedefødder</p>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();