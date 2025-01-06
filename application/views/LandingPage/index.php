<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SIMRS ITM</title>
    <link href="<?= base_url(); ?>assets/tailwind/output.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/fontawesome/css/font-awesome.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/fontawesome/css/font-awesome.min.css" />
</head>

<body class="bg-base">

    <div id="nav"
        class="flex content-center justify-between w-full h-auto px-8 py-8 md:px-16 lg:px-24 text-second font-raleway"
        onclick="location.href='#';" style="cursor: pointer">
        <div class="flex w-auto h-auto space-x-2 transition-all hover:opacity-100 opacity-60">
            <h5 class="text-head5 font-[800]">SIMRS</h5>
            <h5 class="text-head5 font-[700]">Techno Medic</h5>
        </div>
        <div class="flex w-auto h-auto transition-all hover:opacity-100 opacity-60">
            <h1 class="px-1 navbar-brand navbar-brand-autodark">
                <a href=".">
                    <i class="fa fa-search "></i>
                </a>
            </h1>
        </div>
    </div>

    <div id="hero"
        class="flex-col content-center justify-center w-full h-auto p-8 bg-center bg-cover bg-white/5 md:p-16 lg:p-24 text-second font-raleway"
        style="background-image: url(<?= base_url(); ?>/assets/tailwind/img/Wireframe.png)">
        <div class="flex w-full h-40">
            <img class="object-contain w-full h-full" src="<?= base_url(); ?>/assets/tailwind/img/logoitm.png" alt="">
        </div>
        <div class="flex-col content-center justify-center w-full h-auto py-8 space-y-8 text-center">
            <div class="flex-col content-center justify-start w-full h-auto space-y-2">
                <h5 class="text-head5 md:text-head4 lg:text-hero font-[900]">Dokumentasi SIMRS Indo Techno Medic</h5>
                <p class="text-p md:text-head6 lg:text-head5 font-[400] opacity-80">Lorem ipsum dolor sit amet,
                    consectetur adipiscing
                    elit</p>
            </div>
            <div class="flex content-center justify-center w-auto h-auto ">
                <div class="w-auto h-auto px-6 py-4 text-center transition-all border-4 rounded-full border-accent bg-accent text-second font-raleway hover:bg-accent/80 hover:border-4 hover:border-second"
                    onclick="location.href='<?= base_url(); ?>SIMRS/?theme=dark';" style="cursor: pointer">
                    <p class="text-p md:text-head6 lg:text-head5 font-[700]">Loremipsun</p>
                </div>
            </div>
        </div>
    </div>

    <div
        class="grid grid-cols-1 grid-rows-6 gap-12 p-8 md:gap-16 lg: md:p-16 lg:p-24 md:grid-cols-3 md:grid-rows-2 font-raleway">
        <div class="flex-col w-full h-auto space-y-2 font-raleway group" onclick="location.href='#';"
            style="cursor: pointer">
            <div class="w-full h-auto text-center text-accent/80 fontra ">
                <h6
                    class="group-hover:text-accent/100 text-head6 font-[700] md:text-head5 lg:text-head4 transition-all">
                    Lorem Ipsum
                </h6>
            </div>
            <div class="w-full h-auto text-center transition-all delay-100 text-second/60 group-hover:text-second/100">
                <p class="text-psmall font-[200] md:text-p lg:text-head6">Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit, sed
                    do tempor
                    incididunt ut </p>
            </div>
        </div>
        <div class="flex-col w-full h-auto space-y-2 font-raleway group" onclick="location.href='#';"
            style="cursor: pointer">
            <div class="w-full h-auto text-center text-accent/80 fontra ">
                <h6
                    class="group-hover:text-accent/100 text-head6 font-[700] md:text-head5 lg:text-head4 transition-all">
                    Lorem Ipsum
                </h6>
            </div>
            <div class="w-full h-auto text-center transition-all delay-100 text-second/60 group-hover:text-second/100">
                <p class="text-psmall font-[200] md:text-p lg:text-head6">Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit, sed
                    do tempor
                    incididunt ut </p>
            </div>
        </div>
        <div class="flex-col w-full h-auto space-y-2 font-raleway group" onclick="location.href='#';"
            style="cursor: pointer">
            <div class="w-full h-auto text-center text-accent/80 fontra ">
                <h6
                    class="group-hover:text-accent/100 text-head6 font-[700] md:text-head5 lg:text-head4 transition-all">
                    Lorem Ipsum
                </h6>
            </div>
            <div class="w-full h-auto text-center transition-all delay-100 text-second/60 group-hover:text-second/100">
                <p class="text-psmall font-[200] md:text-p lg:text-head6">Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit, sed
                    do tempor
                    incididunt ut </p>
            </div>
        </div>
        <div class="flex-col w-full h-auto space-y-2 font-raleway group" onclick="location.href='#';"
            style="cursor: pointer">
            <div class="w-full h-auto text-center text-accent/80 fontra ">
                <h6
                    class="group-hover:text-accent/100 text-head6 font-[700] md:text-head5 lg:text-head4 transition-all">
                    Lorem Ipsum
                </h6>
            </div>
            <div class="w-full h-auto text-center transition-all delay-100 text-second/60 group-hover:text-second/100">
                <p class="text-psmall font-[200] md:text-p lg:text-head6">Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit, sed
                    do tempor
                    incididunt ut </p>
            </div>
        </div>
        <div class="flex-col w-full h-auto space-y-2 font-raleway group" onclick="location.href='#';"
            style="cursor: pointer">
            <div class="w-full h-auto text-center text-accent/80 fontra ">
                <h6
                    class="group-hover:text-accent/100 text-head6 font-[700] md:text-head5 lg:text-head4 transition-all">
                    Lorem Ipsum
                </h6>
            </div>
            <div class="w-full h-auto text-center transition-all delay-100 text-second/60 group-hover:text-second/100">
                <p class="text-psmall font-[200] md:text-p lg:text-head6">Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit, sed
                    do tempor
                    incididunt ut </p>
            </div>
        </div>
        <div class="flex-col w-full h-auto space-y-2 font-raleway group" onclick="location.href='#';"
            style="cursor: pointer">
            <div class="w-full h-auto text-center text-accent/80 fontra ">
                <h6
                    class="group-hover:text-accent/100 text-head6 font-[700] md:text-head5 lg:text-head4 transition-all">
                    Lorem Ipsum
                </h6>
            </div>
            <div class="w-full h-auto text-center transition-all delay-100 text-second/60 group-hover:text-second/100">
                <p class="text-psmall font-[200] md:text-p lg:text-head6">Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit, sed
                    do tempor
                    incididunt ut </p>
            </div>
        </div>

    </div>

    <div class="w-full h-auto p-8 border-t-2 md:px-16 lg:px-24 border-second/20 text-second/50">
        <div class="flex content-center justify-between font-raleway">
            <p class="text-start text-psmall md:text-p font-[200]">Copyright 2024 Lorem</p>
            <p class="text-end text-psmall md:text-p font-[200]">PT Indo Techno Medic</p>
        </div>
    </div>

</body>

</html>