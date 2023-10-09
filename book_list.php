<?php
$josn_file = "book_list.json";
$arr = json_decode(file_get_contents($josn_file), true);
if (isset($_GET['add']) && ($_GET['title'] != '')) {
    $arr = array_merge($arr, array(array(
        "id" => count($arr) + 1,
        "title" => $_GET['title'],
        "author" => $_GET['author'],
        "available" => $_GET['available'],
        "pages" => $_GET['pages'],
        "isbn" => $_GET['isbn']
    )));
    file_put_contents($josn_file, json_encode($arr));
    header("Location: book_list.php");
}
if (isset($_GET['delete'])) {

    $id = $_GET['id'];
    unset($arr[$id - 1]);
    $arr = array_values($arr);
    file_put_contents($josn_file, json_encode($arr));
    header("Location: book_list.php");
}
if (isset($_GET['submit-btn'])) {
    $search = $_GET['search'];
    $arr = array_filter($arr, function ($a) use ($search) {
        return ($a['title'] == $search);
    });
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>curd operation</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="book_list.css">
</head>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
        <div class="mb-3" style="padding-left: 7%;padding-right: 7%;">
            <a style="text-align: center;" href="book_list.php">
                <h2>Add A Book </h2>
            </a>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input name="title" class="form-control" placeholder="Book title">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Author</label>
                <div class="col-sm-10">
                    <input name="author" class="form-control" placeholder="Book author">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Available</label>
                <div class="col-sm-10">
                    <select name="available" class="form-select" aria-label="Default select example">
                        <option selected>Select Availability</option>
                        <option value="0">NO</option>
                        <option value="1">YES</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Pages</label>
                <div class="col-sm-10">
                    <input name="pages" class="form-control" placeholder="Book pages">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Isbn</label>
                <div class="col-sm-10">
                    <input name="isbn" class="form-control" placeholder="Book isbn">
                </div>
            </div>

        </div>
        <p style="text-align: center;">
            <button type="submit" name="add" class="btn btn-primary">Add</button>
        </p>
    </form>
    <br>
    <br>
    <br>
    <!-- search bar -->
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
        <div class="input-group" style="padding-left: 70%;">
            <input name="search" type="search" class="form-control rounded" placeholder="Search with book title" />
            <button name="submit-btn" type="submit" class="btn btn-outline-primary">search</button>
        </div>
    </form>
    <br>

    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Book Title</th>
                <th scope="col">Author</th>
                <th scope="col">Available</th>
                <th scope="col">Pages</th>
                <th scope="col">Isbn</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($arr as $a) {
                echo "<tr>
                <th scope='row'>" . $i . "</th>
                <td>" . $a['title'] . "</td>
                <td>" . $a['author'] . "</td>
                <td>";
                if ($a['available'] == 1) echo "YES";
                if ($a['available'] == 0) echo ' NO';
                echo "</td>
                <td>" . $a['pages'] . "</td>
                <td>" . $a['isbn'] . "</td>
                <td>
                <a href=book_list.php?id=" . $i . "&delete=delete>
                <button class='btn btn-primary btn-danger'>Delete</button>
                </a>
                </td>
            </tr>";
                $i++;
            }
            ?>
        </tbody>
    </table>
    <script src="bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>