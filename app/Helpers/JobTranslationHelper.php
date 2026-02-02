<?php

if (!function_exists('trans_job')) {
    /**
     * Traduce títulos de trabajo, niveles y tipos
     *
     * @param string $text Texto a traducir
     * @param string $type Tipo: 'title', 'level', o 'type'
     * @return string
     */
    function trans_job($text, $type = 'title')
    {
        if (empty($text)) {
            return $text;
        }

        $locale = app()->getLocale();

        // Si el idioma es inglés, devolver el texto original
        if ($locale === 'en') {
            return $text;
        }

        $key = "jobs.job_{$type}s.{$text}";
        $translation = __($key);

        // Si la traducción no existe, devolver el texto original
        return $translation === $key ? $text : $translation;
    }
}

if (!function_exists('trans_job_title')) {
    /**
     * Traduce título de trabajo
     *
     * @param string $title
     * @return string
     */
    function trans_job_title($title)
    {
        return trans_job($title, 'title');
    }
}

if (!function_exists('trans_job_level')) {
    /**
     * Traduce nivel de trabajo
     *
     * @param string $level
     * @return string
     */
    function trans_job_level($level)
    {
        return trans_job($level, 'level');
    }
}

if (!function_exists('trans_job_type')) {
    /**
     * Traduce tipo de trabajo
     *
     * @param string $type
     * @return string
     */
    function trans_job_type($type)
    {
        return trans_job($type, 'type');
    }
}
