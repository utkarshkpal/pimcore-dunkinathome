<?php 

return [
    1 => [
        "id" => 1,
        "name" => "toProductList",
        "pattern" => "/\\/(.*)\\/(.*)/",
        "reverse" => "%prefix/%d/%c",
        "module" => NULL,
        "controller" => "product",
        "action" => "productlisting",
        "variables" => "doc,cat",
        "defaults" => NULL,
        "siteId" => NULL,
        "priority" => 0,
        "creationDate" => 1478843570,
        "modificationDate" => 1478853709
    ],
    2 => [
        "id" => 2,
        "name" => "toproductDetail",
        "pattern" => "/\\/(.*)\\/(.*)\\/(.*)/",
        "reverse" => "%prefix/%d/%c/%p",
        "module" => NULL,
        "controller" => "product",
        "action" => "productdetail",
        "variables" => "doc,cat,product",
        "defaults" => NULL,
        "siteId" => NULL,
        "priority" => 1,
        "creationDate" => 1478853687,
        "modificationDate" => 1478853771
    ]
];
