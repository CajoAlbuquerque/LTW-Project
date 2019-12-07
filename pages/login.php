<?php 
    include('../templates/temp_common.php');
    draw_SecondaryHeader();
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
        <section id="Images">
            <div id="highlighted">
                <img src="../Icons/housemock.jpg">
            </div>
            <div id="lessImportant">
                <div id="small">
                    <img src="../Icons/housemock1.jpeg">
                </div>
                <div id="medium">
                    <img src="../Icons/housemock2.jpg">
                </div>
            </div>
        </section>
    </div>
<?php 
    draw_footer();
?>