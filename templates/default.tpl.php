<!DOCTYPE html>
<html>
<head>
    <title><?php echo $this->content['title']; ?></title>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-2.2.1.js"></script>
    <!-- Custom JS -->
    <script src="templates/js/script.js"></script>
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
    <section class="container">
        <header></header>
        <nav></nav>
        <main>
            <div class="row">
                <div class="col-md-4">
                    <button class="btn btn-primary btn-block" onclick="getData();">Test</button>
                </div>
                <div class="col-md-8" id="dataBody"></div>
            </div>
            <div class="row">
                <?php echo $this->content['content']; ?>
                <br />
                <?php echo $this->content['footer']; ?>
            </div>
        </main>
        <footer></footer>
    </section>
</body>