<?php
// models/MathModel.php

class MathModel
{
    // power(base, exponent) using recursion (you can mention this in report)
    public static function power($base, $exp)
    {
        $base = (float)$base;
        $exp  = (int)$exp;

        if ($exp === 0) {
            return 1;
        }

        if ($exp < 0) {
            return 1 / self::power($base, -$exp);
        }

        if ($exp === 1) {
            return $base;
        }

        return $base * self::power($base, $exp - 1);
    }
}