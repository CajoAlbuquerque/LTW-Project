<?php 
    include('../templates/temp_common.php');

    draw_header();
?>
    <section id="main">
        <p><strong>Register</strong> now to find the vacation stay</p>
        <p>that makes you feel like <strong>home</strong>.</p>
        <form action="/actions/resgister_action.php" method="POST">
            <label>Username: <input type="text" name="username" placeholder="USERNAME"></label>
            <label>First and Last Name: <input type="text" name="name" placeholder="NAME"></label>
            <label>Email: <input type="email" name="email" placeholder="EMAIL"></label>
            <label>Password: <input type="password" name="pass" placeholder="PASSWORD"></label>
            <label>Confirm Password: <input type="password" name="confirm" placeholder="CONFIRM PASSWORD"></label>
            <input type="submit" value="Register">
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