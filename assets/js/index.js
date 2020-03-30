import $ from 'jquery';
import 'fullcalendar';
import 'fullcalendar/dist/locale/fr';
import Swiper from 'swiper';
import baguetteBox from 'baguettebox.js';
$(document).ready(function(){
    var ctx = document.getElementById("my-chart-index").getContext('2d');
    var annees = $("#my-chart-index").data('annees');
    var nbLicencies = $("#my-chart-index").data('nb-licencies');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: annees,
            datasets: [{
                data: nbLicencies,
                borderWidth: 2,
                backgroundColor: [],
                lineTension: 0.1,
                fill: false,
                borderColor: "rgb(58, 83, 155)"
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Quantité'
                    }
                }],
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Années'
                    }
                }]
            }
        }
    });

    $('#calendar-index').fullCalendar({
        header: false,
        columnFormat: 'dd',
        allDaySlot: false,
        defaultView: 'agendaWeek',
        minTime: '14:00:00',
        maxTime: '21:00:00',
        weekends: false,
        height: 'auto',
        lang:'fr',
        displayEventTime: false,
        events: [
            {
                start: '19:00:00',
                end: '21:00:00',
                dow: [3, 5],
                backgroundColor: '#ff0000'
            },
            {
                start: '19:00',
                end: '21:00',
                dow: [3, 5],
                backgroundColor: '#5472AE'
            },
            {
                start: '19:00',
                end: '21:00',
                dow: [3, 5],
                backgroundColor: '#0050a1'
            },
            {
                start: '17:00',
                end: '19:00',
                dow: [4],
                backgroundColor: '#4CA66B'
            },
            {
                start: '17:00',
                end: '19:00',
                dow: [3],
                backgroundColor: '#008B8B'
            },
            {
                start: '17:00',
                end: '19:00',
                dow: [4],
                backgroundColor: '#008B8B'
            },
            {
                start: '17:30',
                end: '19:00',
                dow: [1],
                backgroundColor: '#A9A9A9'
            },
            {
                start: '15:30',
                end: '17:00',
                dow: [3],
                backgroundColor: '#A9A9A9'
            },
            {
                start: '14:00',
                end: '15:30',
                dow: [3],
                backgroundColor: '#EE82EE'
            },
            {
                start: '19:00',
                end: '21:00',
                dow: [4],
                backgroundColor: '#8A2BE2'
            }
        ]
    });

    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 'auto',
        spaceBetween: 30,
        grabCursor: true,
    });

    baguetteBox.run('.compact-gallery', {animation: 'slideIn'});
});