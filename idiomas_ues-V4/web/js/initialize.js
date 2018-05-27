$(document).ready(function () {
    $('.parallax').parallax();
    $('select').material_select();
    $(".button-collapse").sideNav();
    $(".dropdown-button").dropdown();
    $('.slider').slider();
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year,
        today: 'Hoy',
        clear: 'Limpiar',
        close: 'Ok',
        closeOnSelect: true // Close upon selecting a date,
    });
    $('.modal').modal();
    $('.tooltipped').tooltip({
        delay: 50
    });
    $('.scrollspy').scrollSpy();
})