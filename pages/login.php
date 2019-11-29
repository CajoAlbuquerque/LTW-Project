<?php 
    include('../templates/temp_common.php');
    draw_SecondaryHeader();
?>
    <link href="../css/loginregisterStyle.css" rel="stylesheet" >
  
    <div>
        <section id="loginMain">
            <p id="firstSentence">Find the best deal...<span>... for the perfect <a>house</a>.</p>
            <form id="loginForm" action="/actions/login_action.php" method="POST">
                <input type="text" name="USER" placeholder="USERNAME/EMAIL">
                <input type="password" name="PASSWORD" placeholder="PASSWORD">
                <input id="loginButton" type="submit" value="LOGIN">
            </form>
            <p id="else">Are you new here? <span>
                <a href="register.php">Register</a> now to find the perfect stay!</p>
        </section>
        <section id="loginImages">
            <div>
                <img src="#" alt="A pretty home" id="medium">
            </div>
            <div>
                <img src="#" alt="A prettier one" id="medium">
            </div>
            <div>
                <img src="#" alt="The prettiest of them all" id="highlighted">
            </div>
        </section>
    </div>
<?php 
    draw_footer();
?>