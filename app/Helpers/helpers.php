<?php


function YoutubeID($url)
{
    if(strlen($url) > 11)
    {
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
        {
            return $match[1];
        }
        else
            return false;
    }

    return $url;
}