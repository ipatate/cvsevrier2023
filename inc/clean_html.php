<?php

namespace PressWind\Inc;

$_class = 'cvs-carousel-grouped';

function parse_html($string, $_class)
{
    if (! $string || $string === '') {
        return $string;
    }
    $document = new \DOMDocument();
    // hide error syntax warning
    libxml_use_internal_errors(true);

    $document->loadHTML(mb_convert_encoding($string, 'HTML-ENTITIES', 'UTF-8'));
    $xpath = new \DOMXpath($document);

    parseCarousel($xpath, $_class);

    return $document->saveHTML();
}

/**
 * parse list query element used by carousel
 */
function parseCarousel(\DOMXpath $xpath, $_class): void
{
    // search ul list carousel
    $containers = $xpath->query("//ul[contains(@class, '".$_class."')]");

    foreach ($containers as $key => $container) {
        // set attributes of ul to div
        $attributes = $container->attributes;
        $div = $container->ownerDocument->createElement('div');
        foreach ($attributes as $attribute) {
            $div->setAttribute($attribute->name, $attribute->value);
        }

        // set all childs of ul to div
        while ($container->firstChild) {
            $div->appendChild($container->firstChild);
        }
        // replace ul by div
        $container->parentNode->replaceChild($div, $container);

        // // remplace li child by div tag
        $li = $xpath->query("//li[contains(@class, 'wp-block-post')]", $div);
        foreach ($li as $key => $item) {
            $attributes = $item->attributes;
            $_lidiv = $item->ownerDocument->createElement('div');
            foreach ($attributes as $attribute) {
                $_lidiv->setAttribute($attribute->name, $attribute->value);
            }
            // set children of li to div
            while ($item->firstChild) {
                $_lidiv->appendChild($item->firstChild);
            }
            // replace li by div
            $item->parentNode->replaceChild($_lidiv, $item);
        }
    }
}

/**
 * filter the content
 */
add_filter('the_content', function ($content) use ($_class) {
    return namespace\parse_html($content, $_class);
});
