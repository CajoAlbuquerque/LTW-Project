'use strict'

let results = document.getElementById('search_result');
let check_in_filter = document.querySelector('#filters input[name="check_in"]');
let check_out_filter = document.querySelector('#filters input[name="check_out"]');
let min_output = document.getElementById('min_output');
let max_output = document.getElementById('max_output');
let min_price = document.querySelector('#filters input[name="min_price"]');
let max_price = document.querySelector('#filters input[name="max_price"]');
let get_url = window.location.search.substr(1);
let get_url_parsed = get_url.split('&');
let get_params = {};
let filter_values = {};
let expected_requests = 0, current_requests = 0;
let last_request;

get_url_parsed.forEach(function (key_value) {
    let temp = key_value.split("=");
    get_params[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
});

check_in_filter.addEventListener('focus', () => check_in_filter.type = 'date');
check_out_filter.addEventListener('focus', () => check_out_filter.type = 'date');
check_in_filter.addEventListener('blur', () => check_in_filter.type = 'text');
check_out_filter.addEventListener('blur', () => check_out_filter.type = 'text');

check_in_filter.min = todayDate();
check_out_filter.min = todayDate();

check_in_filter.addEventListener('change', function () {
    check_out_filter.min = check_in_filter.value;
});

check_out_filter.addEventListener('change', function () {
    check_in_filter.max = check_out_filter.value;
})

min_output.value = min_price.value;
max_output.value = max_price.value;

min_price.addEventListener('input', () => min_output.value = min_price.value);
max_price.addEventListener('input', () => max_output.value = max_price.value);

function encode_for_ajax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&');
}

function filterHouses() {
    let inputs = document.querySelectorAll('#filters input');
    let request = new XMLHttpRequest();

    inputs.forEach(function (input) {
        let name = input.attributes.name.value;

        filter_values[decodeURIComponent(name)] = decodeURIComponent(input.value);
    });

    request.onload = updateResults;
    request.open('get', '../ajax/filter_houses.php?' + encode_for_ajax(filter_values), true);
    request.send();
}

function updateResults() {
    let houses = JSON.parse(this.responseText);
    
    results.innerHTML = '';

    houses.forEach(function (house) {
        results.innerHTML += printHouse(house);
    });

    add_card_links();
}

function printHouse(house) {
    let content = '<article class="card house_card">' +
                    '<img src="../images/';

    if(house['photo'] === false || house['photo'] === '' || house['photo'] === null){
        content += 'house_default.jpg';
    }
    else {
        content += house['photo'];
    }

    content += '">' +
            '<section>' +
                '<a href="../pages/house.php?houseID=' + house['houseID'] +'">' +
                    house['title'] +
                '</a>' +
                '<section class="info">' +
                    '<ul>' +
                        '<li>Price:' + house['priceDay'] + '€\\day </li>' +
                        '<li>Place:' + house['location'] + '</li>' +
                    '</ul>' +
                    '<div class="rating">' +
                        '<p>' + house['rating'] + '<img src="../icons/star.png">' +
                        '<p>(' + house['count'] + ')</p>' +
                    '</div>' +
                '</section>' +
            '</section>' +
        '</article>';

    return content;
}

function setupFilters() {
    let inputs = document.querySelectorAll('#filters input');

    inputs.forEach(function (input) {
        let name = input.attributes.name.value;
        let get_value = get_params[name];
        
        if(!(get_value === '' || get_value === null || get_value === undefined)){
            input.value = get_value;
        }

        filter_values[decodeURIComponent(name)] = decodeURIComponent(input.value);

        input.addEventListener('input', filterHouses);
    });
}

setupFilters();
filterHouses();