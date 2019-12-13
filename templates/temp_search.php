<?php
    include_once('../templates/temp_house.php');

function draw_filters() {?>
    <section id="filters">
        <form>
            <label>Where <input type="text" name="location" placeholder="Choose a city"></label>
            <label>Check-In <input type="text" name="check_in" placeholder="yyyy-mm-dd"></label>
            <label>Check-Out <input type="text" name="check_out" placeholder="yyyy-mm-dd"></label>
            <label>Min Price\Day <input type="range" name="min_price" max="250" step="5" value="0"></label>
            <label>Max Price\Day <input type="range" name="max_price" max="250" step="5" value="250"></label>
        </form>
    </section>
<?php } 
    
function draw_search_result() {?>
    <section id="search_result">
    </section>
<?php } ?>
