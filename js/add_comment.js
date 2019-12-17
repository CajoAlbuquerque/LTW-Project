'use strict'

let stars_out = document.getElementById('stars_out');
let stars = document.getElementById('stars');

stars_out.value = stars.value;

stars.addEventListener('input', () => stars_out.value = stars.value);

