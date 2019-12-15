'use strict'

let cards = document.querySelectorAll('.house_card');
let links = document.querySelectorAll('.house_card a');

cards.forEach(function (card, index) {
    card.addEventListener('click', () => window.location.href = links[index].href);
});