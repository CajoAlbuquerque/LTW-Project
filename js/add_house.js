'use strict'

let button = document.querySelector('#new_house_form input[type="button"]');
let file_input = document.querySelector('#new_house_form input[type="file"]');
let preview = document.getElementById('preview');

button.addEventListener('click', function (ev) {
    ev.preventDefault();

    if(file_input) {
        file_input.click();
    }
});

file_input.addEventListener('change', preview_images);

function preview_images(event) {
    let files = event.target.files;

    console.log(files);

    for (let i = 0; i < files.length; i++){
        let file = files[i];

        let img = document.createElement('img');
        img.classList.add('preview_obj');
        img.file = file;
        preview.appendChild(img);

        let reader = new FileReader()
        reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
        reader.readAsDataURL(file);
    }
}
