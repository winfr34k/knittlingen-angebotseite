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

//DataTables für die Hauptseite
$(document).ready(function() {
    $('#offers').dataTable( {
        "language": {
            "sEmptyTable":      "Keine Daten in der Tabelle vorhanden",
                "sInfo":            "_START_ bis _END_ von _TOTAL_ Einträgen",
                "sInfoEmpty":       "0 bis 0 von 0 Einträgen",
                "sInfoFiltered":    "(gefiltert von _MAX_ Einträgen)",
                "sInfoPostFix":     "",
                "sInfoThousands":   ".",
                "sLengthMenu":      "_MENU_ Einträge anzeigen",
                "sLoadingRecords":  "Wird geladen...",
                "sProcessing":      "Bitte warten...",
                "sSearch":          "Suchen",
                "sZeroRecords":     "Keine Einträge vorhanden.",
                "oPaginate": {
                "sFirst":       "Erste",
                    "sPrevious":    "Zurück",
                    "sNext":        "Nächste",
                    "sLast":        "Letzte"
            },
            "oAria": {
                "sSortAscending":  ": aktivieren, um Spalte aufsteigend zu sortieren",
                    "sSortDescending": ": aktivieren, um Spalte absteigend zu sortieren"
            }
        }
    } );
} );