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
<div id="splash_section">

		</div>
        <div id="section_one">
            <div id="index_section_one">
                <div class="col">
                    <img src="http://charlievinther.dk/fornyedefoedder/wp-content/uploads/2021/06/fod-ikon.svg" alt="fod ikon">
                    <h2 class="behandlinger">Behandlinger og priser</h2>
                    <p>Jeg udfører bla. klipning af negle, beskæring
af hård hud og ligtorne, behandling af
indgroede negle. Behandling og forebyggelse
af sår. Indlægssåler osv.</p>
                    <button class="button_two">Se mere</button>
                </div>

                <div class="col">
                    <img src="http://charlievinther.dk/fornyedefoedder/wp-content/uploads/2021/06/info-ikon.svg" alt="fodproblem ikon">
                    <h2 class="fodproblemer">Info om fødder og fodsygdomme</h2>
                    <p>Jeg har samlet lidt information
om fødder og fodsygdomme.</p>
                    <button class="button_two">Se mere</button>
                </div>
                <div class="col">
                    <img src="http://charlievinther.dk/fornyedefoedder/wp-content/uploads/2021/06/klinik-ikon-1.svg" alt="klinik ikon">
                    <h2 class="om_klinikken">Klinik i Søborg</h2>
                    <p>Jeg har under "Om klinikken" samlet noget praktisk information.</p>
                    <button class="button_two">Se mere</button>
                </div>

            </div>

            <div class="container">
				<div class="col">

                <img class="stats" src="http://charlievinther.dk/fornyedefoedder/wp-content/uploads/2021/06/stats-logo-sort.svg" alt="statsautoriseret fodterapeut i sort">
					</div>
				<div class="col">
                <h2 class="statsautoriseret_fodterapeut">Statsautoriseret fodterapeut</h2>
                <p>Mit navn er Stine Stubtoft og jeg er Statsautoriseret Fodterapeut.
Statsautoriseret Fodterapeuter er en anerkendt uddannelse, som er de eneste
professionelle behandlere af fødder i forbindelse med Diabetes, leddegigt,
nedgroede negle og arvæv. </p>
<p>
Jeg er underlagt Styrelsen for patientsikkerhed og har journalpligt.
Det betyder også at jeg som andre behandlere indenfor sundhedssektoren har
tavshedspligt.</p>
                <h2 class="statsautoriseret_fodterapeut_two parallax">Hvem har brug for en fodterapeut?</h2>
                <p>Alle kan have brug for en fodterapeut, uanset alder og køn. Nogle går til
fodterapeut af ren velvære og forebyggelse.
Nogle patientgrupper som f.eks. diabetes- og gigtpatienter
har behov for behandling eller forbyggelse af fodlidelser hos en fodterapeut.</p>
					</div>
            </div>

        </div>

        <div id="formular" >
			<img src="http://charlievinther.dk/fornyedefoedder/wp-content/uploads/2021/06/fod.jpg" class="rellax" data-rellax-speed="-4">


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

			<div id="section_three">
				<div class="container">
					<div id="map">
						<h2>
							Find vej
						</h2>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2246.2559399248953!2d12.487382515622015!3d55.73668190070301!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465251e5f2226909%3A0xf65780dcacaab5f!2sVandt%C3%A5rnsvej%2062a%2C%202860%20S%C3%B8borg!5e0!3m2!1sda!2sdk!4v1622579493181!5m2!1sda!2sdk" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
					<div class="col">
					<h2 class="adresse">Adresse</h2>
					<p>Vandtårnsvej 62A, 
						2860 Søborg
					</p>
					<h2 class="aabningstider">Åbningstider</h2>
					<p>Mandag - fredag: Efter aftale </p>
						<p>
						Lørdag - søndag: Lukket</p>
						</div>
				</div>

			</div>



		</main><!-- #main -->
	<script>



var rellax = new Rellax('.rellax',{
					wrapper = document.	});





	</script>

	</div><!-- #primary -->

<?php
get_footer();
