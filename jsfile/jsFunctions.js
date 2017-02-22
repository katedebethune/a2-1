// Trigger a Mouse Event
function triggerAMouseEvent(idName)
{
    // Trigger "idName" Upload's click event... to show file selection dialog...
    var event = new MouseEvent('click', { 'view': window,'bubbles': true,'cancelable': true });
    document.getElementById(idName).dispatchEvent(event);
}

// Position the cursor on this field
function positionCurser(fieldName)
{
    document.getElementById(fieldName).focus();
}

function selectAFlag(event)
{
    // if a flag has a selectedFlags class, remove it: PHP Submit initialize all JS variables
    loopNumber = 0;
    while (loopNumber < numberOfFlags)
    {
        document.getElementById("flag"+loopNumber).classList.remove("selectedFlags");
        document.getElementById("flag"+loopNumber).setAttribute("class", "plainFlags");
        loopNumber++;
    }
    document.getElementById(event.target.id).classList.remove("plainFlags");
    document.getElementById(event.target.id).setAttribute("class", "selectedFlags");
    document.getElementById("savedFlagId").value = event.target.id;
    alert(document.getElementById("savedFlagId").value);
}

function resetSelectionValues()
{
    document.getElementById("savedFlagId").value = -1;
    document.getElementById('population').getElementsByTagName('option')[0].selected = 'selected';
    document.getElementById('language').getElementsByTagName('option')[0].selected = 'selected';
    document.getElementById("capital").value = "";
}
