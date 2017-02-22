/* window loaded: add the events and run the initial jobs */

window.onload = function() {windowLoaded()};

function windowLoaded()
{
    /* Window is loaded, time to add the Events */
    // How many Flags in <div id="flags"
    numberOfFlags = document.getElementById("flags").getElementsByTagName("img").length;
    /*
        A Radio Button or A Select/Option change occured, add the events to trigger Submit Button click
    */
    // Regions
    document.getElementById("africa").onchange = function(event) {
        resetSelectionValues();
        triggerAMouseEvent("submitButton");
    };
    document.getElementById("asia").onchange = function(event) {
        resetSelectionValues();
        triggerAMouseEvent("submitButton");
    };
    document.getElementById("europe").onchange = function(event) {
        resetSelectionValues();
        triggerAMouseEvent("submitButton");
    };
    document.getElementById("northAmerica").onchange = function(event) {
        resetSelectionValues();
        triggerAMouseEvent("submitButton");
    };
    document.getElementById("oceania").onchange = function(event) {
        resetSelectionValues();
        triggerAMouseEvent("submitButton");
    };
    document.getElementById("southAmerica").onchange = function(event) {
        resetSelectionValues();
        triggerAMouseEvent("submitButton");
    };
    // Population
    document.getElementById("population").onchange = function(event) { triggerAMouseEvent("submitButton"); };
    // Language
    document.getElementById("language").onchange = function(event) { triggerAMouseEvent("submitButton"); };
    // Capital City one character is entered, add the events to trigger Submit Button click
    document.getElementById("capital").onkeyup = function(event)
    {
        if (document.getElementById("capital").value.length > 1)
        {
            document.getElementById("capital").value = document.getElementById("capital").value.substring(0, 1);
        }
        else if (event.which >= 65 && event.which <= 90 || event.which >= 97 && event.which <= 122)
        {
            triggerAMouseEvent("submitButton");
        }
        else
        {
            document.getElementById("capital").value = "";
        }
    };
    // When a Flag is Clicked, will be Selected: Bigger Size and Framed
    while (loopNumber < numberOfFlags)
    {
        document.getElementById("flag"+loopNumber).onclick = function(event)
        {
            selectAFlag(event);
        }
        loopNumber++;
    }
    /*
       Rules Button Click event
    */
    document.getElementById("rulesButton").onclick = function(event) {
        alert("\nSelected Region's Country Flags will be displayed.\n" +
              "Africa, the first region is checked to start with.\n\n" +
              "The goal is to filter the Flags up until Only One Left\n" +
              "The number of the Property selections will determin the final Score.\n\n" +
              "Whenever there are less than 6 Flags left, the Country Names will be displayed in the Status area.\n" +
              "Either keep filtering to the last Flag or choose one as the final answer (guessing).\n\n");
    }
}
