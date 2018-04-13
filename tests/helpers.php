<?php
/**
 * These helper functions are necessary in order to run the
 * test successfully.
 */


if (!function_exists('jsonPath')) {
    /**
     * @param null|string $file
     * @return string
     */
    function jsonPath($file = null)
    {
        if (null !== $file) {
            return __DIR__ . '/Stubs/files/' . $file . '.json';
        }

        return __DIR__ . '/Stubs/files/';
    }
}

if (!function_exists('loadJsonStub')) {
    /**
     * @param string $file
     * @return bool|string
     * @throws Exception
     */
    function loadJsonStub($file)
    {
        /** @var string $file */
        $file = jsonPath($file);

        if (file_exists($file)) {
            return file_get_contents($file);
        } else {
            throw new \Exception('Unable to load json file ' . $file);
        }
    }
}