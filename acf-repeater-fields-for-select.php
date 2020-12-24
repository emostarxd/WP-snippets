<?php
/** PLACE THIS CODE TO YOUR CHILD THEME'S functions.php */

/** EVENT TYPE FIELD (day/night/weekend) */  
/** ***GET ACF REPEATER SUBFIELDS TO CREATE DYNAMIC FORM SELECT DROPDOWNS*** */
/** ***CODE FOR CUSTOM TAXONOMY PAGES AND SINGLE POSTS WITH ACF REPEATERS*** */
/** ***2020 Oliver Nordfox; Contact via Telegram: https://t.me/emostarxd *** */
add_filter('acf/prepare_field/name=fkurstimetype', 'acf_load_kurs_choices');
function acf_load_kurs_choices( $field ) {
    
    //CHECK IF WE ARE ON THE CATEGORY
    if ( is_tax( 'napravlenye' ) ) {
    $field[ 'choices' ] = array();
    
            //VARS
            if ( pll_current_language() == 'ru' ) {
                $repeater_a = 'vkursrepeater';
            } else if ( pll_current_language() == 'ua' ) {
                $repeater_a = 'vkursrepeaterua';
            }
            $queried_object = get_queried_object();
            $taxonomy       = $queried_object->taxonomy;
            $term_id        = $queried_object->term_id;
            
        while ( the_repeater_field( $repeater_a, $taxonomy . '_' . $term_id ) ) {
            if ( get_sub_field( 'vkurstype', $taxonomy . '_' . $term_id ) ) {
                    //the_row();
                    
                    $value                        = get_sub_field( 'vkurstype', $queried_object );
                    $label                        = get_sub_field( 'vkurstype', $queried_object );
                    $field[ 'choices' ][ $value ] = $label;
            }//i
        }//w
    // return the field for select
    return $field;
    }
    
    //CHECK IF WE ARE ON THE POST
    else if( is_single() ){
            if ( pll_current_language() == 'ru' ) {
                $repeater_a = 'vkursrepeater';
            } else if ( pll_current_language() == 'ua' ) {
                $repeater_a = 'vkursrepeaterua';
            }
        // reset choices
        $field['choices'] = array();
    
        if( have_rows($repeater_a) ) {
            while( have_rows($repeater_a) ) {
                the_row();

                $value = get_sub_field('vkurstype');
                $label = get_sub_field('vkurstype');
            
            // append to choices
            $field['choices'][ $value ] = $label;
            
            }//w
        }//i
    // return the field for select
    return $field;
    } 
}//function end
add_filter('acf/load_field/name=fkurstimetype', 'acf_load_kurs_choices');

/** ONLINE FIELD */
/** ***GET ACF REPEATER SUBFIELDS TO CREATE DYNAMIC FORM SELECT DROPDOWNS*** */
/** ***CODE FOR CUSTOM TAXONOMY PAGES AND SINGLE POSTS WITH ACF REPEATERS*** */
/** ***2020 Oliver Nordfox; Contact via Telegram: https://t.me/emostarxd *** */
add_filter('acf/prepare_field/name=fkursonlinetype', 'acf_load_kurs_onlines');
function acf_load_kurs_onlines( $field ) {
    
    //CHECK IF WE ARE ON THE CATEGORY
    if ( is_tax( 'napravlenye' ) ) {
    $field[ 'choices' ] = array();
    
            //VARS
            if ( pll_current_language() == 'ru' ) {
                $repeater_b = 'vkursrepeater';
            } else if ( pll_current_language() == 'ua' ) {
                $repeater_b = 'vkursrepeaterua';
            }
            $queried_object = get_queried_object();
            $taxonomy       = $queried_object->taxonomy;
            $term_id        = $queried_object->term_id;
            
        while ( the_repeater_field( $repeater_b, $taxonomy . '_' . $term_id ) ) {
            if ( get_sub_field( 'vkursline', $taxonomy . '_' . $term_id ) ) {
                    //the_row();
                    
                    $value                        = get_sub_field( 'vkursline', $queried_object );
                    $label                        = get_sub_field( 'vkursline', $queried_object );
                    $field[ 'choices' ][ $value ] = $label;
            }//i
        }//w
    // return the field for select
    return $field;
    }
    
    //CHECK IF WE ARE ON THE POST
    else if( is_single() ){
            if ( pll_current_language() == 'ru' ) {
                $repeater_b = 'vkursrepeater';
            } else if ( pll_current_language() == 'ua' ) {
                $repeater_b = 'vkursrepeaterua';
            }
        // reset choices
        $field['choices'] = array();
    
        if( have_rows($repeater_b) ) {
            while( have_rows($repeater_b) ) {
                the_row();

                $value = get_sub_field('vkursline');
                $label = get_sub_field('vkursline');
            
            // append to choices
            $field['choices'][ $value ] = $label;
            
            }//w
        }//i
    // return the field for select
    return $field;
    } 
}//function end
add_filter('acf/load_field/name=fkursonlinetype', 'acf_load_kurs_onlines');

?>
