<?php
/* Template Name: Create review Page*/
global $user_ID;
global $wpdb;
if(!$user_ID){//user not logged in

    if($_POST){
        
        
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

        you must log in an be a reviewer to post a review.

        <?php get_footer();
    }
}
else{
    //user is already logged in
    
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
        $user = get_userdata( $user_ID );
        $user_roles = $user->roles;
        if ( in_array( 'Reviewer', $user_roles, true ) or in_array( 'administrator', $user_roles, true )) {
            // Do something.
            echo 'YES, User is a reviewer';
            echo" the form for review submission goes here";
        }
        else{
            echo"you are not a reviewer and so cannot make a review";
        }
    
        get_footer();
}
 ?>
 $post_id = wp_insert_post(array (
   'post_type' => 'your_post_type',
   'post_title' => $your_title,
   'post_content' => $your_content,
   'post_status' => 'publish',
   'comment_status' => 'closed',   // if you prefer
   'ping_status' => 'closed',      // if you prefer
));

