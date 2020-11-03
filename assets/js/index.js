$(function(){
    $("#animalSpecies").change(function(){
        if($(this).val() == 'Outro')
            $('#animalSpecies-input').show();
        else
            $('#animalSpecies-input').hide();
    });
});

$('select').selectpicker();

$(document).ready(function() {
    $('#multiple-checkboxes').multiselect({
      includeSelectAllOption: true,
    });
});