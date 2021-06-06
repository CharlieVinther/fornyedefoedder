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
    //Vi starter ud med at angive de variabler og konstanter vi har brug for fremadrettet og så henter vi id'et for objektet vi er inde på

    let produkt;
    let produkter;
    let aktueltProdukt = <?php echo get_the_ID() ?>;

    //Vi sætter variablen med objektets id på enden af linket så vi henter JSON specifikt for objektet og ikke hele vores array

    const dbUrl = "https://charlievinther.dk/fornyedefoedder/wp-json/wp/v2/produkt/" + aktueltProdukt;


    const produktUrl = "https://charlievinther.dk/fornyedefoedder/wp-json/wp/v2/produkt?per_page=100";

    const caturl = "https://charlievinther.dk/fornyedefoedder/wp-json/wp/v2/categories/";

    const container = document.querySelector("#produkt");

    //Vi tjekker at vores DOM er loaded og begynder så vores første funktion

    document.addEventListener("DOMContentLoaded", start);

    function start() {
        console.log("start");

        //Her sker der ikke meget, men vi tjekker at vores kode er gået i gang som den skal 
        //ved at udskrive start i konsollen inden vi henter data

        getJSON();
    }

    //Vi bruger en asynkron funktion til at fetche vores data så resten af koden kan kører imens

    async function getJSON() {
        const data = await fetch(dbUrl);
        produkt = await data.json();
        const catrespons = await fetch(caturl);
        categories = await catrespons.json();


        hentData();


    }

    //Vi henter også resten af vores array ind så vi senere kan vise produkter der har de samme kategori(er)

    async function hentData() {
        const respons = await fetch(produktUrl);
        produkter = await respons.json();
        console.log(produkter);
        visProdukt();

    }

    //Herefter går vi igang med at vise informationerne fra objektet

    function visProdukt() {
        console.log("visProdukt");
        document.querySelector(".billede").src = produkt.billede.guid;
        document.querySelector(".navn").textContent = produkt.navn;
        document.querySelector(".beskrivelse").textContent = produkt.beskrivelse;
        document.querySelector(".size").textContent = produkt.size;

        //Vi tilføjer også en brødkrumme sti at kalde på efter objektets første kategori og få dens id, som vi så bruger til at hive kategoriens navn ud og vise i vores brødkrumme sti med objektets navn

        document.querySelector(".bread").textContent = "Produkter / " +
            "<?php echo ''. get_the_category( $id )[0]->name .''?> / " + produkt.navn;
        
        //Vi kører herefter hele vores array igennem en forEach for at kunne vise dem der deler kategori med vores objekt

        produkter.forEach(lignende => {
            console.log("forEachProdukt");

            //Vi angiver vores skabelon og destination som konstanter

            const dest = document.querySelector("#lignendeliste");
            const temp = document.querySelector("template").content;

            //I vores if-statement lukker vi objekter som ikke har det samme id som vores hoved objekt for ikke også at vise det her, og om det indeholde en kategori som matcher med vores hoved objekt

            if (lignende.id != produkt.id && lignende.categories.includes(parseInt(produkt.categories))) {

                console.log("IF");

                //Vi kloner vores skabelon før vi putter informationerne fra vores objekt ind i skabelonen

                const klon = temp.cloneNode(true);

                klon.querySelector(".produktbillede").src = lignende.billede.guid;
                klon.querySelector(".lignendenavn").textContent = lignende.navn;
                klon.querySelector(".lignendesize").textContent = lignende.size;

                //Vi tildeler vores skabelon en eventListener så linker videre til objektets single view før vi til sidst viser den i destinationen

                klon.querySelector("#lignende_container").addEventListener("click", () => location.href =
                    lignende
                    .link);

                dest.appendChild(klon);
                
            }
        });

    }
    </script>
</div>
<!-- #primary -->

<?php
get_footer();