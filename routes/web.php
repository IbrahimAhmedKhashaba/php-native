<?php


// var_dump($_SERVER['REQUEST_URI']);
route_get("/","home");
route_post("upload","controllers.upload");
route_get("/lang","controllers.set_language");
// route_get("/index.php","home");
route_get("users","users");
// route_get("/ahly","header");
// route_get("a/rticls");
// route_post("users","create_user");

// var_dump(segment());

