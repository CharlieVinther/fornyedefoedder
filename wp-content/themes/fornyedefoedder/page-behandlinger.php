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
                            </h2>
                            <h4>
                                pris
                            </h4>
                        </div>



                        <div id="Indlaeg_container" class="priser">
                            <h2>Indlæg
                            </h2>
                            <h4>
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

        <section id="form_indlag">
            <div class="container">
                <div class="col">
                    <img src="http://charlievinther.dk/fornyedefoedder/wp-content/uploads/2021/06/form.png"
                        width="540px" height="373px" alt="special indlæg">
                </div>
                <div class="col">
                    <h2>
                        Certificeret i indlægssåler
                        fra formthotics
                    </h2>
                    <p>
                        Det betyder at jeg udover at være uddannet fodterapeut, har valgt at tage et kursus
                        i individuelle indlæg fra Formthotics.
                    </p>
                    <p>
                        Formthotics er indlæg som jeg speciallaver i klinikken til netop dine fødder, det gøres ved at
                        opvarme indlægget og forme det efter din sko og fod, så du er sikret den rette støtte til lige
                        netop dine fødder.
                    </p>
                </div>
            </div>
        </section>
        <section id="section_four" class="grid info">
            <div class="container">
                <div class="col">
                    <h2 class="info_om_fodsygdomme">Info om fodsygdomme</h2>
                    <p class="tekst_om_fodsygdomme">Mange patienter er usikre omkring deres fødder og får derfor ikke
                        set en
                        fodterapeut før skaden er sket.

                        Jeg har derfor samlet noget information omkring de spørgsmål du evt. kunne have
                        – information generelt om fødder og fodsygdomme.</p>
                    <a href="http://charlievinther.dk/fornyedefoedder/info/"> <button class="se_mere button_two">Se
                            mere</button></a>
                </div>
                <img src="http://charlievinther.dk/fornyedefoedder/wp-content/uploads/2021/06/infografik.png" alt=""
                    class="infografik">
            </div>
        </section>

        <div id="formular">

            <div class="container rellax" data-rellax-speed="0.5">
                <h2 class="bliv_kontaktet">Bliv kontaktet</h2>
                <p>Hvis du har spørgsmål eller gerne vil bestille en tid, kan du bruge nedenstående formular til at
                    blive kontaktet, så vi sammen kan finde frem til den rette behandling.</p>

                <?php echo do_shortcode( '[wpforms id="283"]' ); ?>
                <p>
                    Jeg bestræber efter at vende tilbage inden 24 timer
                </p>
            </div>
        </div>


    </main><!-- #main -->
    <template>
        <h3 class="navn"></h3>
        <p class="pris"></p>

    </template>

    <script>

    //Vi starter ud med at angive de variabler og konstanter vi har brug for fremadrettet

	let behandlinger;
    let cat;

    const url = "http://charlievinther.dk/fornyedefoedder/wp-json/wp/v2/behandling?per_page=100";

    console.log("behandlinger");

	//Vi tjekker at vores DOM er loaded og begynder så vores første funktion

    document.addEventListener("DOMContentLoaded", start);

    function start() {
        console.log("start");

		//Her sker der ikke meget, men vi tjekker at vores kode er gået i gang som den skal 
        //ved at udskrive start i konsollen inden vi henter data

        hentData();
    }

	//Vi bruger en asynkron funktion til at fetche vores data så resten af koden kan kører imens

    async function hentData() {
        const respons = await fetch(url);
        behandlinger = await respons.json();

        console.log(behandlinger);

        visBehandlinger();
    }

	//Vi viser produkterne

    function visBehandlinger() {

		//Vi laver en konstant for skabelonen

        const temp = document.querySelector("template").content;

        behandlinger.forEach(e => {
            console.log("forEachBehandlinger");

			//Vi kloner vores skabelon før vi putter informationerne fra objektet ind som vi gerne vil vise

            const klon = temp.cloneNode(true);

			//Variablen "cat" bliver tildelt værdien værdien af det pågældende objekt kategori, angiver herefter destinationen for hvor vi gerne vil vi gerne vil vise det ved at putte værdien af "cat" ind med konkatenering

            cat = e.kategori;
            let dest = document.querySelector("#" + cat + "_container");

            klon.querySelector(".navn").innerHTML = e.navn;
            klon.querySelector(".pris").textContent = e.pris + " Kr";

            console.log(dest);

			//Vi lægger til sidst vores klon en i dens destination

            dest.appendChild(klon);



        });
    }
    </script>

    <script>

	//Her henter vi det library som ligger i vores header så kan give forskellige ting på vores side en parallax

    var rellax = new Rellax('.rellax');
    </script>



</div><!-- #primary -->

<?php
get_footer();