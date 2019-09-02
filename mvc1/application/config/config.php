<?php
return [
    'db'=>[
        "user" => "root",
        "pwd" => "root",
        "dbname" => "mvc",
    ],
    'app'=>[
        "default_platform"=>"home"
    ],
    "home"=>[
        "default_controller"=>"Student",
        "default_action"=>"listAll",
    ],
    "admin"=>[
        "default_controller"=>"",
        "default_action"=>"",
        ]

];