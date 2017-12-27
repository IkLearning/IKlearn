<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../app/public/source/css/style.css">
    <link rel="stylesheet" href="../../app/public/source/css/scroll.css">
    <title>Bán Tướng LMHT</title>
</head>
<body>
    <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
    <?php include('modules/menu.php') ?>
    <div class="container" style="min-height:600px;">
        <?php include($this->partial) ?>
    </div>
    <?php include('modules/footer.php') ?>
    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="../../app/public/source/js/main.js"></script>
    <script>
        $(window).scroll(function() {
            if ($(this).scrollTop() >= 300) {   
                $('#return-to-top').fadeIn(200);
            } else {
                $('#return-to-top').fadeOut(200); 
            }
        });
        $('#return-to-top').click(function() { 
            $('body,html').animate({
                scrollTop : 0 
            }, 500);
        });
    </script>

</body>
</html>