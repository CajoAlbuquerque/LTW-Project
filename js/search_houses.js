'use strict'

let results = document.getElementById('search_result');
let get_url = window.location.search.substr(1);
let get_url_parsed = get_url.split('&');
let get_params = {};
let check_in_filter = document.querySelector('#filters input[name="check_in"]');
let check_out_filter = document.querySelector('#filters input[name="check_out"]');

get_url_parsed.forEach(function (key_value) {
    let temp = key_value.split("=");
    get_params[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
});

check_in_filter.addEventListener('focus', () => check_in_filter.type = 'date');
check_out_filter.addEventListener('focus', () => check_out_filter.type = 'date');
check_in_filter.addEventListener('blur', () => check_in_filter.type = 'text');
check_out_filter.addEventListener('blur', () => check_out_filter.type = 'text');

function filterHouses() {
    let request = new XMLHttpRequest();
    request.onload = updateResults;
    request.open('get', '../ajax/filter_houses.php?' + get_url, true);
    request.send();
}

function updateResults() {
    let houses = JSON.parse(this.responseText);
    
    results.innerHTML = '';

    houses.forEach(function (house) {
        results.innerHTML += printHouse(house);
    });
}

function printHouse(house) {
    return '<article class="house_card">' +
        //TODO: display main image of the house
        '<a href="../pages/house.php?houseID=' + house['houseID'] + '">' +
            '<h2>' + house['title'] + '</h2>' +
        '</a>' +
        '<section class="info">' +
            '<ul>' +
                '<li>' + house['priceDay'] + '€\\day </li>' +
                '<li>' + house['location'] + '</li>' +
            '</ul>' +
        '</section>' +
        '<section class="description">' +
            '<p>' + house['description'] + '</p>' +
        '</section>' +
    '</article>';
}

function setupFilters() {
    let inputs = document.querySelectorAll('#filters input');

    inputs.forEach(function (input) {
        let name = input.attributes.name.value;
        let get_value = get_params[name];
        
        if(!(get_value === '' || get_value === null || get_value === undefined)){
            input.value = get_value;
        }

        input.addEventListener('input', filterHouses);
    });
}

setupFilters();
filterHouses();