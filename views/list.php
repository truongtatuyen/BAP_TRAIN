<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo constant('SITE_NAME') ?> - News List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h1 class="text-center">News List</h1>
                <ul class="text-left">
                    <?php foreach ($newsList as $news) {
                        $url = str_replace('{id}', $news->getId(), $routes->get('news_show')->getPath());
                        ?>
                    <li>
                        ID - <b><?php echo $news->getId(); ?></b>
                    </li>
                    <li>
                        TITLE - <b><?php echo $news->getTitle(); ?></b>
                    </li>
                    <li>
                        DESCRIPTION - <b><?php echo $news->getDescription(); ?></b>
                    </li>
                    <li>
                        <a href="<?php echo $url; ?>">Link to detail</a>
                    </li>
                        <br>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>