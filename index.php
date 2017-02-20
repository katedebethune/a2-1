<?php
    require_once('phpfiles/Tools.php');
    require_once('phpfiles/Form.php');
    require_once('phpfiles/WorldCountries.php');

    use DWA\Tools;
    use DWA\Form;
    use DWA\WorldCountries;

    $region = "";
    $savedRegion= "";
    $selectedPopulation = "choose";

    /*
         Without Ajax, using Sumbit Action PHP call reretrieves the data each time (no need).
         I also emulated Radio and Drop-down selection button events to trigger the submit button
         and I define my counters as hidden input fields.
         Version II should be easier if Ajax is used
        */

    $worldCountries = new WorldCountries('jsonFiles/countriesRegions.json', 'jsonFiles/countriesPopulations.json');
    if($_GET)
    {
        $region = $_GET['region'];
        $savedRegion = $_GET['savedRegion'];
        $selectedPopulation = $_GET['population'];
        if ($savedRegion != $region)
        {
            $savedRegion = $region;
        }
    }
    else
    {
        $region = 'Africa'; // Default start up Region
        $savedRegion = 'Africa';
    }
    $flagOfCountries = $worldCountries->getFlags()[$region];
    $titleSeq = 0;
    $howManyFlags= count($flagOfCountries['countries']);

    //Tools::dump($flagOfCountries);
    //Tools::dump($worldCountries->getPopulations());
    // Tools::dump($_GET); # Output from logic, only for debugging purposes to see the contents of POST
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <!-- Head: meta, title, link, script statements -->
        <!-- require_once("phpfiles/includes/headTags.php") -->
        <?php require_once("phpfiles/includes/headTags.php"); ?>

    </head>

    <body>

        <header>

            <!-- Header: Top Home Page, allways the same -->
            <!-- require_once("phpfiles/includes/siteHeader.php") -->
            <?php require_once("phpfiles/includes/siteHeader.php"); ?>

        </header>

        <div id="rowID" class="row myInfoPage">

            <!-- Flag Selection Module -->
            <!-- require_once("phpfiles/includes/myInfoModule.php") -->
            <?php require_once("phpfiles/includes/myInfoModule.php"); ?>

        </div>
        <!-- End of row -->

    </body>

</html>
