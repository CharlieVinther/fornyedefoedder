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
    <main id="main" class="site-main info_fodder">

        <div id="main_container">
            <div id="splash_section">
                <h1>
                    Info om fødder
                </h1>
            </div>
            <section id="second_section">
                <div class="container dropdown">

                    <button class="btn" style="border-left:1px solid navy">
                        Filtrer
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <nav id="filtrering">
                        <button data-info="alle" class="valgt filter">Alle</button>
                    </nav>
                </div>
            </section>
            <section id="first_section">
                <div class="container">
                    <div id="info_loop">
                    </div>
                </div>
            </section>
        </div>
    </main><!-- #main -->
    <template>
        <article>
            <img src="" alt="" class="illu">
            <h3 class="titel"></h3>
            <div class="info_grid">
                <p class="kilde"></p>
                <button>Læs mere</button>
            </div>
        </article>
    </template>


    <script>
    //Vi starter ud med at angive de variabler og konstanter vi har brug for fremadrettet

    let infoer;
    let categories;
    let filter = "alle";

    const url = "https://charlievinther.dk/fornyedefoedder/wp-json/wp/v2/info?per_page=100";
    const caturl = "https://charlievinther.dk/fornyedefoedder/wp-json/wp/v2/categories/";

    console.log("info")

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
        infoer = await respons.json();
        const catrespons = await fetch(caturl);
        categories = await catrespons.json();

        //Vi udskriver vores array i konsolen for at sikrer os at det hele er med

        console.log(infoer);
        opretKnapper();
        visInfo();
    }

//Vi opretter knapper som skal bruges til at kunne filtrer vores data i kategorier

    function opretKnapper() {
        console.log("opretKnapper")

         //Vi bruger forEach så at hver objekt i vores array får den samme behandling

        categories.forEach(cat => {

            //Vi bruger vores if-statement til at sørge for at det kun er de kategorier der hører til produkter vi arbejder med

            if (cat.id > 11) {

                //Med en string-literal tilføjer vi HTML til vores DOM
                //I det her tilfælde er det en knap som tilføjer vi kategorien til data sættet produkter med dets id og putter dens name som tekst i knappen

                document.querySelector("#filtrering").innerHTML +=
                    `<button class="filter" data-info="${cat.id}">${cat.name}</button>`
                addEventListenerToButton();

            }
        })

    }

    //Vi tilføjer en eventListener til vores knapper med forEach

    function addEventListenerToButton() {
        console.log("button");
        document.querySelectorAll(".filter").forEach(knap => {
            knap.addEventListener("click", filtrerInfo);
        })
    }

    //Vi giver vores filter variable værdien af knappens givende værdi fra vores data sæt
    //Her efter herefter fjerner vi klassen "valgt" fra knapper der ikke er trykket på og giver det til den der er blevet trykket på

    function filtrerInfo() {
        filter = this.dataset.info;
        console.log("filtrerInfo")
        document.querySelector(".valgt").classList.remove("valgt");
        this.classList.add("valgt");
        visInfo();
    }

    //Herefter går vi igang med at filtrere og vise produkterne på siden

    function visInfo() {
        console.log("visInfo");

        //Vi angiver vores skabelon og destination som konstanter og tømmer destinationen

        const temp = document.querySelector("template").content;
        const dest = document.querySelector("#info_loop");

        dest.textContent = "";

        infoer.forEach(info => {
            console.log("forEach");

            //I vores if-statement siger at hver objekt i vores array skal ind hvis der er trykket på alle knappen så at filter har værdien "alle" eller hvis dets tildelte kategori(er) indeholder den samme værdi som den data der der tildelt filter
            //parseInt sørger for at værdierne bliver opfattet som heltal og ikke en string

            if (filter == "alle" || info.categories.includes(parseInt(filter))) {

                console.log("IF");

                //Vi kloner vores skabelon før vi putter informationerne fra vores objekt ind i skabelonen

                const klon = temp.cloneNode(true);

                klon.querySelector(".titel").innerHTML = info.titel;
                klon.querySelector("img").src = info.illu.guid;
                klon.querySelector(".kilde").innerHTML = info.kilde;

                //Vi tildeler vores skabelon en eventListener så linker videre til objektets single view før vi til sidst viser den i destinationen

                klon.querySelector("button").addEventListener("click", () => location.href = info.link);

                dest.appendChild(klon);

            }

        });

    }
    </script>

</div><!-- #primary -->

<?php
get_footer();