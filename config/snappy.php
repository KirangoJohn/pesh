<?php
return [
'pdf' => array(
        'enabled' => true,
        'binary'  => '/usr/local/bin/wkhtmltopdf', // Or specified your custom wkhtmltopdf path
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),
];