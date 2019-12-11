'use strict'

let search_form = document.getElementById('search-form');
let search = document.getElementById('search');
let dates = document.querySelectorAll('#search-form input[name*="check"]');

dates.forEach(function (date){
    date.addEventListener('focus', () => date.type = 'date');
    date.addEventListener('blur', () => date.type = 'text');
});

search.addEventListener('click', function (ev) {
    search_form.style.display = 'flex';
    ev.stopPropagation();
});

search_form.addEventListener('click', (ev) => ev.stopPropagation());

document.addEventListener('click', function (ev) {
    if(ev.target !== search_form){
        search_form.style.display = 'none';
    }
});