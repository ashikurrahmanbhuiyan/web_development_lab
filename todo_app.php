<?php
$arr = [
    'ashik' => '123',
    'admin' => 'admin'

];
if (isset($_GET['submit'])) {
    echo  $_GET['email'];
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
        <h2>ADD A NOTE </h2>
        <div class="mb-3 textpad">
            <h3 class="form-label">Title</h1>
            <input name="email" class="form-control" id="exampleFormControlInput1" placeholder="enter title">
        </div>
        <div class="mb-3 textpad">
            <label for="exampleFormControlTextarea1" class="form-label">Note</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="enter note"></textarea>
        </div>
        <p class="center">
            <button type="submit" name="submit" class="btn btn-primary">Add</button>
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
            <script src="bootstrap.min.js"></script>
</body>

</html>