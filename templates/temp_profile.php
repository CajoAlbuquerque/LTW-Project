<?php 
    include_once('../templates/temp_message.php');

function draw_profile($user, $editable, $message) { ?>
    <section id="main"> 
        <nav id="sidebar">
            <a href="../pages/profile.php?username=<?=$user['username']?>">Profile</a>
            <a href="../pages/reservations.php">Reservations</a>
            <?php if($editable) {?>
                <a id="edit" href="#">Edit Profile</a>
            <?php }?>
            <a href="../actions/logout_action.php">Log Out</a>
        </nav>
        <section id="info">
            <img src="https://i.pravatar.cc/500" alt="Profile Photo">
            <div id="fields">
                <p><?=$user['username']?></p>
                <p><?=$user['email']?></p>
                <?php 
                    $nationality = $user['nationality'];
                    $age = $user['age'];
                    $name = $user['name'];

                    if($name !== '' && $nationality !== null){ ?>
                        <p><?=$name?></p>
                <?php
                    }

                    if($nationality !== '' && $nationality !== null){ ?>
                        <p><?=$nationality?></p>
                <?php
                    }
                    if($age !== '' && $nationality !== null){ ?>
                        <p><?=$age?></p>
                <?php
                    }
                    if(!empty($message)){ 
                        draw_message($message['type'], $message['content']);
                    }
                ?>
            </div>
        </section>
    </section>
<?php } ?>