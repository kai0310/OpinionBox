<?php

namespace App\Support;

use Illuminate\Support\HtmlString;
use League\CommonMark\Environment;
use League\CommonMark\Extension\CommonMarkCoreExtension;
use League\CommonMark\Extension\ExternalLink\ExternalLinkExtension;
use League\CommonMark\GithubFlavoredMarkdownConverter;

class Markdown
{
    /**
     * Parse the given Markdown text into HTML.
     *
     * @param  string  $text
     * @param  array  $options
     * @return HtmlString
     */
    public static function parse(string $text, $options = []): HtmlString
    {
        $config = array_merge([
            'html_input' => 'escape',
            'allow_unsafe_links' => false,
            'max_nesting_level' => 30,
            'open_in_new_window' => true,
            'external_link' => [
                'internal_hosts' => config('app.url'),
                'open_in_new_window' => true,
                'html_class' => '',
                'nofollow' => '',
                'noopener' => 'external',
                'noreferrer' => 'external',
            ],
        ], $options);

        // Configure the Environment with all the CommonMark parsers/renderers
        $environment = new Environment($config);
        $environment->addExtension(new CommonMarkCoreExtension());

        // Add this extension
        $environment->addExtension(new ExternalLinkExtension());

        // Instantiate the converter engine and start converting some Markdown!
        $converter = new GithubFlavoredMarkdownConverter($config, $environment);

        return new HtmlString($converter->convertToHtml($text ?? ''));
    }
}
