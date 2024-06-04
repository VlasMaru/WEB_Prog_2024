<?php
require_once __DIR__ . '/wop.php';
$categor = ['Smartphones', 'Other'];
?>

<!doctype html>
<html lang = "en">
<head>
    <meta charset="UTF-8" />
    <meta name = "viewport"
          content = "width=device-width, user-scalable, initia;-scale=1.0, maximum-scale=1.0">
    <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
    <title> Task_3 </title>
</head>
<body>
    <form action = "save.php" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" required>
        <label for="category">Сategory</label>

        <?php
        $categories = scandir('categories');
        echo '<select name="category" required>';
        foreach ($categories as $category)
        {
            if ((is_dir("categories/$category")) && ($category != '.') && ($category != '..'))
            {
                echo "<option value='$category'>$category</option>";
            }
        }
        echo '</select>';
        ?>


        <label for="title">Title</label>
        <input type="text" name="title" required>

        <label for="description">Description</label>
        <textarea rows="3" name="description"></textarea>
        <input type="submit" value="Save">
</form>


<div id = "table">
    <table>
        <thead>
        <th>Category</th>
        <th>Title</th>
        <th>Description</th>
        </thead>
        <tbody>
        <?php
        $db = extracted();
        foreach ($db->query("SELECT * FROM web.ad") as $row)
        {
            $category = $row['category'];
            $title = $row['title'];
            $description = $row['description'];
            echo "<tr><td>" . $category . " </td>";
            echo "<td>" . $title . " </td>";
            echo "<td>" . $description . " </td></tr>";
        }

        ?>
        </tbody>
    </table>
</div>

</body>
</html>

