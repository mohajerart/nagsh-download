<?php
/**
 * @package NagshDL
 */

namespace  NagshDL\Controllers;

class Activate
{
    public static function activate() {
        flush_rewrite_rules();
    }
}