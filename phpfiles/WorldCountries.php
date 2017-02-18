<?php

namespace DWA;

class WorldCountries {

    /**
	* Properties
	*/
    private $flags;
    private $continents;
    private $populations;
    private $capitals;


    /**
	* a Flag and the country (array)
	*/
    public function __construct() {

        /* get the flags for the countries */
        $dataJson = file_get_contents($jsonFlags);
        $this->flags = json_decode($dataJson , true);

        /* get the continents for the countries */
        $dataJson = file_get_contents($jsonContinents);
        $this->$continents= json_decode($dataJson , true);

        /* get the populations for the countries */
        $dataJson = file_get_contents($jsonPopulations);
        $this->$populations= json_decode($dataJson , true);

        /* get the capitals for the countries */
        $dataJson = file_get_contents($jsonCapitals);
        $this->$capitals= json_decode($dataJson , true);

    }

    /**
	* Getter for $flags property
	*/
    public function getFlags() {
        return $this->$flags;
    }

    /**
	* Getter for $continents property
	*/
    public function getContinents() {
        return $this->$continents;
    }


    /**
	* Getter for $populations property
	*/
    public function getPopulations() {
        return $this->$populations;
    }


    /**
	* Getter for $capitals property
	*/
    public function getCapitals() {
        return $this->$capitals;
    }

} # end of class
