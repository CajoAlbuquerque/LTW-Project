'use strict'

function add_card_links() {
    let cards = document.querySelectorAll('.card');
    let links = document.querySelectorAll('.card a');
    cards.forEach(function (card, index) {
        card.addEventListener('click', () => window.location.href = links[index].href);
    });
}

add_card_links();