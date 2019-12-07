<?php
    include_once('../session.php');
    include_once('../templates/temp_common.php');
    include_once('../templates/temp_message.php');

    if(isset($_SESSION['username'])) {
        die(header('Location: ../pages/profile.php'));
    }

    draw_boilerplate('dark');
    draw_header();
?>
    <section id="main">
        <p>Find the best deal...</p>
        <p>... for the perfect <strong>house</strong>.</p>
        <form action="../actions/login_action.php" method="POST">
            <label>Username/Email: <input type="text" name="user" placeholder="USERNAME" required></label>
            <label>Password: <input type="password" name="pass" placeholder="PASSWORD" required></label>
            <input type="submit" value="Login">
        </form>
        <p>Are you new here?</p>
        <p><a href="register.php">Register now</a> to find the perfect stay!</p>
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