<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Tasks Viewer</title>

    <link type="text/css" rel="stylesheet" href="" />
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<h1>My Tasks</h1>

<?php

include("mongoconnect.php");

 while ($cursor->hasNext()):
    $task = $cursor->getNext(); ?>
    <h2><?= $task['title'] ?></h2>
    <strong>Status:</strong> <?= $task['status']?> <br />
    <strong>Context:</strong> <?= $task['context']?><br />
<?php endwhile;?>
</body>
</html>
