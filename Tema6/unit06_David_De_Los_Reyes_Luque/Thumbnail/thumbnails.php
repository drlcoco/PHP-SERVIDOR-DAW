<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="bg-primary">
    <div class="container mt-2 bg-primary">
        <div class="row text-center justify-content-center mt-4">
            <div class="col-8 d-flex flex-column justify-content-center align-self-center">
                <h1 class="text-center m-4">Create Thumbnail</h1>
                <form action= "upload.php" enctype= "multipart/form-data" method="post">
                    <input type="hidden" name="MAX_FILE_SIZE" value="2086285">
                    <div class="mb-3">
                      <label for="formFile" class="form-label mt-4">Select an image:</label>
                      <input class="form-control" type="file" name="image" id="formFile">
                    </div>
                    <div class="row mt-4">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <input class="btn btn-dark" type="submit"  name="send" value="Create">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        //
        if(!empty($_GET['ext'])){
        ?>
        <div class="row mt-4">
            <div class="col text-center">
                <?php echo' <img src="./uploads/sample120.'.$_GET['ext'].'" alt="">'; ?>
            
            </div>
        </div>
        <div class="row  mt-4">
            <div class="col text-center">
            <?php echo '<img src="./uploads/sample200.'.$_GET['ext'].'" alt="">'; ?>
            </div>
        </div>
    </div>
    <?php    
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

