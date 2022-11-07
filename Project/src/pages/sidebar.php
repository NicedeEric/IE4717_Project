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
        }
        .listIcon {
            margin-top: 70px;
            width: 10%;
            height: 20%;
        }
        .categories {
            margin-left: 10px;
            border-bottom: 1px solid #dfdfdf;
        }
        .categories li {
            margin-top: 15px;
            margin-bottom: 15px;
            list-style: none;
            cursor: pointer;
        }
        .priceFilter {
            margin-top: 30px;
        }
        .filterIcon {
            margin-top: 10px;
            margin-left: 10px;
            width: 10%;
            height: 20%;
        }
        #applyPriceFilterButton {
            width: 50%;
            height: 40px;
            color: #fff;
            background-color: #00b0ff;
            border: none;
            font-size: 18px;
            cursor: pointer;
        } 
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="categoryFilter">
            <div style="height: 100px;border-bottom: 1px solid #dfdfdf; margin-left: 10px;">
                <img class="listIcon" src="../img/list_icon.png" alt="">
                <strong style="font-size: 24px;">&nbsp;Categories</strong> 
            </div>
            <form action="handle_categorize.php" method="GET" id="categorizeForm">
                <ul class="categories">
                    <li id="Mobile Phone">Mobile Phone</li>
                    <li id="Laptop">Laptop</li>
                    <li id="Tablet">Tablet</li>
                    <li id="Earphone">Earphone</li>
                    <li id="Monitor">Monitor</li>
                    <li id="Game Console">Game Console</li>
                    <li id="Camera">Camera</li>
                    <li id="all">All</li>
                    <input type="hidden" name="categoryType" id="categoryType">
                </ul>
            </form>
        </div>
        <div class="priceFilter">
            <img class="filterIcon" src="../img/filterIcon.png" alt="">
            <strong style="font-size: 24px;">&nbsp;Price Filter</strong> 
            <div style="margin-left: 10px;margin-top: 20px;">
                <input type="text" size="10" placeholder="$MIN" id="minPrice"> --- 
                <input type="text" size="10" placeholder="$MAX" id="maxPrice">
            </div>
            <div style="text-align:center; width: 80%;margin-top: 20px;">
                <input id="applyPriceFilterButton" type="submit" style="margin: 0 auto;" value="Apply">
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
                li.style.color = "#00b0ff";
                categoryTypeInput.value = li.id;
                categorizeForm.submit();
            }
        }
    </script>
</html>