<?php
    require_once('phpfiles/Tools.php');
    require_once('phpfiles/Form.php');
    require_once('phpfiles/WorldCountries.php');

    use DWA\Tools;
    use DWA\Form;
    use DWA\WorldCountries;

    $form = new DWA\Form($_GET);

    $region = "";
    $savedRegion= "";
    $selectedPopulation = "choose";
    $selectedLanguage = "choose";
    $selectedCapitalLetter = "";

    $worldCountries = new WorldCountries('jsonfiles/countriesRegions.json',
                                         'jsonfiles/countriesPopulations.json',
                                         'jsonfiles/countriesCapitals.json',
                                         'jsonfiles/countriesLanguages.json');
    if($_GET)
    {
        $region = $_GET['region'];
        $savedRegion = $_GET['savedRegion'];
        $selectedPopulation = $_GET['population'];
        $selectedLanguage = $_GET['language'];
        $selectedCapitalLetter = $form->sanitize($_GET['capital']);

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
    // Get Each Country's Spoken Languages into an array to display as the Language Drop-Down
    // get the count of the languages from this array
    /*
        If the Selected Flag's Country is more or less than selected Population
        Display an Error (Score will be adjusted) and Ignore the selection
        Else unlink any Flag from the list (the Population is less or more)
    */
    /*
        If the Selected Flag's Country is not speaking the selected Language
        Display an Error (Score will be adjusted) and Ignore the selection
        Else unlink any Flag from the list (the Language is not spoken)
    */
    /*
        If the Selected Flag's Country Captital is not starting with the selected letter (only one)
        Display an Error (Score will be adjusted) and Ignore the selection
        Else unlink any Flag from the list (the Capital name is not matching the pattern)
    */
    $flagTitleSeq = 0;
    $languateTitleSeq = 0;
    $howManyFlags= count($flagOfCountries['countries']);

    //Tools::dump($flagOfCountries);
    //Tools::dump($worldCountries->getPopulations());
    //Tools::dump($worldCountries->getCapitals());
    //Tools::dump($worldCountries->getLanguages());
    //Tools::dump($_GET); # Output from logic, only for debugging purposes to see the contents of POST
