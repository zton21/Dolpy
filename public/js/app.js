// Navbar
$(function () {$(document).scroll(function () {$(".fixed-top").toggleClass('bg-success', $(this).scrollTop() > $(".fixed-top").height());});});