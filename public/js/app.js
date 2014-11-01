//Datepicker
$(function() {
    $( ".date" ).datepicker({
        showWeek: true,
        dateFormat: 'yy-mm-dd',
        dayNamesShort: $.datepicker.regional.de.dayNamesShort,
        dayNames: $.datepicker.regional.de.dayNames,
        monthNamesShort: $.datepicker.regional.de.monthNamesShort,
        monthNames: $.datepicker.regional.de.monthNames,
        firstDay: 1
    });
});

//Tabs für die Adminseite
$(function()
{
    //Register tabs on element#tabs
    $('#tabs').tabs
    ({
        active: sessionStorage['tabs'], //read from local storage, event activated onLoad
        activate: function(event,ui) //Activated whenever you switch tabs
        {
            sessionStorage[''+this.id]=(ui.newPanel.index()-1); //Create new local storage or saving the tab's index to it
        }
    });
});

//Accordion-Nav für die Hauptseite
$(function() {
    $( "#accordion" ).accordion();
});