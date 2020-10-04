<?php
include('action.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIBRARY APP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="my-5 bg-primary">
    <h1 class="display-2 text-white text-center">LIBRARY APP</h1>
    <hr style="border: 2px solid white;">
    <div class="container">
        <?php if (isset($_SESSION['response'])) { ?>
            <div class="alert alert-<?= $_SESSION['res-type']; ?> alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?= $_SESSION['response']; ?>
            </div>
        <?php }
        unset($_SESSION['response']); ?>

        <div class="row mt-5">
            <div class="col-sm-12 col-md-3 ">
                <?php if ($update == true) { ?>
                    <h3 class="text-light">Update Here</h3>
                <?php } else { ?>
                    <h3 class="text-light">Add Book Here</h3>
                <?php } ?>
                <?php if ($update === true) { ?>
                    <form action="editAction.php" method="POST" class="mt-4">
                    <?php } else { ?>
                        <form action="addAction.php" method="POST" class="mt-4">
                        <?php } ?>
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" value="<?= $title ?>" placeholder="Title Book" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="author" class="form-control" value="<?= $author ?>" placeholder="Book's author" required>
                        </div>
                        <div class="form-group">
                            <input type="number" min=1000 max=9999 name="year" class="form-control" value="<?= $year ?>" placeholder="Year Published (YYYY)" required>
                        </div>
                        <div class="form-group">
                            <?php if ($update == true) { ?>
                                <input type="submit" name="update" class="btn btn-success btn-block" value="Update">
                            <?php } else { ?>
                                <input type="submit" name="save" class="btn btn-light btn-block" value="Save">
                            <?php } ?>
                        </div>
                        </form>
            </div>
            <div class="col-sm-12 col-md-9 ">
                <h3 class="text-light text-center">
                    List of Books in the Database</h3>
                <?php
                $query = "SELECT * FROM bookfield";
                $result = $conn->query($query);
                ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-light mt-4">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Year Published</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?= $row['title'] ?></td>
                                    <td><?= $row['author'] ?></td>
                                    <td><?= $row['year'] ?></td>
                                    <td>
                                        <a href="index.php?id=<?= $row['id']; ?>" class="btn btn-success">Edit</a>
                                        <a href="deleteAction.php?delete=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Do you want to delete this record?')">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>