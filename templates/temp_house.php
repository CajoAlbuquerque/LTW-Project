<?php function draw_house($house, $owner, $comments, $rating_info, $editable) { ?>
<section class="images">
    <!-- this is a mock image -->
    <img src="https://picsum.photos/400/200">
</section>
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
            <div class="rating"> 
                <p><?=$rating_info['rating']?><img src="../icons/star.png">
                <p>(<?=$rating_info['count']?>)</p>
            </div>
        </section>
        <section class="description">
            <p>
                <?=$house['description']?>
            </p>
        </section>
        <section class="owner">
            <span> Owner </span>
            <section class="owner_buttons">
                <a id="owner_profile"href="../pages/profile.php?username=<?=$owner['username']?>"><?=$owner['name']?> </a>
                <?php if($editable) {?>
                    <a id="edit" href="#">Edit House</a>
                    <form id="add_img" action="../actions/add_house_img_action.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="houseID" value="<?=$house['houseID']?>">
                        <input type="file" name="image" accept="image/.gif,image/.jpg,image/.png,image/.jpeg">
                        <input type="submit" value="Add">
                    </form>
                <?php }?>
            </section>
        </section>
    <section class="comments">
        <h3> Comments </h3>
        <ul>
            <?php foreach ($comments as $comment) { ?>
                <li><p><?=$comment['comment']?></p>
                    <section class="comment_footer">
                        <span class="rating"> <?=$comment['stars']?> stars </span>
                        <span class="commenter">by <a href="../pages/profile.php?username=<?=$comment['username']?>"> <?=$comment['username']?> </a></span>
                    </section>
                </li>
            <?php } ?>
                <!-- TODO: add option to add comment -->
        </ul>
    </section>
</article>


<?php } 

function draw_new_house_form() { ?>

<h2> Please insert the information of the house you wish to rent below </h2>
<div id="main">
    <form id="new_house_form" action="../actions/add_house_action.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="username" value="<?=$_SESSION['username']?>">
        <input type="text" name="title" placeholder="TITLE" maxlength="36" required>
        <input type="number" name="price" placeholder="PRICE / DAY" min="0">
        <input type="text" name="location" placeholder="LOCATION">
        <textarea rows="20" name="description" placeholder="DESCRIPTION" form="new_house_form"></textarea>
        <input type="file" name="img" accept="image/png,image/jpeg,image/jpg,image/gif">
        <input type="button" value="Upload Images">
        <input type="submit" value="Add">
    </form>
    <section id="preview">
        <img src="../images/placeholder.png" alt="Preview Images Placeholder">
    </section>
</div>
 
 <?php  } ?>

<?php function draw_house_card($house, $rating_info, $photo) { ?>
    <article class="card house_card">
        <img src="../images/<?php if($photo === false || $photo === '' || $photo === null){
                                        echo 'house_default.jpg';
                                    } else {
                                        echo $photo;
                                    }?>">
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
            <label>Stars <output id="stars_out"></output><input id="stars" type="range" name="stars" min="1" max="5" step="0.5" placeholder="2.5"></label>
            <label>Comment <input type="text" name="comment" placeholder="Write your comment here."></label>
            <input type="submit" value="Submit comment">
        </form>
    </article>

<?php } ?>