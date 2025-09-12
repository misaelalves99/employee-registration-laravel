<?php
// app/Helpers/formatStatus.php

if (!function_exists('format_status')) {
    function format_status(bool $isActive): string
    {
        return $isActive ? 'Ativo' : 'Inativo';
    }
}
