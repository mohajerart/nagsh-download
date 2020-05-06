<?php
/**
 * @package NagshDL
 */

namespace NagshDL\Controllers\ACF;

class ACF
{
    public function register() {
        add_action('nagshdl_show_acf_fields', [ $this, 'outputAcfFields' ]);
    }

    public function outputAcfFields() {
        $product_id = get_the_ID();
        $product_terms = get_the_terms( $product_id, 'product_cat' );

        foreach( $product_terms as $term ) {
            switch ( urldecode( $term->slug ) ) {
                case 'دانلود-پروژه-آماده':
                case 'پروژه-آماده-افتر-افکت-aftereffects':
                case 'پروژه-های-آماده-ایندیزاین-indesign':
                case 'پروژه-آماده-فلش-flash':
                case 'پروژه-آماده-کورل-دراو-coreldraw':
                case 'پروژه-آماده-ایلوستریتور-illustrator':
                case 'پروژه‌های-آماده-فتوشاپ-photoshop':
                case 'تصاویر-و-طرحهای-آماده':
                    $acf_field_group_name = 'دانلود پروژه های آماده';
                    break;

                case 'دانلود-کتب-هنری-گرافیکی':
                    $acf_field_group_name = 'دانلود کتاب';
                    break;
                default:
                    $acf_field_group_name = 'دانلود';
                    break;
            }

            $posts = get_posts( [
                'title'     => $acf_field_group_name,
                'post_type' => 'acf-field-group'
            ] );
            $acf_field_group_post = $posts[0];

            $acf_fields = get_posts( [
                'post_parent'   => $acf_field_group_post->ID,
                'post_type'     => 'acf-field',
                'orderby' => 'title',
                'order'   => 'DESC',
            ] );

            $output = '<div class="nagshdl-acf-fields">';
            $output .= '<table>';
            $output .= '<caption><h3><strong>' . 'اطلاعات فایل' . '</strong></h3></caption>';
            foreach ( $acf_fields as $field ) {
                $field_value = get_field( $field->post_excerpt );

                if ( is_array( $field_value ) ) {
                    $field_options = maybe_unserialize( $field->post_content );
                    $field_choices = $field_options[ 'choices' ];

                    $field_output = '';
                    for( $i = 0; $i < sizeof( $field_value ); $i++ ) {
                        $field_output .= $field_choices[ $field_value[ $i ] ];
                        $field_output .= ( $i < ( sizeof( $field_value ) - 1 ) ? ', ' : '' );
                    }
                }
                else {
                    $field_output = $field_value;
                }
                $output .= '<tr>';
                $output .= '<th>' . $field->post_title . '</th><td>' . $field_output . '</td>';
                $output .= '</tr>';
            }
            $output .= '</table>';
            $output .= '</div>';

            echo $output;
        }
    }
}