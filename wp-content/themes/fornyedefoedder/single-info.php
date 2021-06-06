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

    //Vi starter ud med at angive de variabler og konstanter vi har brug for fremadrettet og så henter vi id'et for objektet vi er inde på

    let info;
    let aktueltInfo = <?php echo get_the_ID() ?>;

    //Vi sætter variablen med objektets id på enden af linket så vi henter JSON specifikt for objektet og ikke hele vores array

    const dbUrl = "https://charlievinther.dk/fornyedefoedder/wp-json/wp/v2/info/" + aktueltInfo;



    const caturl = "https://charlievinther.dk/fornyedefoedder/wp-json/wp/v2/categories/";

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
        info = await data.json();
        const catrespons = await fetch(caturl);
        categories = await catrespons.json();

        visInfo();
    }

//Herefter går vi igang med at vise informationerne fra objektet

    function visInfo() {
        console.log("visInfo");
        document.querySelector(".billede").src = info.illu.guid;
        document.querySelector(".navn").textContent = info.titel;
        document.querySelector(".beskrivelse").textContent = info.indhold;
        document.querySelector(".se_mere").href = info.se_mere;
        document.querySelector(".se_mere").textContent = info.kildelink;

        //Vi tilføjer også en brødkrumme sti at kalde på efter objektets første kategori og få dens id, som vi så bruger til at hive kategoriens navn ud og vise i vores brødkrumme sti med objektets navn

        document.querySelector(".bread").textContent = "Info / " +
            "<?php echo ''. get_the_category( $id )[0]->name .''?> / " + info.titel;
       

    }
    </script>
</div>
<!-- #primary -->

<?php
get_footer();