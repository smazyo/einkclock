<?php ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content= "width=device-width, initial-scale=1.0"> 

    <style>
        body {
            margin: 0px;
            background-color: blue;
            image-rendering: pixelated;
        }

        .content {
            width: 250px;
            height: 122px;
            outline: 2px dashed red;
            background-color: white;
        }

        .pokemon {
            position: absolute;
            top: 0;
            left: 0;
            transform: translate(100px, -40px);
            z-index: 12;
        }

        .innerline {
            width: 250px;
            height: 122px;

        }

        .line1 {
            width: 230px;
            height: 102px;
            border: 6px solid black;

            /* margin gets eaten by border. so 10px minus border size here */
            margin: 4px;
            position: absolute;
            z-index: 1;
        }

        .line2 {
            width: 218px;
            height: 90px;
            border: 2px solid black;

            /* margin gets eaten by border. so 10px minus border size here */
            margin: 14px;
            position: absolute;

            z-index: 5;
        }

        .checkerboard-background {
            background-image: linear-gradient(45deg, black 25%, transparent 25%), linear-gradient(-45deg, black 25%, transparent 25%), linear-gradient(45deg, transparent 75%, black 75%), linear-gradient(-45deg, transparent 75%, black 75%);
            background-size: 20px 20px;
            background-position: 0 0, 0 10px, 10px -10px, -10px 0px;
        }

        .star-background {
            background: url('star-bck.png');
        }

        .white-background {
            background: white;
        }

        .white-outline {
            --outline:  drop-shadow(2px 0px 0 white) 
                        drop-shadow(0px 2px 0 white) 
                        drop-shadow(-2px -0px 0 white) 
                        drop-shadow(-0px -2px 0 white);

            -webkit-filter: var(--outline);
            filter: var(--outline);
        }

        .time {
            position: absolute;
            top: 7px;
            left: 16px;
            font-size: 16px;
            font-family: sans-serif;
            z-index: 10;
        }

        .time-eu {
            top: 0px;
        }

        .time-ca {
            top: 16px;
        }

        .time-ph {
            top: 32px;
        }

        h1.time-main {
            position: absolute;
            top: 7px;
            left: 7px;
            font-size: 64px;
            font-family: sans-serif;

        }

        .country-name {
            font-size: 10px;
        }

        .fact-block {
            position: absolute;
            top: 9px;
            left: 10px;
            font-size: 4px;
            /* outline: 1px solid red; */
            width: 230px;
            height: 102px;
            overflow-y: clip;
            text-align: justify;
            z-index: 1;
            font-family: monospace;
            font-style: italic;
        }

        .guardian-1 {
            position: absolute;
            width: calc(100vw - 250px);
            height: 100vh;
            right: 0;
            top: 0;
            z-index: 200;
            background-color: black;
        }
        .guardian-2 {
            position: absolute;
            width: 100vw;
            height: calc(100vh - 122px);
            left: 0;
            bottom: 0;
            z-index: 200;
            background-color: black;
        }
    </style>

    <?php
        $pokemon_dir = 'cropped';
        $all_pokemon = scandir($pokemon_dir);
        $sel_index = rand(0, count($all_pokemon));
        $pokemon_image = $all_pokemon[$sel_index];

        function formattedTimeTz($tz) {
            $dt = new DateTime("now", new DateTimeZone($tz));
            $dt->setTimestamp(time());

            $hh = $dt->format('h');
            $m = substr($dt->format('i'), 0, 1);
            $a = substr($dt->format('A'), 0, 1);
            return $hh.":".$m.'X'.$a;
        }

        $aust_time = formattedTimeTz("Australia/Sydney");
        $eur_time = formattedTimeTz("Europe/Rome");
        $can_time = formattedTimeTz("America/Toronto");
        $pil_time = formattedTimeTz("Asia/Manila");
    ?>

    <script>
        console.log("<?php echo($pokemon_image)?>");
    </script>
</head>



<body>
    <div class="content">
        <div class="innerline">
            <div class="line1 white-background"></div>


            <div class="fact-block">
                What time is it? What time is What time is it? What time is it? What time is it? What time is it?<br/>
                What time is it? What time is What time is it? What time is it? What time is it? What time is it?<br/>
                What time is it? What time is What time is it? What time is it? What time is it? What time is it?<br/>
                What time is it? What time is What time is it? What time is it? What time is it? What time is it?<br/>
                What time is it? What time is What time is it? What time is it? What time is it? What time is it?<br/>
                What time is it? What time is What time is it? What time is it? What time is it? What time is it?<br/>
                What time is it? What time is What time is it? What time is it? What time is it? What time is it?<br/>
                What time is it? What time is What time is it? What time is it? What time is it? What time is it?<br/>
                What time is it? What time is What time is it? What time is it? What time is it? What time is it?<br/>
                What time is it? What time is What time is it? What time is it? What time is it? What time is it?<br/>
                What time is it? What time is What time is it? What time is it? What time is it? What time is it?<br/>
                What time is it? What time is What time is it? What time is it? What time is it? What time is it?<br/>
                What time is it? What time is What time is it? What time is it? What time is it? What time is it?<br/>
                What time is it? What time is What time is it? What time is it? What time is it? What time is it?<br/>
                What time is it? What time is What time is it? What time is it? What time is it? What time is it?<br/>
            </div>

            <div class="line2 white-background"></div>
        </div>

        <h2 class="time time-eu white-outline"><?php echo($eur_time); ?>M <span class="country-name">EU</span></h2>
        <h2 class="time time-ca white-outline"><?php echo($can_time); ?>M <span class="country-name">CANADA</span></h2>
        <h2 class="time time-ph white-outline"><?php echo($pil_time); ?>M <span class="country-name">PHILIPPINES</span></h2>

        <h1 class="time time-main white-outline"><?php echo($aust_time); ?></h1>
        
        <div class="pokemon white-outline">
            <img src=<?php echo('"cropped/' . $pokemon_image . '"');?>>
        </div>
s
    </div>

    <div class="guardian-1"></div>
    <div class="guardian-2"></div>

</body>