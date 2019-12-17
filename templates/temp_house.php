<?php     
    include_once('../templates/temp_common.php');
    include_once('../database/db_comments.php');
?>


<?php function draw_house($house, $owner, $comments, $editable) { 
    $rating_info = getRatingOfHouse($house['houseID']);
    ?>

<article class="house">
    <section class="house_info">
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
            <div class="rating"> <?=$rating_info['rating']?> Stars (<?=$rating_info['count']?> Users) </div>
        </section>
        <section class="description">
            <p>
                <?=$house['description']?>
            </p>
        </section>
        <section class="owner">
            <a href="../pages/profile.php?username=<?=$owner['username']?>"><?=$owner['name']?> </a>
            <?php if($editable) {?>
                    <a id="edit" href="#">Edit House</a>
            <?php }?>
        </section>
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

<?php function draw_house_card($house) { 
    draw_style('templateHouseCardStyle');

    $rating_info = getRatingOfHouse($house['houseID']);
    ?>
    <article class="card house_card">
        <!-- this is a mock picture -->
        <img src="https://picsum.photos/400/200">
        <section>
            <a href="../pages/house.php?houseID=<?=$house['houseID']?>">
                <?=$house['title']?>
            </a>
            <section class="info">
                <ul>
                    <li>Price: <?=$house['priceDay']?>€\day </li>
                    <li>Place: <?=$house['location']?></li>
                </ul>
                <div class="rating"> 
                    <p><?=$rating_info['rating']?><img src="../icons/star.png">
                    <p>(<?=$rating_info['count']?>)</p>
                </div>
            </section>
        </section>
    </article>
<?php }

function draw_comment_form($houseID, $userID) { ?>
    <article class="comment_form">
        <form action="../actions/add_comment_action.php" method="post">
            <input type="hidden" name="userID" value="<?=$userID?>">
            <input type="hidden" name="houseID" value="<?=$houseID?>">
            <label>Stars <input type="range" name="stars" min="1" max="5" step="0.5" placeholder="2.5"></label>
            <label>Comment <input type="text" name="comment" placeholder="Write your comment here."></label>
            <input type="submit" value="Submit comment">
        </form>
    </article>

<?php } ?>