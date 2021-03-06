<?php 
    include_once('../templates/temp_message.php');

    function draw_profile($user, $editable, $message, $photo) { ?>
        <section id="main"> 
            <nav id="sidebar">
                <a href="../pages/profile.php?username=<?=$user['username']?>">Profile</a>
                <a id="reservations" href="#">My Reservations</a>
                <a id="houses" href="#">My Houses</a>
                <?php if($editable) {?>
                    <a id="edit" href="#">Edit Profile</a>
                    <a id="pass" href="#">Change Password</a>
                    <a href="../actions/logout_action.php">Log Out</a>
                <?php }?>
            </nav>
            <section id="info">
                <img id="profile_img" src="../images/<?php if($photo === false || $photo === '' || $photo === null){
                                                               echo 'profile_default.png';
                                                           } else {
                                                               echo $photo;
                                                           }?>" alt="Profile Photo">
                <div class="fields">
                    <p id="username"><?=$user['username']?></p>
                    <p><?=$user['email']?></p>
                    <?php 
                        $nationality = $user['nationality'];
                        $age = $user['age'];
                        $name = $user['name'];

                        if($name !== '' && $name !== null){ ?>
                            <p><?=$name?></p>
                    <?php
                        }

                        if($nationality !== '' && $nationality !== null){ ?>
                            <p><?=$nationality?></p>
                    <?php
                        }
                        if($age !== '' && $age !== null){ ?>
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