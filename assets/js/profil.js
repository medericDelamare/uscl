import $ from "jquery";

$(document).ready(function(){
    $('.counter').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 2000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

    var ctx = document.getElementById("my-chart-profil").getContext('2d');
    var vnd = $("#my-chart-profil").data('vnd');
    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: vnd,
                backgroundColor: ['#b5e7a0', '#ffef96', '#eca1a6']
            }],
            labels: ['Victoires', 'Nuls', 'Défaites'],
        },
    });
});