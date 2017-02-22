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
  // if savedFlagId is not null, remove the class; save the flag id as the savedFlagId and add a "the" class
  if (savedFlagId != null)
  {
      document.getElementById(savedFlagId).classList.remove("selectedFlags");
      document.getElementById(savedFlagId).setAttribute("class", "plainFlags");
  }
  document.getElementById(event.target.id).classList.remove("plainFlags");
  document.getElementById(event.target.id).setAttribute("class", "selectedFlags");
  savedFlagId = event.target.id;
}
