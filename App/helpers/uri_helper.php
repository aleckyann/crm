<?php

function segment($posicao) {
    $segmentos = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $segmentos[0] = $_SERVER['SERVER_NAME'];

    if(array_key_exists($posicao, $segmentos)){
        return $segmentos[$posicao];
    } else {
        return '';
    }
}


function active($posicao, $segmento2)
{
    $segmento1 = segment($posicao);

    if($segmento1 === $segmento2){
        return 'class="active"';
    } else {
        return '';
    }
}


function colapsed($posicao, $segmento2)
{
    $segmento1 = segment($posicao);

    if($segmento1 === $segmento2){
        return 'class="colapsed"';
    } else {
        return 'class="collapse"';
    }
}


function get_posts_blog(){
    $posts_json = @file_get_contents('http://blog.wolko.com.br/wp-json/wp/v2/posts');
    $posts = json_decode($posts_json);
    $result = array();

    foreach ($posts as $post) {
        // Busca imagem pelo id retornado do post
        $imagem = json_decode(@file_get_contents('https://blog.wolko.com.br/wp-json/wp/v2/media/'.$post->featured_media))->guid->rendered;

        array_push($result, array(
            'titulo' => $post->title->rendered,
            'link' => $post->link,
            'media' => $imagem)
        );
    }
    return $result;
}

 ?>
