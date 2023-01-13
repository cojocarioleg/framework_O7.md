<?php

/**
 * @var $errno \wfm\ErrorHandler
 * @var $errstr \wfm\ErrorHandler
 * @var $errfile \wfm\ErrorHandler
 * @var $errline \wfm\ErrorHandler
 */

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
</head>
<body>

    <h1>An error has occurred</h1>
    <p><b>Error Code:</b> <?= $errno  ?></p>
    <p><b>Error Text:</b> <?= $errstr ?></p>
    <p><b>The file in which the error occurred:</b> <?= $errfile ?></p>
    <p><b>The line where the error occurred:</b> <?= $errline ?></p>

</body>
</html>
