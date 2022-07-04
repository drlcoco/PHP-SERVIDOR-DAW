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
    <title>Search Form</title>
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
    <div class="container mt-2 bg-light mt-4">
        <div class="row text-center">
            <div class="col d-flex flex-column justify-content-center align-self-center">
                <form action="countryresult.php" method="get">
                    <fieldset>
                      <legend class="mt-4">Write the country:</legend>
                      <div class="mb-3">
                        <label for="country" class="form-label"></label>
                        <input type="text" id="country" name="country" class="form-control" >
                      </div>
                      <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" class="btn btn-primary mb-4">SEARCH</button>
                      </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>