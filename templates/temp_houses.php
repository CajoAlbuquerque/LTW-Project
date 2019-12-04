<?php function draw_house($house, $owner, $comments) { ?>

<article class="house">
    <a href="pages/house.php?houseID=<?=$house['houseID']?>">
        <h2><?=$house['title']?></h2>
        <!-- TODO: display all images of the house -->
    </a>
    <section class="info">
        <ul>
            <li><a> <?=$house['priceDay']?>€\day </a></li>
            <li><a> <?=$house['location']?></a></li>
            <li><a> Add more tags </a></li>
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
                    <a class="rating"> <?=$comment['stars']?> stars </a>
                    <footer class="commenter"> <?=$comment['username']?> </footer>
                    <!-- TODO: add href to owner -->
                </li>
            <?php } ?>
                <!-- TODO: add option to add comment -->
        </ul>
    </section>
</article>


<?php } 

function draw_new_house_form() { ?>

<h2> Please insert the information of the house you wish to rent below. </h2>
<section id="new_house_form">
    <form action="add_house_action.php" method="post">
        <input type="hidden" name="username" value="<?=$_SESSION['username']?>">
        <label>Title:<input type="text" name="house_title"></label>
        <label>Price per Day:<input type="number" name="house_price"></label>
        <label>Location:<input type="text" name="house_location"></label>
        <label>Description:<input type="text" name="house_description"></label>
        <!-- <label>Images:<input type="file" name="house_images" accept="image/png, image/jpeg" multiple></label> -->
        <input type="submit" value="Add">
    </form>
</section>
 
 <?php  } ?>