<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <style>
        .block {
            width: 600px;
            margin-top: 100px;
        }
        .category-list * {transition: .4s linear;}
        .category-list {
            background: white;
            list-style-type: circle;
            list-style-position: inside;
            padding: 0 10px;
            margin: 0;
        }
        .category-list li {
            font-family: "Trebuchet MS", "Lucida Sans";
            border-bottom: 1px solid #efefef;
            padding: 10px 0;
        }
        .category-list a {
            text-decoration: none;
            color: #555;
        }
        .category-list li span {
            float: right;
            display: inline-block;
            border: 1px solid #efefef;
            padding: 0 5px;
            font-size: 13px;
            color: #999;
        }
        .category-list li:hover a {color: #c93961;}
        .category-list li:hover span {
            color: #c93961;
            border: 1px solid #c93961;
        }

        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
        }

        .pagination a.active {
            background-color: dodgerblue;
            color: white;
        }

        .pagination a:hover:not(.active) {background-color: #ddd;}
    </style>
</head>
<body>
<h1>Тестовое задание - вывод списка пользователей</h1>

    <div class="pagination">
        <a href="/?p=0">Первая страница</a>
        <a href="/?p={if $current_page <= 1}0{else}{$current_page-1}{/if}">&laquo;</a>
        <a {if $total / $per_page > $current_page}href="/?p={$current_page+1}{/if}">&raquo;</a>
        <a href="/?p={$total / $per_page}">Последняя страница</a>
    </div>

    <div class="block">
        <ul class="category-list">
            {foreach from=$list item=$e}
                {$e.user_id}
                <li>{$e.first} {$e.last} ({$e.city}) <span title="Количество родственников">{$e.items}</span></li>
            {/foreach}
        </ul>
    </div>
</body>
</html>

