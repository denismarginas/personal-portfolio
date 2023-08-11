<?php
$pagesDirectory = __DIR__ . '/../../pages/';

// Create an array to store page data
$pageData = [];

// Get all HTML files in the pages directory
$htmlFiles = scandir($pagesDirectory);

foreach ($htmlFiles as $file) {
    if ($file !== '.' && $file !== '..' && pathinfo($file, PATHINFO_EXTENSION) === 'html') {
        $htmlContent = file_get_contents($pagesDirectory . $file);
        // Create a DOMDocument instance and load the HTML content
        $dom = new DOMDocument();
        @$dom->loadHTML($htmlContent);

        $title = $dom->getElementsByTagName('title')->item(0)->nodeValue;

        $metaDescription = '';
        $metaTags = $dom->getElementsByTagName('meta');
        foreach ($metaTags as $metaTag) {
            if ($metaTag->getAttribute('name') === 'description') {
                $metaDescription = $metaTag->getAttribute('content');
                break;
            }
        }

        // Extract main content without HTML tags and with elements having class "dm-debug" ignored
        $content = '';
        $bodyElement = $dom->getElementsByTagName('body')->item(0);
        extractContent($content, $bodyElement); // Call the function directly

        // Remove newline characters and extra spaces
        $content = trim(preg_replace('/\s+/', ' ', $content));

        $pageData[] = [
            'meta-title' => $title,
            'meta-description' => $metaDescription,
            'content' => $content
        ];
    }
}

function extractContent(&$content, $node) {
    if ($node->nodeType === XML_TEXT_NODE) {
        $content .= $node->textContent . ' ';
    } elseif ($node->nodeType === XML_ELEMENT_NODE && $node->getAttribute('class') !== 'dm-debug') {
        foreach ($node->childNodes as $childNode) {
            extractContent($content, $childNode);
        }
    }
}

// Convert the page data array to JavaScript format
$jsContent = 'var content_data = ' . json_encode($pageData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . ';';

$targetDirectory = __DIR__ . '/../../../themes/dm-theme/assets/js/';
$filePath = $targetDirectory . 'content-data-index.js';

if (!is_dir($targetDirectory)) {
    mkdir($targetDirectory, 0755, true);
}

file_put_contents($filePath, $jsContent);
?>