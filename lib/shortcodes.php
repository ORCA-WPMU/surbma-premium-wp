<?php

function pwp_br_function() {
	return '<br />';
}
add_shortcode( 'br', 'pwp_br_function' );

function pwp_hr_function() {
	return '<hr class="clear clearfix" />';
}
add_shortcode( 'hr', 'pwp_hr_function' );

function pwp_clear_function() {
	return '<div class="clear clearfix"></div>';
}
add_shortcode( 'clear', 'pwp_clear_function' );

function pwp_clear_line_function() {
	return '<div class="clear-line clearfix"></div>';
}
add_shortcode( 'clear-line', 'pwp_clear_line_function' );

function pwp_hide_function( $content = null ) {
	return '<div style="display:none;">'.do_shortcode( $content ).'</div>';
}
add_shortcode( 'elrejt', 'pwp_hide_function' );

function pwp_div_function( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id' => '',
		'class' => '',
		'style' => ''
	), $atts ) );

	return '<div id="'.$id.'" class="'.$class.'" style="'.$style.'">'.do_shortcode( $content ).'</div>';
}
add_shortcode( 'div', 'pwp_div_function' );

function pwp_mailto_function( $atts, $content = null ) {
	$encodedmail = '';
	for ( $i = 0; $i <strlen( $content ); $i++ ) $encodedmail .= "&#" . ord( $content[$i] ) . ';';
	return '<a href="mailto:'.$encodedmail.'">'.$encodedmail.'</a>';
}
add_shortcode( 'mailto', 'pwp_mailto_function' );

function pwp_link_function( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'id' => 1,
		'class' => '',
		'title' => ''
	), $atts ) );

		$url = get_permalink($id);
		return '<a class="'.$class.'" href="'.$url.'" title="'.$title.'">'.do_shortcode($content).'</a>';
}
add_shortcode( 'link', 'pwp_link_function' );

function pwp_show_content_for_vendeg( $atts, $content = null ) {
	if ( ( !is_user_logged_in() && !is_null( $content ) ) || is_feed() )
		return do_shortcode( $content );
		return '';
}
add_shortcode( 'vendeg', 'pwp_show_content_for_vendeg' );

function pwp_show_content_for_tag( $atts, $content = null ) {
	if ( is_user_logged_in() && !is_null( $content ) && !is_feed() )
		return do_shortcode( $content );
		return '';
}
add_shortcode( 'tag', 'pwp_show_content_for_tag' );

function pwp_fbvideo( $atts, $content = null ) {
   extract( shortcode_atts( array(
      "id" => '',
      "w" => '650',
      "h" => '364'
   ), $atts ) );
   return '<div class="fbvideo"><object width="'.$w.'" height="'.$h.'" >
   <param name="allowfullscreen" value="true" />
   <param name="allowscriptaccess" value="always" />
   <param name="movie" value="http://www.facebook.com/v/'.$id.'" />
   <embed src="http://www.facebook.com/v/'.$id.'" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="'.$w.'" height="'.$h.'">
   </embed>
   </object></div>';
}
add_shortcode( 'fbvideo', 'pwp_fbvideo' );

function pwp_fblike_button( $atts ) {
	extract( shortcode_atts( array(
		"url" => get_permalink()
	), $atts ) );
	return '<div style="float:left;margin:0 .5em .5em 0;"><div class="fb-like" data-href="'.$url.'" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"></div></div>';
}
add_shortcode( 'facebook-like-gomb', 'pwp_fblike_button' );
add_shortcode( 'facebook-tetszik-gomb', 'pwp_fblike_button' );

function pwp_plusone_button( $atts ) {
	extract( shortcode_atts( array(
		"url" => get_permalink()
	), $atts ) );
	return '<div style="float:left;margin:0 .5em .5em 0;"><div class="g-plusone" data-size="medium" data-href="'.$url.'"></div></div>';
}
add_shortcode( 'google-pluszegy-gomb', 'pwp_plusone_button' );

function pwp_linkedin_share_button( $atts ) {
	extract( shortcode_atts( array(
		"url" => get_permalink()
	), $atts ) );
	return '<div style="float:left;margin:0 .5em .5em 0;"><script type="IN/Share" data-url="'.$url.'" data-counter="right"></script></div>';
}
add_shortcode( 'linkedin-megosztas-gomb', 'pwp_linkedin_share_button' );

function pwp_name_function() {
	$options = get_option( 'pwp_extra_fields' );
	return $options['name'];
	}
