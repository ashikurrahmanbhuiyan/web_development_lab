<?php
$arr = json_decode(file_get_contents("todo_app.json"), true);
if (isset($_GET['add'])) {
    $arr += array($_GET['title'] => $_GET['description']);
    file_put_contents("todo_app.json", json_encode($arr));
}
if (isset($_GET['delete'])) {
    unset($arr[$_GET['title']]);
    file_put_contents("todo_app.json", json_encode($arr));
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>curd operation</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="todo_app.css">
</head>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
        <div class="mb-3 textpad">
            <h2>ADD A NOTE </h2>
            <h3 class="form-label">Title</h1>
                <input name="title" class="form-control" id="exampleFormControlInput1" placeholder="enter title">
        </div>
        <div class="mb-3 textpad">
            <label for="exampleFormControlTextarea1" class="form-label">Note</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="enter note"></textarea>
        </div>
        <p class="center">
            <button type="submit" name="add" class="btn btn-primary">Add</button>
        </p>
    </form>
    <br>
    <br>
    <br>
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Title</th>
                <th scope="col mb-4">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($arr as $key => $value) {
                echo "<tr>
                <th scope='row'>$i</th>
                <td>$key</td>
                <td>$value</td>
                <td>
                <a href=todo_app.php?title=$key&delete=delete>
                <button type = 'submit' name = 'delete' class='btn btn-primary btn-danger'>Delete</button>
                </a>
                </td>
            </tr>";
                $i++;
            }
            ?>
        </tbody>
    </table>
    <script src="bootstrap.min.js"></script>
</body>

</html>