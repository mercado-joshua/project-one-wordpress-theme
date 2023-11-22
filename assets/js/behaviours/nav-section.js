"use strict";

$(function () {
  var navBar = $('.navbar');

  // create close-btn element
  var link = 'http://project-1-basic-website.local/wp-content/themes/project-1/assets/images/icon-menu-close.svg';
  navBar.prepend($('<div>').addClass('close-btn').append($('<img>').attr('src', link)));
  var menuBtn = $('.menu-btn');
  var closeBtn = $('.close-btn');
  var overlay = $('.overlay');
  closeBtn.on('click', function () {
    navBar.toggleClass('-active');
    overlay.toggleClass('-active');
    console.log("this must be close-btn");
  });

  // toggle class when clicked
  menuBtn.on('click', function () {
    navBar.toggleClass('-active');
    overlay.toggleClass('-active');
  });
  overlay.on('click', function () {
    navBar.toggleClass('-active');
    overlay.toggleClass('-active');
  });
});