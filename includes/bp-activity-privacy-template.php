<?php
/**
 * Buddypress Activity Privacy Template Tags
 *
 * @package BP-Activity-Privacy
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * [bp_get_profile_activity_privacy_levels description]
 * @return array the profile activity privacy levels
 */
function bp_get_profile_activity_privacy_levels(){
	global $bp_activity_privacy;

	$profile_activity_privacy_levels = bp_get_option( 'bp_ap_profile_activity_privacy_levels', $bp_activity_privacy->profile_activity_privacy_levels );
	return apply_filters( 'bp_profile_activity_privacy_levels_filter', $profile_activity_privacy_levels );
}

/**
 * [bp_get_groups_activity_privacy_levels description]
 * @return array the groups activity privacy levels
 */
function bp_get_groups_activity_privacy_levels(){
	global $bp_activity_privacy;

	$groups_activity_privacy_levels = bp_get_option( 'bp_ap_groups_activity_privacy_levels', $bp_activity_privacy->groups_activity_privacy_levels );
	return apply_filters( 'bp_groups_activity_privacy_levels_filter', $groups_activity_privacy_levels );
}

/**
 * [bp_get_profile_activity_visibility_levels description]
 * @return array the profile activity visibility levels 
 */
function bp_get_profile_activity_visibility_levels() {
	global $bp_activity_privacy;

	$profile_activity_visibility_levels = bp_get_option( 'bp_ap_profile_activity_visibility_levels', $bp_activity_privacy->profile_activity_visibility_levels );
	return apply_filters( 'bp_profile_activity_visibility_levels_filter', $profile_activity_visibility_levels );
}

/**
 * [bp_get_groups_activity_visibility_levels description]
 * @return array the groups activity visibility levels 
 */
function bp_get_groups_activity_visibility_levels() {
	global $bp_activity_privacy;

	$groups_activity_visibility_levels = bp_get_option( 'bp_ap_groups_activity_visibility_levels', $bp_activity_privacy->groups_activity_visibility_levels );
	return apply_filters( 'bp_groups_activity_visibility_levels_filter', $groups_activity_visibility_levels );
}

/**
 * [bp_profile_activity_visibility description]
 * @return String [description]
 */
function bp_profile_activity_visibility() {
	echo bp_get_profile_activity_visibility();
}

	function bp_get_profile_activity_visibility() {
		global $bp_activity_privacy;

		$visibility_levels = bp_get_profile_activity_visibility_levels();
		//sort visibility_levels by position 
		uasort ($visibility_levels, 'bp_activity_privacy_cmp_position');
		
	    $html = '<select name="activity-privacy" id="activity-privacy">';
	    foreach ($visibility_levels as $visibility_level) {
	    	if( $visibility_level["disabled"] )
	    		continue;
	        $html .= '<option class="fa fa-' . $visibility_level["id"] . '" ' . ( $visibility_level['default'] == true ? " selected='selected'" : '' ) . ' value="' . $visibility_level["id"] . '">&nbsp;' . $visibility_level["label"] . '</option>';
	    }
	    $html .= '</select>';

	    return apply_filters( 'bp_get_profil_activity_visibility_filter', $html );
	}

/**
 * [bp_groups_activity_visibility description]
 * @return String [description]
 */
function bp_groups_activity_visibility() {
	echo bp_get_groups_activity_visibility();
}
	
	function bp_get_groups_activity_visibility() {
		global $bp_activity_privacy;

		$visibility_levels = bp_get_groups_activity_visibility_levels();
		//sort visibility_levels by position 
		uasort ($visibility_levels, 'bp_activity_privacy_cmp_position');

	    $html = '<select name="activity-privacy" id="activity-privacy">';
	    foreach ($visibility_levels as $visibility_level) {
	    	if( $visibility_level["disabled"] )
	    		continue;
	        $html .= '<option  class="fa fa-' . $visibility_level["id"] . '" ' .  ( $visibility_level['default'] == true ? " selected='selected'" : '' ) . ' value="' . $visibility_level["id"] . '">&nbsp;' . $visibility_level["label"] . '</option>';
	    }
	    $html .= '</select>';

	    return apply_filters( 'bp_get_groups_activity_visibility', $html );
	}