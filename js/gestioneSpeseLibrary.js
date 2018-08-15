// reset del form di inserimento
function resetForm(form) {
    $(':input', form).each(function() {
        var tipo_di_campo_di_input = this.type;
        if(tipo_di_campo_di_input === 'text'){
            console.log("resetta testo");
            this.value = "";
        }
    });
}
// funzione che ritorna alla index
function tornaAllaIndex(){
    window.location.href = "http://gestionespese.dev.loc";
}
//attivazione datepicker nei form
$(document).ready(function(){
    $('.date').datepicker();
});

// attivazione datatable
$('#gestioneSpese').dataTable();