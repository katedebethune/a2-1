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
    $selectedCountry = "";
    $countryPopulation = 0;
    $countryCapital = "";
    $languageArray = []; // PHP unlink (flags) use
    $uniqueLanguageArray = []; // For HTML Drop-Down use
    $capitalArray = []; // PHP unlink (flags) use
    $populationArray = []; // PHP unlink (flags) use
    $lessThan6Flags = -1;
    $trialCount = 0;

    $worldCountries = new WorldCountries('jsonfile/countriesRegions.json',
                                         'jsonfile/countriesPopulations.json',
                                         'jsonfile/countriesCapitals.json',
                                         'jsonfile/countriesLanguages.json');
    if($_GET)
    {
        $region = $form->get('region');
        $selectedFlag = $form->get('selectedFlag');
        $savedRegion = $form->get('savedRegion');
        $selectedPopulation = $form->get('population');
        $selectedLanguage = $form->get('language');
        $selectedCapitalLetter = strtoupper($form->sanitize($form->get('capital')));
        $trialCount = $form->get('trialCount');
        $trialCount++; // increment one..

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
    $selectedPopulationError = false;
    if ($selectedFlag != -1 && $selectedPopulation != "choose")
    {
        $selectedCountry = $flagOfCountries['countries'][substr($selectedFlag,4)];
        if (!populationWithInRange($populationOfCountries[$selectedCountry]["population"], $selectedPopulation))
        {
            // This is an error: Incorrect Population Selection...
            $selectedPopulationError = true;
        }
        else
        {
            // Loop to unlink any country does fit into the population criteria
            foreach ($flagOfCountries["countries"] as &$country) :
                if ($country == null)
                {
                    // Do nothing (added here in order not to condition with two negative if statements: !null !equal)
                }
                else if (!populationWithInRange($populationOfCountries[$country]['population'], $selectedPopulation))
                {
                    $country = null;
                }
            endforeach;
            unset($country);
        }
    }
    /*
        If the Selected Flag's Country is not speaking the selected Language
        Display an Error (Score will be adjusted) and Ignore the selection
        Else unlink any Flag from the list (the Language is not spoken)
    */
    $selectedLanguageError = false;
    if ($selectedFlag != -1 && $selectedLanguage != "choose")
    {
        $selectedCountry = $flagOfCountries['countries'][substr($selectedFlag,4)];
        if ($languageOfCountries[$selectedCountry]["language"] != $selectedLanguage)
        {
            // This is an error: Incorrect Language Selection...
            $selectedLanguageError = true;
        }
        else
        {
            // Loop to unlink any country does not speak the selected language
            foreach ($flagOfCountries["countries"] as &$country) :
                if ($country == null)
                {
                    // Do nothing
                }
                else if ($languageOfCountries[$country]['language'] != $selectedLanguage)
                {
                    $country = null;
                }
            endforeach;
            unset($country);
        }
    }
    /*
        If the Selected Flag's Country Captital is not starting with the selected letter (only one)
        Display an Error (Score will be adjusted) and Ignore the selection
        Else unlink any Flag from the list (the Capital name is not matching the pattern)
    */
    $selectedCapitalError = false;
    if ($selectedFlag != -1 && strlen(trim($selectedCapitalLetter)) == 1)  // noth length() but strlen
    {
        $selectedCountry = $flagOfCountries['countries'][substr($selectedFlag,4)]; // not substring but substr
        if (substr($capitalOfCountries[$selectedCountry]["capital"], 0,1) != $selectedCapitalLetter)
        {
            // This is an error: Incorrect Capital Starting Letter Entry...
            $selectedCapitalError = true;
        }
        else
        {
            // Loop to unlink any country does not speak the selected language; skip if alrady is null
            foreach ($flagOfCountries["countries"] as &$country) :
                if ($country == null)
                {
                    // Do nothing
                }
                else if (substr($capitalOfCountries[$country]["capital"], 0,1) != $selectedCapitalLetter)
                {
                    $country = null;
                }
            endforeach;
            unset($country);
        }
    }
    $flagTitleSeq = 0;
    $languateTitleSeq = 0;
    $howManyFlags= count($flagOfCountries['countries']);
    // How many Flags left in the list (excluding the null ones)
    foreach ($flagOfCountries["countries"] as $country) :
        if ($country != null)
        {
            $lessThan6Flags++;
        }
    endforeach;
    // Started with -1
    if ($lessThan6Flags > -1)
    {
        $lessThan6Flags++;
    }
    // If only One Flag: Congratulation, the country is found!
    if ($lessThan6Flags == 1)
    {
        $countryCapital = $capitalOfCountries[$selectedCountry]["capital"];
        $countryPopulation = $populationOfCountries[$selectedCountry]["population"];
        if ($selectedLanguage == "choose")
        {
            $selectedLanguage = $languageOfCountries[$selectedCountry]['language'];
        }
    }
    // Error and Status Panel Configuration
    $statusPanelHTML = "<!-- -->";
    if ($selectedFlag == -1)
    {
        $statusPanelHTML = '<p class="error">Please Select a Flag</p>';
    }
    elseif ($selectedPopulationError)
    {
        $statusPanelHTML = '<p class="error">Selected Flag\'s Country Population does not fit the selected Population Criteria</p>';
    }
    elseif ($selectedLanguageError)
    {
        $statusPanelHTML = '<p class="error">Selected Language is not spoken in the selected Flag\'s Country, please choose another one</p>';
    }
    elseif ($selectedCapitalError)
    {
        $statusPanelHTML = '<p class="error">Selected Flag\'s Country Capital City does not Start with the entered Letter</p>';
    }
    elseif ($lessThan6Flags == 1)
    {
        $statusPanelHTML = '<p class="congratulationPanel "><span class="yellowColor">Congradulation!!!</span> the Country is Found: <span class="yellowColor">' .
                         $selectedCountry . '</span>, Capital: <span class="yellowColor">' . $countryCapital . '</span>, Language: <span class="yellowColor">' .
                         $selectedLanguage . '</span> and Population: <span class="yellowColor">' . $countryPopulation . '</span></p>' .
                         '<p class="scorePanel">Your Score: ' . (100-$trialCount) . '</p>';
    }
    else if ($lessThan6Flags < 6)
    {
      $statusPanelHTML = '<p class="chooseOneLeft"> Remaining Countries <br/>' . getTheCountryNames($flagOfCountries)  . '</p>';
    }

    // is the selected Flag's country's population is within the selected population RangeException
    function populationWithInRange($actualPopulation, $selectedPopulation)
    {
        $minMax = explode(',', $selectedPopulation);

        if (count($minMax) == 1)
        {
            $minMax[0] *= 1000000;
            return ($actualPopulation <= $minMax[0]);
        }
        else
        {
            $minMax[0] *= 1000000;
            $minMax[1] *= 1000000;
            return ($actualPopulation >= $minMax[0] && $actualPopulation <= $minMax[1]);
        }
    }

    function getTheCountryNames($flagOfCountries)
    {
        $leftFlagCountryNames = "";
        foreach ($flagOfCountries["countries"] as $country) :
            if ($country != null)
            {
                $leftFlagCountryNames = $leftFlagCountryNames . '<span class="leftCountries">' . $country . "</span>";
            }
        endforeach;
        return $leftFlagCountryNames;
    }
