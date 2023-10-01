<?php
$josn_file = "todo_app.json";
$arr = json_decode(file_get_contents($josn_file), true);
if (isset($_GET['add'])) {
    $arr = array_merge($arr, array(array("id" => count($arr) + 1, "title" => $_GET['title'], "desc" => $_GET['description'])));
    file_put_contents($josn_file, json_encode($arr));
}
if (isset($_GET['delete'])) {

    $id = $_GET['id'];  
    unset($arr[$id-1]);
    $arr = array_values($arr);
    file_put_contents($josn_file, json_encode($arr));
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
            foreach ($arr as $a) {
                echo "<tr>
                <th scope='row'>".$i."</th>
                <td>".$a['title']. "</td>
                <td>" . $a['desc'] . "</td>
                <td>
                <a href=todo_app.php?id=".$i."&delete=delete>
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
</body>

</html>
