<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/static/style.css">
</head>
<body>
<h1>Тестовое задание - вывод списка пользователей</h1>

    <div class="pagination">
        <a href="/?p=0">Первая страница</a>
        <a href="/?p={if $current_page <= 1}0{else}{$current_page-1}{/if}">&laquo;</a>
        <a {if $total / $per_page < $current_page}href="/?p={$current_page+1}{/if}">&raquo;</a>
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

