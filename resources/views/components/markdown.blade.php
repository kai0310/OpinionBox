@props(['text' => '', 'options' => []])

<div class="prose prose-blue">
    {{ \App\Support\Markdown::parse($text, $options) }}
</div>
