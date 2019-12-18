<?php function draw_search() {?>
    <section id="main">
        <section id="filters">
            <form>
                <label>Where <input type="text" name="location" placeholder="Choose a city"></label>
                <label>Check-In <input type="text" name="check_in" placeholder="yyyy-mm-dd"></label>
                <label>Check-Out <input type="text" name="check_out" placeholder="yyyy-mm-dd"></label>
                <label>Min Price\Day <output id="min_output"></output></label>
                <input type="range" name="min_price" max="250" step="5" value="0">
                <label>Max Price\Day <output id="max_output"></output></label>
                <input type="range" name="max_price" max="250" step="5" value="250">
            </form>
        </section>
        <section id="search_result">
        </section>
    </section>
<?php } ?>
