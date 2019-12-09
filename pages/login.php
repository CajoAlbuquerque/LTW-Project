<?php 
    include_once('../session.php');
    include_once('../templates/temp_common.php');
    include_once('../templates/temp_message.php');

    if(isset($_SESSION['username'])) {
        die(header('Location: ../pages/profile.php'));
    }

    draw_black_header();
?>
    <link href="../css/loginregisterStyle.css" rel="stylesheet" >
  
    <div id="loginDiv">
        <section id="Main">
            <p id="firstSentence">Find the best deal...<span>... for the perfect <a>house</a>.</span></p>
            <form action="../actions/login_action.php" method="POST">
                <input id="username" type="text" name="USER" placeholder="USERNAME/EMAIL">
                <input id="password" type="password" name="PASSWORD" placeholder="PASSWORD">
                <input id="submit" id="loginButton" type="submit" value="LOGIN">
            </form>
            <p id="else">Are you new here? <span>
                <a href="register.php">Register</a> now to find the perfect stay! </span></p>
        </section>
<?php
    if(isset($_SESSION['messages'])) {
        $type = $_SESSION['messages'][0]['type'];
        $content = $_SESSION['messages'][0]['content'];

        draw_message($type, $content);
    }
?>
        <section id="Images">
            <div id="highlighted">
                <img src="../icons/housemock.jpg">
            </div>
            <div id="lessImportant">
                <div id="small">
                    <img src="../icons/housemock1.jpeg">
                </div>
                <div id="medium">
                    <img src="../icons/housemock2.jpg">
                </div>
            </div>
        </section>
    </div>
<?php 
    draw_footer();
    unset($_SESSION['messages']);
?>