<?php


namespace NagshDL\Controllers;


class Shortcodes
{
    public function register() {
        add_shortcode( 'nagshdl-show-acf-fields', [ $this, 'nagshdlShowACFFields' ] );
    }

    public function nagshdlShowACFFields() {
        $shortcode_output = '';

        ob_start();
        do_action( 'nagshdl_show_acf_fields' );
        $ob_content = ob_get_contents();
        ob_end_clean();

        $shortcode_output .= $ob_content;

        return $shortcode_output;
    }
}