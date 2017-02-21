<?php

namespace DWA;

class WorldCountries {

    /**
    	* Properties
      */
    private $flags;
    private $populations;
    private $capitals;
    private $languages;


    /**
	    *  Each (6) Region and the Countries in it (array)
	    */
    public function __construct($jsonFlagsFile, $jsonPopulationsFile, $jsonCapitalsFile, $jsonLanguagesFile) {

        /* get the flags of the countries */
        $this->flags = json_decode(file_get_contents($jsonFlagsFile) , true);

        /* get the populations of the countries */
        $this->populations = json_decode(file_get_contents($jsonPopulationsFile) , true);

        /* get the capitals of the countries */
        $this->capitals = json_decode(file_get_contents($jsonCapitalsFile) , true);

        /* get the languages of the countries */
        $this->languages = json_decode(file_get_contents($jsonLanguagesFile) , true);
    }

    /**
	    * Getter for $flags property
	    */
    public function getFlags() {
        return $this->flags;
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

    /**
      * Getter for $languages property
	    */
    public function getLanguages() {
        return $this->languages;
    }

} # end of class
