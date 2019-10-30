<?php

  function current_page($url = "/"){
    return request()->path() == $url;
  }
  