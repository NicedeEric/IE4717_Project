<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>category sidebar</title>
    <style>
        .sidebar {
            float: left;
            width: 20%;
            height: 100%;
            border: 1px solid #00b0ff;
        }
        .categories {
            /* list-style: none; */
        }
        .categories li {
            list-style: none;
        }
        a {
            text-decoration: none;
            color: #000;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="categoryFilter">
            All Categories 
            <hr>
            <ul class="categories">
                <li><a href="#">Mobile Phone</a></li>
                <li><a href="#">Laptop</a></li>
                <li><a href="#">Earphone</a></li>
                <li><a href="#">Pad</a></li>
            </ul>
        </div>
        <hr>
        <div class="searchFilter">
            Price Range
            <div>
            <input type="text" size="10"> - 
            <input type="text" size="10">
            </div>

        </div>
    </div>
</body>
</html>