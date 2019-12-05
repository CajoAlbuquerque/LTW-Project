<?php function draw_sidebar() { ?>
    <nav id="sidebar">
        <a href="../pages/profile.php">Profile</a>
        <a href="../pages/reservations.php">Reservations</a>
        //TODO: add extras
    </nav>
<?php } ?>

<?php function draw_profile($user) { ?>
    <section id="main">
        <img src="#" alt="Profile Photo">
        <label>Username: <input type="text" name="username" value="<?=$user['username']?>" readonly></label>
        <label>Email: <input type="email" name="email" value="<?=$user['email']?>" readonly></label>
        <label>Name: <input type="text" name="name" value="<?=$user['name']?>" readonly></label>
        <label>Nationality: <input type="text" name="nationality" value="<?=$user['nationality']?>" readonly></label>
        <label>Age: <input type="text" name="age" value="<?=$user['age']?>" readonly></label>
    </section>
<?php } ?>