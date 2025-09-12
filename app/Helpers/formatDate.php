<?php
// app/Helpers/formatDate.php

if (!function_exists('format_date')) {
    /**
     * Formata uma data para dd/mm/yyyy
     *
     * @param string|\DateTime $date
     * @return string
     */
    function format_date(string|\DateTime $date): string
    {
        $dt = $date instanceof \DateTime ? $date : new \DateTime($date);
        return $dt->format('d/m/Y');
    }
}
