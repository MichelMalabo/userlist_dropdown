<?php
/**
 * Plugin Name: Users Names & Emails Addresses
 * Plugin URI: https://www.deltagroup.co.za
 * Description: This plugins gives a dropdown of the users on the Intranet
 * Version: 1.0
 * Author: MM Malabo
 * Author URI: https://www.deltagroup.co.za
 */
 

 
/////////////////////////////////////////////////////////////////////////////////////////////////////// 
/////////////////////////////USER WITH EMAILs EMAILS/////////////////////////////////////////////////


function pine_dynamic_select_project_intranames_values ( $scanned_tag, $replace ) {  
  
    if ( $scanned_tag['name'] != 'intra-users' )  
        return $scanned_tag;
        
//$args = array(
//        'role' => ''
//    );
   // $user = get_users('blog_id=1&orderby=nicename' );
     $users = get_users();
    $return = ' ';

        
        
  foreach( $users as $user ) {
    // get user names from the object and add them to the array
    $Fname = $user->user_firstname;
    $Lname = $user->user_lastname;
    $rows[] = $user->user_firstname. ' ' .$user->user_lastname. '|' .$user->user_email;
}  

 if ( ! $rows )  
        return $scanned_tag;

   foreach ( $rows as $row ) {  
       //$scanned_tag['raw_values'][] = $row->post_title . '|' . $row->post_title;
       
       $scanned_tag['raw_values'][] = $row; //close your tags!!
    }

    $pipes = new WPCF7_Pipes($scanned_tag['raw_values']);

    $scanned_tag['values'] = $pipes->collect_befores();
    $scanned_tag['pipes'] = $pipes;
  
    return $scanned_tag;  
    
    
    
}  

add_filter( 'wpcf7_form_tag', 'pine_dynamic_select_project_intranames_values', 10, 2); 
/////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////


