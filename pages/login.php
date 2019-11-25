<?php 
    include('../templates/temp_common.php');

    draw_header();
?>
    <section id="main">
        <p>Find the best deal...</p>
        <p>... for the perfect <strong>house</strong>.</p>
        <form action="/actions/login_action.php" method="POST">
            <label>Username/Email: <input type="text" name="USER" placeholder="USERNAME/EMAIL"></label>
            <label>Password: <input type="password" name="pa    ss" placeholder="PASSWORD"></label>
            <input type="submit" value="Login">
        </form>
        <p>Are you new here?</p>
        <p><a href="register.php">Register now</a> to find the perfect stay!</p>
    </section>
    <section id="images">
        <img src="#" alt="A pretty home" id="medium">
        <img src="#" alt="A prettier one" id="medium">
        <img src="#" alt="The prettiest of them all" id="highlighted">
    </section>
<?php 
    draw_footer();
?>