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
    <main id="main" class="site-main produkter">

        <div id="main_container">

            <section id="splash_section">
                <h1>Produkter</h1>
            </section>
            <section id="first_section">
                <div class="container">

                    <article>
                        <h2>Forebyggelse hjemmefra</h2>
                        <p>Her er en oversigt over de mærker og produkter jeg tilbyder i min klinik.<br />
                            Bestil en tid, så kan vi snakke ydeligere om hvilke produkter der passer til lige dine
                            fødder.</p>

                    </article>
                    <div class="brandlogo">
                        <img src="http://charlievinther.dk/fornyedefoedder/wp-content/uploads/2021/06/allpresan.png"
                            alt="" class="brand1">
                        <img src="http://charlievinther.dk/fornyedefoedder/wp-content/uploads/2021/06/allpremed.png"
                            alt="" class="brand2">
                        <img src="http://charlievinther.dk/fornyedefoedder/wp-content/uploads/2021/06/tree.png" alt=""
                            class="brand3">
                    </div>
                </div>
            </section>

            <section id="second_section">
                <div class="container dropdown">

                    <button class="btn" style="border-left:1px solid navy">
                        Filtrer
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <nav id="filtrering">
                        <button data-produkter="alle" class="valgt filter">Alle produkter</button>
                    </nav>
                </div>

            </section>

            <div class="container">
                <section id="produktliste">

                </section>
            </div>

            <section id="third_section">
                <div class="container">
                    <img src="" alt="" class="billede">
                    <h2 class="billedetitel"></h2>
                    <p class="billedetekst"></p>
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
                            Formthotics er indlæg som jeg speciallaver i klinikken til netop dine fødder, det gøres ved
                            at
                            opvarme indlægget og forme det efter din sko og fod, så du er sikret den rette støtte til
                            lige
                            netop dine fødder.
                        </p>
                    </div>
                </div>
            </section>
            <section id="section_four" class="grid info">
                <div class="container">
                    <div class="col">
                        <h2 class="info_om_fodsygdomme">Info om fodsygdomme</h2>
                        <p class="tekst_om_fodsygdomme">Mange patienter er usikre omkring deres fødder og får derfor
                            ikke set en
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

    </main><!-- #main -->

    <template>
        <article id="produkt_container">
            <img src="" alt="" class="produktbillede">
            <h3 class="navn"></h3>
            <p class="size"></p>
        </article>
    </template>

    <script>

    //Vi starter ud med at angive de variabler og konstanter vi har brug for fremadrettet

    let produkter;
    let categories;
    let filter = "alle";

    console.log("produkter");

    const url = "https://charlievinther.dk/fornyedefoedder/wp-json/wp/v2/produkt?per_page=100";
    const caturl = "https://charlievinther.dk/fornyedefoedder/wp-json/wp/v2/categories/";

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
        const catrespons = await fetch(caturl);
        produkter = await respons.json();
        categories = await catrespons.json();

        //Vi udskriver vores array i konsolen for at sikrer os at det hele er med

        console.log(produkter);
        console.log(categories);
        visProdukter();
        opretKnapper();
    }

    //Vi opretter knapper som skal bruges til at kunne filtrer vores data i kategorier

    function opretKnapper() {
        console.log("opretKnapper");

        //Vi bruger forEach så at hver objekt i vores array får den samme behandling

        categories.forEach(cat => {

            //Vi bruger vores if-statement til at sørge for at det kun er de kategorier der hører til produkter vi arbejder med

            if (cat.id <= 11) {

                //Med en string-literal tilføjer vi HTML til vores DOM
                //I det her tilfælde er det en knap som tilføjer vi kategorien til data sættet produkter med dets id og putter dens name som tekst i knappen

                document.querySelector("#filtrering").innerHTML +=
                    `<button class="filter" data-produkter="${cat.id}">${cat.name}</button>`;
                addEventListenerToButton();

            }
        });

    }

    //Vi tilføjer en eventListener til vores knapper med forEach

    function addEventListenerToButton() {
        console.log("button");
        document.querySelectorAll(".filter").forEach(knap => {
            knap.addEventListener("click", filtrerProdukter);
        });
    }

    //Vi giver vores filter variable værdien af knappens givende værdi fra vores data sæt
    //Her efter herefter fjerner vi klassen "valgt" fra knapper der ikke er trykket på og giver det til den der er blevet trykket på

    function filtrerProdukter() {
        filter = this.dataset.produkter;
        console.log("filtrerProdukter", filter);
        document.querySelector(".valgt").classList.remove("valgt");
        this.classList.add("valgt");
        visProdukter();
    }

    //Herefter går vi igang med at filtrere og vise produkterne på siden

    function visProdukter() {
        console.log("visProdukter");

        //Vi angiver vores skabelon og destination som konstanter og tømmer destinationen

        const dest = document.querySelector("#produktliste");
        const temp = document.querySelector("template").content;

        dest.textContent = "";

        produkter.forEach(produkt => {
            console.log("forEachProdukter");

            //I vores if-statement siger at hver objekt i vores array skal ind hvis der er trykket på alle knappen så at filter har værdien "alle" eller hvis dets tildelte kategori(er) indeholder den samme værdi som den data der der tildelt filter
            //parseInt sørger for at værdierne bliver opfattet som heltal og ikke en string

            if (filter == "alle" || produkt.categories.includes(parseInt(filter))) {

                console.log("IF");

                //Vi kloner vores skabelon før vi putter informationerne fra vores objekt ind i skabelonen

                const klon = temp.cloneNode(true);

                klon.querySelector(".produktbillede").src = produkt.billede.guid;
                klon.querySelector(".navn").textContent = produkt.navn;
                klon.querySelector(".size").textContent = produkt.size;

                //Vi tildeler vores skabelon en eventListener så linker videre til objektets single view før vi til sidst viser den i destinationen

                klon.querySelector("#produkt_container").addEventListener("click", () => location.href = produkt
                    .link);

                dest.appendChild(klon);
            }
        });


    }
    </script>

</div><!-- #primary -->

<?php
get_footer();