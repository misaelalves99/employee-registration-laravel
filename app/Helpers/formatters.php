<?php
// app/Helpers/formatters.php

if (!function_exists('format_currency')) {
    /**
     * Formata um valor numérico em moeda BRL
     *
     * @param float $value
     * @return string
     */
    function format_currency(float $value): string
    {
        return 'R$ ' . number_format($value, 2, ',', '.');
    }
}

if (!function_exists('format_enum')) {
    /**
     * Converte string camelCase ou PascalCase para forma legível
     * Ex.: "firstName" => "First Name"
     *
     * @param string $value
     * @return string
     */
    function format_enum(string $value): string
    {
        $formatted = preg_replace('/([A-Z])/', ' $1', $value);
        $formatted = trim($formatted);
        return ucfirst($formatted);
    }
}

if (!function_exists('format_date_formatter')) {
    /**
     * Formata string ou DateTime para dd/mm/yyyy
     *
     * @param string|\DateTime $date
     * @return string
     */
    function format_date_formatter(string|\DateTime $date): string
    {
        $dt = $date instanceof \DateTime ? $date : new \DateTime($date);
        return $dt->format('d/m/Y');
    }
}
