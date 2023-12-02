<?php

namespace PressWind\Inc;

function parse($string)
{
    if (! $string || $string === '') {
        return $string;
    }
    $document = new \DOMDocument();
    // hide error syntax warning
    libxml_use_internal_errors(true);

    $document->loadHTML(mb_convert_encoding($string, 'HTML-ENTITIES', 'UTF-8'));
    $xpath = new \DOMXpath($document);

    parseIframe($xpath);

    return $document->saveHTML();
}

/**
 * parse iframe element
 */
function parseIframe(\DOMXpath $xpath): void
{
    $name = 'contentdisplay';
    // search iframe
    $containers = $xpath->query('//div[@class="wp-block-embed__wrapper"]');
    foreach ($containers as $key => $container) {
        [$iframe] = $xpath->query('//iframe', $container);
        // generate key random
        $randomkey = random_bytes(5);
        // create script
        $script = '<script type="text/javascript">'
          .'var '.strtolower($name).'CB = '.strtolower($name).'CB || [];'
          .strtolower($name).'CB.push(function(helpers) {'
          .'helpers.createIframe("#_'.bin2hex($randomkey).'", {';
        foreach ($iframe->attributes as $key => $value) {
            $script .= $value->nodeName.': "'.$value->nodeValue.'",';
        }
        $script .= '});';
        $script .= '});</script> ';
        $_class = $container->getAttribute('class');
        $container->setAttribute('class', $_class.' gdpr-mask');
        $container->setAttribute('data-gdpr', $name);
        $container->setAttribute('id', '_'.bin2hex($randomkey));
        // remplace iframe
        $fragment = $container->ownerDocument->createDocumentFragment();
        $fragment->appendXML($script);
        $clone = $container->cloneNode(); // Get element copy without children
        $clone->appendChild($fragment);
        $container->parentNode->replaceChild($clone, $container);

        // switch src to data-src
        $src = $iframe->getAttribute('src');
        $iframe->setAttribute('data-src', $src);
        $iframe->removeAttribute('src');
    }
}

/**
 * filter the content
 */
add_filter('the_content', function ($content) {
    return namespace\parse($content);
});
