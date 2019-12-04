<?php function draw_house($house, $owner, $comments) { ?>

<article class="house">
    <a href="pages/house.php?houseID=<?=$house['houseID']?>">
        <h2><?=$house['title']?></h2>
        <!-- TODO: display all images of the house -->
    </a>
    <section class="info">
        <ul>
            <li> <?=$house['priceDay']?>€\day </li>
            <li> <?=$house['location']?></li>
            <li> Add more tags </li>
        </ul>
    </section>
    <section class="description">
        <p>
            <?=$house['description']?>
        </p>
    </section>
    <section class="owner">
        <a> <!-- href to owner profile --> <?=$owner['name']?> </a>
    </section>
    <section class="comments">
        <h3> Comments </h3>
        <ul>
            <?php foreach ($comments as $comment) { ?>
                <li><p><?=$comment['comment']?></p> 
                    <span class="rating"> <?=$comment['stars']?> stars </span>
                    <a class="commenter" href="#"> <?=$comment['username']?> </a>
                    <!-- TODO: add href to owner -->
                </li>
            <?php } ?>
                <!-- TODO: add option to add comment -->
        </ul>
    </section>
</article>


<?php } ?>