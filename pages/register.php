<?php 
    include('../templates/temp_common.php');

    draw_SecondaryHeader();
?>
    <link href="../css/loginregisterStyle.css" rel="stylesheet" >

    <section id="registerMain">
        <p><strong>Register</strong> now to find the vacation stay</p>
        <p>that makes you feel like <strong>home</strong>.</p>
        <form action="/actions/resgister_action.php" method="POST">
            <input type="text" name="username" placeholder="USERNAME"> <br>
            <input type="text" name="name" placeholder="NAME"> <br>
            <input type="email" name="email" placeholder="EMAIL"> <br>
            <input type="password" name="password" placeholder="PASSWORD"> <br>
            <input type="submit" value="REGISTER">
        </form>
    </section>
    <section id="images">
        <img src="#" alt="A pretty home" id="small">
        <img src="#" alt="A prettier one" id="medium">
        <img src="#" alt="The prettiest of them all" id="highlighted">
    </section>
<?php 
    draw_footer();
?>