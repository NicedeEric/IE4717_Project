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
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="categoryFilter">
            All Categories
            <hr>
            <form action="handle_categorize.php" method="GET" id="categorizeForm">
                <ul class="categories">
                    <li id="Mobile Phone">Mobile Phone</li>
                    <li id="Laptop">Laptop</li>
                    <li id="Tablet">Tablet</li>
                    <li id="Earphone">Earphone</li>
                    <li id="Monitor">Monitor</li>
                    <li id="Game Console">Game Console</li>
                    <li id="Camera">Camera</li>
                    <input type="hidden" name="categoryType" id="categoryType">
                </ul>
            </form>
        </div>
        <hr>
        <div class="priceFilter">
            Price Range
            <div>
            <input type="text" size="10"> - 
            <input type="text" size="10">
            </div>

        </div>
    </div>
</body>
    <script>
        var liElements = document.getElementsByTagName('li');
        var categorizeForm = document.getElementById("categorizeForm");
        var categoryTypeInput = document.getElementById("categoryType");
        for (let i=0;i<liElements.length;i++) {
            let li = liElements[i];
            li.onclick = function () {
                categoryTypeInput.value = li.id;
                categorizeForm.submit();
            }
        }
    </script>
</html>