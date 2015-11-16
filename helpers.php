<?php

if (!function_exists('js')) {
    function js(array $data = []) {
        app('javascript')->put($data);
    }
}

if (!function_exists('jsErrors')) {
    function jsErrors($errors) {
        if (is_string($errors)) {
            $errors = ['message' => $errors];
        }
        js(['errors' => $errors]);
    }
}

/**
 * Pennies to dollars. Converts pennies integer to dollar string (dollar sign not included)
 */
if (!function_exists('ptd')) {
    function ptd($pennies) {
        $dollars = $pennies / 100;
        return number_format($dollars, 2);
    }
}