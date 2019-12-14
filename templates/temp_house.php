<?php     
    include_once('../templates/temp_common.php');
?>


<?php function draw_house($house, $owner, $comments) { ?>

<article class="house">
    <a href="../pages/house.php?houseID=<?=$house['houseID']?>">
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
        <a href="../pages/profile.php?username=<?=$owner['username']?>"><?=$owner['name']?> </a>
    </section>
    <section class="comments">
        <h3> Comments </h3>
        <ul>
            <?php foreach ($comments as $comment) { ?>
                <li><p><?=$comment['comment']?></p> 
                    <span class="rating"> <?=$comment['stars']?> stars </span>
                    <a class="commenter" href="../pages/profile.php?username=<?=$comment['username']?>"> <?=$comment['username']?> </a>
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
    <form action="../actions/add_house_action.php" method="post">
        <input type="hidden" name="username" value="<?=$_SESSION['username']?>">
        <label>Title:<input type="text" name="title" maxlength="36" required></label>
        <label>Price per Day:<input type="number" name="price"></label>
        <label>Location:<input type="text" name="location"></label>
        <label>Description:<input type="text" name="description"></label>
        <!-- <label>Images:<input type="file" name="images" accept="image/png, image/jpeg" multiple></label> -->
        <input type="submit" value="Add">
    </form>
</section>
 
 <?php  } ?>

<?php function draw_house_card($house) { ?>
    <article class="house_card">
        <!-- this is a mock picture -->
        <img src="https://picsum.photos/400/200">
        <section>
            <a href="../pages/house.php?houseID=<?=$house['houseID']?>">
                <?=$house['title']?>
            </a>
            <section class="info">
                <ul>
                    <li> <?=$house['priceDay']?>€\day </li>
                    <li> <?=$house['location']?></li>
                </ul>
            </section>
        </section>
    </article>
<?php } ?>