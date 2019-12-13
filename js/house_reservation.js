'use strict'

let check_in = document.querySelector('#reservation_form input[name="check_in"]');
let check_out = document.querySelector('#reservation_form input[name="check_out"]');
let output = document.querySelector('#reservation_form output');
let price = document.querySelector('.reservation_form input[name="priceDay"]').value;
let in_date = new Date(check_in.value);
let out_date = new Date(check_out.value);

check_in.addEventListener('input', function () {
    output.value = (out_date - in_date) *
});
