'use strict'

let check_in_reservation = document.querySelector('.reservation_form input[name="check_in"]');
let check_out_reservation = document.querySelector('.reservation_form input[name="check_out"]');
let output = document.querySelector('.reservation_form output');
let price = document.querySelector('.reservation_form input[name="priceDay"]').value;

check_in_reservation.addEventListener('focus', () => check_in_reservation.type = 'date');
check_out_reservation.addEventListener('focus', () => check_out_reservation.type = 'date');
check_in_reservation.addEventListener('blur', () => check_in_reservation.type = 'text');
check_out_reservation.addEventListener('blur', () => check_out_reservation.type = 'text');

check_in_reservation.min = todayDate();
check_out_reservation.min = todayDate();

check_in_reservation.addEventListener('change', function () {
    check_out_reservation.min = check_in_reservation.value;
});

check_out_reservation.addEventListener('change', function () {
    check_in_reservation.max = check_out_reservation.value;
})


function date_diff(left, right) {
    let day_in_ms = 1000 * 60 * 60 * 24;
    let left_ms = left.getTime();
    let right_ms = right.getTime();

    return Math.round((left_ms - right_ms) / day_in_ms);
}

function are_not_null() {
    return check_in_reservation.value !== '' && check_out_reservation.value !== '';
}

check_in_reservation.addEventListener('input', function () {
    if(are_not_null()){
        let in_date = new Date(check_in_reservation.value);
        let out_date = new Date(check_out_reservation.value);
        output.value = date_diff(out_date, in_date) * price;
        output.value += '€';
    }
});

check_out_reservation.addEventListener('input', function () {
    if(are_not_null()){
        let in_date = new Date(check_in_reservation.value);
        let out_date = new Date(check_out_reservation.value);
        output.value = date_diff(out_date, in_date) * price;
    }
});
