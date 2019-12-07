<?php function draw_profile($user) { ?>
    <section id="main"> 
        <nav id="sidebar">
            <a href="../pages/profile.php">Profile</a>
            <a href="../pages/reservations.php">Reservations</a>
            <a href="#">//TODO: add extras</a>
        </nav>
        <img src="https://assets.currencycloud.com/wp-content/uploads/2018/01/profile-placeholder.gif" alt="Profile Photo">
        <form action="">
            <label>Username: <input type="text" name="username" value="<?=$user['username']?>" readonly></label>
            <label>Email: <input type="email" name="email" value="<?=$user['email']?>" readonly></label>
            <label>Name: <input type="text" name="name" value="<?=$user['name']?>" readonly></label>
            <label>Nationality: <input type="text" name="nationality" value="<?=$user['nationality']?>" readonly></label>
            <label>Age: <input type="text" name="age" value="<?=$user['age']?>" readonly></label>
        </form>
    </section>
<?php } ?>