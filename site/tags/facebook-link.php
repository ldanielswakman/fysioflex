<?php

kirbytext::$tags['facebook-follow-button'] = array(
  'html' => function($tag) {

    $link = $tag->attr('facebook-follow-button');

    $html  = '<div id="fb-root"></div>';
    $html .= '<script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/nl_NL/sdk.js#xfbml=1&version=v2.9&appId=1458298001134890"; fjs.parentNode.insertBefore(js, fjs);}(document, \'script\', \'facebook-jssdk\'));</script>';
    $html .= '<div class="fb-follow" data-href="' . $link . '" data-layout="standard" data-size="small" data-show-faces="true"></div>';

    return $html;
  }
);
