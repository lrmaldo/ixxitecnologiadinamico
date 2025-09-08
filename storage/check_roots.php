<?php

// Script para reemplazar colores en archivos
$oldColor1 = '#d9491e';
$newColor1 = '#0ea5a4';
$oldColor2 = '#e25a2f';
$newColor2 = '#14b8a6';

// Directorios donde buscar
$directories = [
    __DIR__ . '/../resources/views',
];

$extensions = ['.blade.php', '.php', '.html', '.css', '.js'];
$totalReplacements = 0;

foreach ($directories as $dir) {
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir)
    );

    foreach ($iterator as $file) {
        if ($file->isFile()) {
            $extension = '.' . pathinfo($file->getPathname(), PATHINFO_EXTENSION);

            if (in_array($extension, $extensions) || in_array(strtolower($extension), $extensions)) {
                $content = file_get_contents($file->getPathname());
                $newContent = str_replace(
                    [$oldColor1, $oldColor2],
                    [$newColor1, $newColor2],
                    $content,
                    $count
                );

                if ($count > 0) {
                    file_put_contents($file->getPathname(), $newContent);
                    echo "Replaced {$count} occurrences in: " . $file->getPathname() . PHP_EOL;
                    $totalReplacements += $count;
                }
            }
        }
    }
}

echo "Total replacements: {$totalReplacements}";
