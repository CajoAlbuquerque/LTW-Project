<?php function draw_profile($user) { ?>
    <section id="main"> 
        <nav id="sidebar">
            <a href="../pages/profile.php?username=<?=$user['username']?>">Profile</a>
            <a href="../pages/reservations.php">Reservations</a>
            <a id="edit" href="#">Edit Profile</a>
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

                    if($name != NULL){ ?>
                        <p><?=$name?></p>
                <?php
                    }

                    if($nationality != NULL){ ?>
                        <p><?=$nationality?></p>
                <?php
                    }
                    if($age != NULL){ ?>
                        <p><?=$age?></p>
                <?php
                    }
                ?>
            </div>
        </section>
    </section>
<?php } ?>