function pwp_company_function() {
	$options = get_option( 'pwp_extra_fields' );
	return $options['company'];
	}
function pwp_address_function() {
	$options = get_option( 'pwp_extra_fields' );
	return $options['address'];
	}
function pwp_vat_function() {
	$options = get_option( 'pwp_extra_fields' );
	return $options['vat'];
	}
function pwp_companyid_function() {
	$options = get_option( 'pwp_extra_fields' );
	return $options['companyid'];
	}
function pwp_bankid_function() {
	$options = get_option( 'pwp_extra_fields' );
	return $options['bankid'];
	}
function pwp_email_function() {
	$options = get_option( 'pwp_extra_fields' );
	$email = $options['email'];
	$mailto = '[mailto]'.$email.'[/mailto]';
	return do_shortcode( $mailto );
	}
function pwp_mobilephone_function() {
	$options = get_option( 'pwp_extra_fields' );
	return $options['mobilephone'];
	}
function pwp_phone_function() {
	$options = get_option( 'pwp_extra_fields' );
	return $options['phone'];
	}
function pwp_fax_function() {
	$options = get_option( 'pwp_extra_fields' );
	return $options['fax'];
	}
function pwp_skype_function() {
	$options = get_option( 'pwp_extra_fields' );
	return '<a class="pwp-skype" href="skype:'.$options['skype'].'?call">'.$options['skype'].'</a>';
	}
function pwp_companyinfo_function() {
	$options = get_option( 'pwp_extra_fields' );
	return $options['companyinfo'];
	}

add_shortcode( 'nev', 'pwp_name_function' );
add_shortcode( 'ceg', 'pwp_company_function' );
add_shortcode( 'cim', 'pwp_address_function' );
add_shortcode( 'adoszam', 'pwp_vat_function' );
add_shortcode( 'cegjegyzekszam', 'pwp_companyid_function' );
add_shortcode( 'bankszamlaszam', 'pwp_bankid_function' );
add_shortcode( 'email', 'pwp_email_function' );
add_shortcode( 'mobiltelefon', 'pwp_mobilephone_function' );
add_shortcode( 'telefon', 'pwp_phone_function' );
add_shortcode( 'fax', 'pwp_fax_function' );
add_shortcode( 'skype', 'pwp_skype_function' );
add_shortcode( 'ceginfo', 'pwp_companyinfo_function' );

function pwp_login_form() {
	if ( is_user_logged_in() )
		return '';
	return wp_login_form( array( 'echo' => false ) );
}
add_shortcode( 'belepes', 'pwp_login_form' );

function pwp_pricing_box( $atts, $content = null ) {
	extract( shortcode_atts( array(
		"id" => '',
		"class" => '',
		"cim" => '',
		"ar" => '',
		"leiras" => ''
	), $atts ) );
	return '<div id="'.$id.'" class="pwp-pricing-box '.$class.'"><h3 class="pwp-pricing-box-title">'.$cim.'</h3><div class="pwp-pricing-box-price">'.$ar.'</div><div class="pwp-pricing-box-description">'.$leiras.'</div>'.do_shortcode( $content ).'</div>';
}
add_shortcode('doboz', 'pwp_pricing_box');

function surbma_nyomtatas_shortcode($atts) {
	if ( function_exists( 'pf_show_link' ) )
		return pf_show_link();
	return 'A nyomtatás funkció használatához aktiváld a Print Friendly and PDF bővítményt!';
}
add_shortcode('nyomtatas','surbma_nyomtatas_shortcode');

function surbma_google_calendar_shortcode( $atts ) {
     extract( shortcode_atts( array(
          'src' => '',
          'scrolling' => 'auto',
          'width' => '400',
          'height' => '300'
     ), $atts ) );
     return '<iframe src="https://www.google.com/calendar/embed?'.$src.'" width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="'.$scrolling.'"></iframe>';
}
add_shortcode( 'google-calendar', 'surbma_google_calendar_shortcode' );

function surbma_google_presentation_shortcode( $atts ) {
     extract( shortcode_atts( array(
          'src' => '',
          'start' => false,
          'loop' => false,
          'delayms' => 3000,
          'width' => '960',
          'height' => '569'
     ), $atts ) );
     return '<iframe src="https://docs.google.com/presentation/d/'.$src.'/embed?start='.$start.'&loop='.$loop.'&delayms='.$delayms.'" frameborder="0" width="'.$width.'" height="'.$height.'" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>';
}
add_shortcode( 'google-presentation', 'surbma_google_presentation_shortcode' );

