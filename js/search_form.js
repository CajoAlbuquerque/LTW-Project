'use strict'

let today = new Date();
let dd = String(today.getDate()).padStart(2, '0');
let mm = String(today.getMonth() + 1).padStart(2, '0');
let yyyy = today.getFullYear();

let search_form = document.getElementById('search-form');
let search = document.getElementById('search');
let check_in = document.querySelector('#search-form input[name="check_in"]');
let check_out = document.querySelector('#search-form input[name="check_out"]');

function todayDate() {
    return yyyy + '-' + mm + '-' + dd;
}

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

check_in.min = todayDate();
check_out.min = todayDate();

check_in.addEventListener('change', function () {
    check_out.min = check_in.value;
});

check_out.addEventListener('change', function () {
    check_in.max = check_out.value;
})