<?php

define('POSTS_DIR', '/var/www/posts');

define('POST_FILE_REGEXP', '/^(.*)\.org$/');
define('POST_PROP_REGEXP', '/\#\+([A-Z]+)\:\ (.*)\n/');

function post_filename($slug) {
    return sprintf("%s/%s.org", POSTS_DIR, $slug);
}

// loads all posts... :-/
function get_posts_by_tag($tag) {
    return array_filter(get_posts(),
    function ($post) use($tag) { return in_array(strtolower($tag), $post['tags']); });
}

// gets all posts, sorts them by date, asc
function get_posts() {
    $posts = $matches = array();

    foreach (array_diff(scandir(POSTS_DIR), array('..', '.')) as $post)
        if (preg_match(POST_FILE_REGEXP, $post, $matches))
            $posts[$matches[1]] = get_post($matches[1]);

    uasort($posts, function($p1, $p2) { return ($p1['date'] >= $p2['date']) ? -1 : 1; });

    return $posts;
}

// gets a post by slug, with all its metadata
function get_post($slug) {
    if (!is_readable(post_filename($slug)))
        return false;

    $parsedown = new Parsedown();

    $content = file_get_contents(post_filename($slug));
    $headers = parse_headers($content);
    $content = preg_replace(POST_PROP_REGEXP, '', $content);
    $content = $parsedown->parse($content);

    return array_merge(array('content' => $content), $headers);
}

// gets post metadata from org mode headers
function parse_headers($content) {
    $matches = $headers = array();

    preg_match_all(POST_PROP_REGEXP, $content, $matches);

    foreach ($matches[1] as $key => $prop) {
        $val = $matches[2][$key];

        if ($prop == "DATE")
            $val = DateTime::createFromFormat("<Y-m-d>", $matches[2][$key]);
        else if ($prop == "TAGS")
            $val = array_map('strtolower', array_map('trim', explode(",", $matches[2][$key])));

        $headers[strtolower($prop)] = $val;
    }

    return $headers;
}