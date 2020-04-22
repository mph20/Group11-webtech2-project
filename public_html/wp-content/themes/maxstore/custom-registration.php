<?php
/* Template Name: Custom Registration Page*/
global $user_ID;
global $wpdb;
?>
<?php
if(!$user_ID){
get_header(); 
get_template_part( 'template-part', 'head' );
?>
<header>
					<h2 class="page-header">                                
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
							<?php the_title(); ?>
						</a>                            
					</h2> 
					
				</header>
<?php
global $wpdb;

if ($_POST) {

    $username = esc_sql($_POST['txtUsername']);
    $email = esc_sql($_POST['txtEmail']);
    $password = esc_sql($_POST['txtPassword']);
    $ConfPassword = esc_sql($_POST['txtConfirmPassword']);

    $error = array();
    if (strpos($username, ' ') !== FALSE) {
        $error['username_space'] = "Username has Space";
    }

    if (empty($username)) {
        $error['username_empty'] = "Needed Username must";
    }

    if (username_exists($username)) {
        $error['username_exists'] = "Username already exists";
    }

    if (!is_email($email)) {
        $error['email_valid'] = "Email has no valid value";
    }

    if (email_exists($email)) {
        $error['email_existence'] = "Email already exists";
    }

    if (strcmp($password, $ConfPassword) !== 0) {
        $error['password'] = "Password didn't match";
    }

    if (count($error) == 0) {

        wp_create_user($username, $password, $email);
        echo "User Created Successfully, please login";
        exit();
    }else{
        foreach($error as $the_error) {
        print_r($the_error);
        ?>
        <br/>
        <?php
        }
        ?>
        <br/>
        <?php
        
    }
}
?>


<form action="https://group11webtech2project5.000webhostapp.com/registration/" method="post">

    <p>
        <label>Enter Username</label>
        <div>
            <input type="text" name="txtUsername" id="txtUsername" placeholder="Username"/>
        </div>
    </p>

    <p>
        <label>Enter Email</label>
        <div>
            <input type="email" name="txtEmail" id="txtEmail" placeholder="Email"/>
        </div>
    </p>

    <p>
        <label>Enter Password</label>
        <div>
            <input type="password" name="txtPassword" id="txtPassword" placeholder="Password"/>
        </div>
    </p>

    <p>
        <label>Enter Confirm Password</label>
        <div>
            <input type="password" name="txtConfirmPassword" id="txtConfirmPassword" placeholder="Password"/>
        </div>
    </p>

    <input type="submit" name="btnSubmit"/>
</form>

<?php get_footer(); 
}
else{//user is logged in
    get_header(); 
    get_template_part( 'template-part', 'head' );
    global $current_user; wp_get_current_user();
    echo"Welcome ".$current_user->display_name;
    get_footer();}
?>