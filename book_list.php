<?php
$josn_file = "book_list.json";
$arr = json_decode(file_get_contents($josn_file), true);
if (isset($_GET['add'])) {
    $arr = array_merge($arr, array(array("id" => count($arr) + 1, "title" => $_GET['title'], "writter" => $_GET['writter'])));
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
if(isset($_GET['submit-btn'])){
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
        <div class="mb-3 textpad">
            <a href="book_list.php"><h2>Add A Book </h2></a>
            <h4 class="form-label">Book Title</h1>
                <input name="title" class="form-control" id="exampleFormControlInput1" placeholder="enter title">
        </div>
        <div class="mb-3 textpad">
            <h4 class="form-label">Writter</h1>
                <input name="writter" class="form-control" id="exampleFormControlInput1" placeholder="enter note">
        </div>
        <p class="center">
            <button type="submit" name="add" class="btn btn-primary">Add</button>
        </p>
    </form>
    <br>
    <br>
    <br>
    <!-- search bar -->
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
        <div class="input-group" style="padding-left: 70%;">
            <input name= "search" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <button name = "submit-btn" type="submit" class="btn btn-outline-primary">search</button>
        </div>
    </form>
    <br>

    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Book Title</th>
                <th scope="col mb-4">Writter</th>
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
                <td>" . $a['writter'] . "</td>
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