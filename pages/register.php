<?php
    include_once('../session.php');
    include_once('../templates/temp_common.php');
    include_once('../templates/temp_message.php');

    if(isset($_SESSION['username'])) {
        die(header('Location: ../pages/homepage.php')); //TODO: change to profile page
    }

    draw_boilerplate('dark');
    draw_header();
?>
    <section id="main">
        <p><strong>Register</strong> now to find the vacation stay</p>
        <p>that makes you feel like <strong>home</strong>.</p>
        <form action="../actions/register_action.php" method="POST">
            <label>Username: <input type="text" name="username" placeholder="USERNAME" required></label>
            <label>First and Last Name: <input type="text" name="name" placeholder="NAME"></label>
            <label>Email: <input type="email" name="email" placeholder="EMAIL" required></label>
            <label>Password: <input type="password" name="pass" placeholder="PASSWORD" required></label>
            <label>Confirm Password: <input type="password" name="confirm" placeholder="CONFIRM PASSWORD" required></label>
            <input type="submit" value="Register">
        </form>
    </section>
<?php
    if(isset($_SESSION['messages'])) {
        $type = $_SESSION['messages'][0]['type'];
        $content = $_SESSION['messages'][0]['content'];

        draw_message($type, $content);
    }
?>
    <section id="images">
        <img src="#" alt="A pretty home" id="small">
        <img src="#" alt="A prettier one" id="medium">
        <img src="#" alt="The prettiest of them all" id="highlighted">
    </section>
<?php 
    draw_footer();
    unset($_SESSION['messages']);
?>