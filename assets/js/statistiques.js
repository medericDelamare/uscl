import $ from "jquery";

$(document).ready(function(){
    var equipeId = $( "#selectEquipe" ).val();
    var categorie = $("#selectEquipe").data('competition-id');
    var getUrl = window.location;
    var baseUrl = getUrl.protocol + "//" + getUrl.host + "/";
    var route = baseUrl + 'get-calendrier-par-equipe/';
    $(document).ready( function () {
        $('#loaderCalendrier').show();
        refreshClassement(route, equipeId, categorie);
        $('#selectEquipe').change(function () {
            $('#loaderCalendrier').addClass('d-flex').removeClass('d-none');
            equipeId = $( "#selectEquipe" ).val();
            refreshClassement(route, equipeId,categorie);
        })
        function refreshClassement(route, equipeCourante, categorie){
            $.ajax({
                url: route + equipeCourante + '/' + categorie,
                type: "GET",
                success: function(data){
                    $('#loaderCalendrier').removeClass('d-flex');
                    $('#loaderCalendrier').addClass('d-none');
                    $("#resultAjaxCalendrier").html(data);
                }
            });
        }
    });
});