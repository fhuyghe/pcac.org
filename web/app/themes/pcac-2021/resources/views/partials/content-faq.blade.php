@php 
    $content = get_the_content();
    $content =  '<div><div>' . $content;
    $content = str_replace('<h2>', '</div></div><h2>', $content);
    $content = str_replace('</h2>', '</h2><div><div>', $content);
    $content = str_replace('<h3', '</div></div><div class="question"><header><h3', $content);
    $content = str_replace('</h3>', '</h3></header><div class="answer">', $content);
    $content = $content . '</div></div>';

@endphp
<section id="content">
    <div class="container">
        {!! $content !!}
    </div>
</section>
