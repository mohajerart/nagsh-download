<?php
/**
 * @package NagshDL
 */

namespace  NagshDL\Controllers;

class Deactivate
{
    public static function deactivate() {
        flush_rewrite_rules();
    }
}