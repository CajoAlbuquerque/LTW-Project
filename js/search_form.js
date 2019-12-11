'use strict'

let search_form = document.getElementById('search-form');
let search = document.getElementById('search');
let check_in = document.querySelector('#search-form input[name="check_in"]');
let check_out = document.querySelector('#search-form input[name="check_out"]');

check_in.addEventListener('focus', () => check_in.type = 'date');
check_out.addEventListener('focus', () => check_out.type = 'date');
check_in.addEventListener('blur', () => check_in.type = 'text');
check_out.addEventListener('blur', () => check_out.type = 'text');

search.addEventListener('click', function (ev) {
    search_form.style.visibility = 'visible';
    search_form.style.opacity = '1';
    ev.stopPropagation();
});

search_form.addEventListener('click', (ev) => ev.stopPropagation());

document.addEventListener('click', function (ev) {
    if(ev.target !== search_form){
        search_form.style.visibility = 'hidden';
        search_form.style.opacity = '0';
    }
});