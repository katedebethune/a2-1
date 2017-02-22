<?php
    require_once('phpfile/Tools.php');
    require_once('phpfile/Form.php');
    require_once('phpfile/WorldCountries.php');

    use DWA\Tools;
    use DWA\Form;
    use DWA\WorldCountries;

    $form = new DWA\Form($_GET);

    $region = "";
    $savedRegion= "";
    $selectedPopulation = "choose";
    $selectedLanguage = "choose";
    $selectedCapitalLetter = "";
    $selectedFlag = -1;
    $languageArray = []; // PHP unlink (flags) use
    $uniqueLanguageArray = []; // For HTML Drop-Down use
    $capitalArray = []; // PHP unlink (flags) use
    $populationArray = []; // PHP unlink (flags) use

    $worldCountries = new WorldCountries('jsonfile/countriesRegions.json',
                                         'jsonfile/countriesPopulations.json',
                                         'jsonfile/countriesCapitals.json',
                                         'jsonfile/countriesLanguages.json');
    if($_GET)
    {
        $region = $_GET['region'];
        $selectedFlag = $_GET['selectedFlag'];
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
    // Get the Region's flagOfCountries
    $flagOfCountries = $worldCountries->getFlags()[$region];
    // Get Each Country's Spoken Languages into an array to display as the Language Drop-Down
    $languageOfCountries = $worldCountries->getLanguages();
    foreach ($flagOfCountries["countries"] as $key => $value)
    {
        if (!in_array($languageOfCountries[$value]["language"], $uniqueLanguageArray))
        {
            $uniqueLanguageArray[] = $languageOfCountries[$value]["language"];
        }
        $languageArray[$value] = $languageOfCountries[$value]["language"];
    }
    asort($uniqueLanguageArray);
    // Get Each Country's Capital (only one at this time: South Africa has 3)
    $capitalOfCountries = $worldCountries->getCapitals();
    foreach ($flagOfCountries["countries"] as $key => $value)
    {
        $capitalArray[] = $capitalOfCountries[$value]["capital"];
    }
    // Get Each Country's Population
    $populationOfCountries = $worldCountries->getPopulations();
    foreach ($flagOfCountries["countries"] as $key => $value)
    {
        $populationArray[$value] = $populationOfCountries[$value]["population"];
    }
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
    //Tools::dump($populationOfCountries);
    //Tools::dump($worldCountries->getCapitals());
    //Tools::dump($worldCountries->getLanguages());
    //Tools::dump($_GET); # Output from logic, only for debugging purposes to see the contents of POST
