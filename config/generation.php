<?php

$svgNormalization = static function (string $tempFilepath, array $iconSet) {
    $dom = new DOMDocument;
    $dom->formatOutput = false;
    $dom->preserveWhiteSpace = false;
    $dom->load($tempFilepath, LIBXML_NONET);

    $svg = $dom->getElementsByTagName('svg')->item(0);

    if (! $svg instanceof DOMElement) {
        return;
    }

    while ($style = $svg->getElementsByTagName('style')->item(0)) {
        $style->parentNode->removeChild($style);
    }

    foreach ((new DOMXPath($dom))->query('//comment()') as $comment) {
        $comment->parentNode->removeChild($comment);
    }

    foreach (['width', 'height', 'class', 'style', 'id'] as $attribute) {
        $svg->removeAttribute($attribute);
    }

    if ($iconSet['is-solid'] ?? false) {
        $svg->setAttribute('fill', 'currentColor');
    }

    foreach ($iconSet['custom-attributes'] ?? [] as $attribute => $value) {
        $svg->setAttribute($attribute, $value);
    }

    $svgLine = $dom->saveXML();
    $svgLine = preg_replace('/<\?xml.*\?>/', '', $svgLine);
    $svgLine = preg_replace('/\s+/', ' ', trim($svgLine));
    $svgLine = preg_replace('/>\s+</', '><', $svgLine);

    $filename = pathinfo($tempFilepath, PATHINFO_FILENAME);
    $filename = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $filename), '-'));
    $destinationPath = dirname($tempFilepath).DIRECTORY_SEPARATOR.$filename.'.svg';

    file_put_contents($destinationPath, $svgLine);

    if ($destinationPath !== $tempFilepath) {
        unlink($tempFilepath);
    }
};

return [
    [
        'source' => __DIR__.'/../node_modules/car-makes-icons/svgs',
        'destination' => __DIR__.'/../resources/svg',
        'is-solid' => true,
        'safe' => true,
        'after' => $svgNormalization,
    ],
];
