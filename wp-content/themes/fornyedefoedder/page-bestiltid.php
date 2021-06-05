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

        <div id="main_container" class="bestiltid">
			<div id="splash_section">
				<h1>
					Bestil tid
				</h1>
			</div>
            <section id="first_section">
				<div class="container">
					<div class="col">
						<h2>
							Bestil en tid
						</h2>
						<p>
							Da jeg altid har mine patienter som første prioritet, er det ikke altid jeg er ved telefonen.
</p><p>
Du kan bruge formularen, til at vælge hvilken måde du vil i kontakt med mig på og så <b>kontakter jeg dig</b>, når jeg ikke har patienter.
</p><p>
Du er selvfølgelig også velkommen til at ringe mig op, ligge en besked eller sende en sms på <b>+45 2014 4866</b>.
</p><p>
Jeg kan også kontaktes over mail på <b>fornyedefoedder@gmail.com</b>.
						</p>
					</div>
					<div class="col formular">
						<h2>
							Bliv kontaktet
						</h2>
						<?php echo do_shortcode( '[wpforms id="283"]' ); ?>
					</div>

				</div>

            </section>
            <section id="second_section">
				<div class="container">
					<div id="map">
						<h2>
							Find vej
						</h2>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2246.2559399248953!2d12.487382515622015!3d55.73668190070301!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465251e5f2226909%3A0xf65780dcacaab5f!2sVandt%C3%A5rnsvej%2062a%2C%202860%20S%C3%B8borg!5e0!3m2!1sda!2sdk!4v1622579493181!5m2!1sda!2sdk" width="450" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
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

            </section>


        </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
