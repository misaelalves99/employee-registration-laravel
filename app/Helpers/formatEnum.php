<?php
// app/Helpers/formatEnum.php

if (!function_exists('format_gender')) {
    function format_gender(string $gender): string
    {
        return match($gender) {
            'Male' => 'Masculino',
            'Female' => 'Feminino',
            'Other' => 'Outro',
            default => 'Desconhecido',
        };
    }
}

if (!function_exists('format_position')) {
    function format_position(string $position): string
    {
        return match($position) {
            'Manager' => 'Gerente',
            'Developer' => 'Desenvolvedor',
            default => 'Outro',
        };
    }
}
