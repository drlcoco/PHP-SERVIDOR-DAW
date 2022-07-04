<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Insert Form</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Articles</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" aria-current="page" href="insertform.php"><i class="bi bi-cloud-arrow-up"></i> Insert</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="searchform.php"><i class="bi bi-search"></i> Search</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <h1 class="m-3 text-center">Create a new article</h1>

    <div class="container mt-2 bg-light">
        <div class="row text-center">
            <div class="col d-flex flex-column justify-content-center align-self-center">
                <form action="resultinsert.php" method="POST" class="m-5">
                    <div class="mb-3 row">
                        <label for="section" class="col-sm-2 col-form-label">Article Section</label>
                        <div class="col-sm-10">
                            <input type="text" name="section" id="section" class="form-control" value="<?php 
                                if(isset($_POST['submit']) && isset($_POST['section'])){
                                    echo $_POST['section'];
                                }?>">
                            <?php 
                                if(isset($_POST['submit']) && empty($_POST['section'])){
                                    echo "<span class ='messageError' style=color:darkred>- You must enter a            section!</span>";
                                }?>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="article" class="col-sm-2 col-form-label">Article Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="article" id="article" class="form-control" value="<?php 
                                if(isset($_POST['submit']) && isset($_POST['article'])){
                                    echo $_POST['article'];
                                }?>">
                            <?php 
                                if(isset($_POST['submit']) && empty($_POST['article'])){
                                    echo "<span class ='messageError' style=color:darkred>- You must enter an           article!</span>";
                                }?>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="price" class="col-sm-2 col-form-label">Article Price</label>
                        <div class="col-sm-10">
                            <input type="text" name="price" id="price" class="form-control" value="<?php 
                                if(isset($_POST['submit']) && isset($_POST['price'])){
                                    echo $_POST['price'];
                                }?>">
                            <?php 
                                if(isset($_POST['submit']) && empty($_POST['price'])){
                                    echo "<span class ='messageError' style=color:darkred>- You must enter a price!</           span>";
                                }?>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="country" class="col-sm-2 col-form-label">Article Country</label>
                        <div class="col-sm-10">
                            <input type="text" name="country" id="country" class="form-control" value="<?php 
                                if(isset($_POST['submit']) && isset($_POST['country'])){
                                    echo $_POST['country'];
                                }?>">
                            <?php 
                                if(isset($_POST['submit']) && empty($_POST['country'])){
                                    echo "<span class ='messageError' style=color:darkred>- You must enter a            country!</span>";
                                }?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" name="submit" class="btn btn-primary mb-4">Insert</button>
                        </div>
                    </div>
                </form>
    
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>