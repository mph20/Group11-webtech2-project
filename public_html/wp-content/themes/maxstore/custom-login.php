<?php
/* Template Name: Custom Login Page*/

global $user_ID;
global $wpdb;
if(!$user_ID){

    if($_POST){
        $username=esc_sql($_POST['username']);
        $password=esc_sql($_POST['password']);

        $login_array=array();
        $login_array['user_login']=$username;
        $login_array['user_password']=$password;

        $verify_user=wp_signon($login_array,true);
        if(!is_wp_error($verify_user)){
            echo"<script>window.location='".site_url()."'</script>";

        

    }else{
        echo"<p>Invalid credentials</p>";

    }
}else{
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
<form method="post">
    <p>
        <label for="username">Username/Email</label><br/>
        <input type="text" id="username" name="username" placeholder="Enter Username/Email"/>
    </p>

    <p>
        <label for="password">Password</label><br/>
        <input type="password" id="password" name="password" placeholder="Enter Password"/>
    </p>

    <p>
        <button type="submit" name="btn_submit">Log In</button>
    </p>
</form>

<?php get_footer();}
}else{
    //user is logged in
    get_header(); 
    get_template_part( 'template-part', 'head' );
    global $current_user; wp_get_current_user();
    echo"Welcome ".$current_user->display_name."<br/>";
    echo"you already logged in, if you want to log out, hover over your nam eint he top right and select logout in the dropdown";
    get_footer();
}
 ?>