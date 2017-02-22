/* window loaded: add the events and run the initial jobs */

window.onload = function() {windowLoaded()};

var numberOfFlags = 0;
var loopNumber = 0;
var savedFlagId = null;

function windowLoaded()
{
    /* Window is loaded, time to add the Events */
    // How many Flags in <div id="flags"
    numberOfFlags = document.getElementById("flags").getElementsByTagName("img").length;
    /*
        If a Flag is Clicked: Make it bigger size with a Border (CSS class)
        Retrieve all the Flags (Page is Loaded for a Region and loop to add onclick (later press enter key)
        In production, the Flags should block any right mouse click to see the Source or Image source
    */

    /*
        A Radio Button or A Select/Option change occured, add the events to trigger Submit Button click
    */
    // Regions
    document.getElementById("africa").onchange = function(event) { triggerAMouseEvent("submitButton"); };
    document.getElementById("asia").onchange = function(event) { triggerAMouseEvent("submitButton"); };
    document.getElementById("europe").onchange = function(event) { triggerAMouseEvent("submitButton"); };
    document.getElementById("northAmerica").onchange = function(event) { triggerAMouseEvent("submitButton"); };
    document.getElementById("oceania").onchange = function(event) { triggerAMouseEvent("submitButton"); };
    document.getElementById("southAmerica").onchange = function(event) { triggerAMouseEvent("submitButton"); };
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
    }
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
       Rules Button Click event: See if $_POST use instead of $_GET will eliminate reload/refresh issues
       This should be a Tab Page to Replace the Flags with the release II
    */
    document.getElementById("rulesButton").onclick = function(event) {
        alert("Selected Region's Country Flags will be displayed.\n\n" +
              "The goal is to filter the Flags up until Only One Left\n" +
              "The number of the Property selections will determin the final Score.\n\n" +
              "Whenever there are less than 6 Flags left, the Country Names will be displayed in the Status area.\n" +
              "Either keep filtering to the last Flag or choose one as the final answer (guessing).\n\n" +
              "To Reset/Reload, Please re-enter a2.mywebbench.com again."
            );
    }
}
