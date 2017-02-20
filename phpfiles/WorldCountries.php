<?php

namespace DWA;

class WorldCountries {

    /**
	* Properties
	*/
    private $flags;
    private $countriesAfrica;
    private $countriesAsia;
    private $countriesEurope;
    private $countriesNorthAmerica;
    private $countriesOceania;
    private $countriesSouthAmerica;
    private $populations;
    private $capitals;


    /**
	* a Flag and the country (array)
	*/
    public function __construct($jsonFlagsFile, $jsonPopulationFile) {

        /* get the flags for the countries */
        $this->flags = json_decode(file_get_contents($jsonFlagsFile) , true);

        /* retrieve each region's countries from flags */

        /* get the populations for the countries */
        $this->populations = json_decode(file_get_contents($jsonPopulationFile) , true);

        /* get the capitals for the countries
        $dataJson = file_get_contents('countriesLanguages.csv');
        $this->capitals = json_decode($dataJson , true);
        */
    }

    /**
	* Getter for $flags property
	*/
    public function getFlags() {
        return $this->flags;
    }

    /**
	* Getter for $continents property
	*/
    public function getContinents() {
        return $this->continents;
    }


    /**
	* Getter for $populations property
	*/
    public function getPopulations() {
        return $this->populations;
    }


    /**
	* Getter for $capitals property
	*/
    public function getCapitals() {
        return $this->capitals;
    }

} # end of class
