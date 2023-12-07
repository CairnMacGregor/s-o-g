<?php 
    include_once "./controllers/indexController.php";
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>SOG Technical</title>
        <meta name="description" content="A small application for tracking fires">
        <meta name="keywords" content="standing, on, giants, technical, fire, forest">
        <link rel="stylesheet" href="./theme/styles/main.css">
    </head>
    <body class="body">

    <h1>Standing On Giants Technical - Cairn MacGregor</h1>
    <div class ="table-wrapper">
        <table class="detail-table">
            <tr class="detail-table-header">
                <th class="detail-table-cell">
                    Code
                </th>
                <th class="detail-table-cell">
                    Forest
                </th>
                <th class="detail-table-cell">
                    Fire Count
                </th>
                <th class="detail-table-cell">
                    Link
                </th>
            </tr>
            <?php foreach($forests as $forest): ?>
                <?php $fireCount = (new Fire())->getTotalFiresByForestName($forest['Name'])?>
                <tr class="detail-table-row">
                    <td class="detail-table-cell">
                        <?= $forest['Code'] ?>
                    </td>
                    <td class="detail-table-cell">
                        <?= $forest['Name'] ?>
                    </td>
                    <td class="detail-table-cell">
                        <?= $fireCount ?>
                    </td>
                    <td class="detail-table-cell">
                        <a href="/forestDetail.php?name=<?=urlencode($forest['Name'])?>" class="detail-link">View Fires</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php if(count($forests) > 0):?>
        <div class = "paginator">
            <div class ="paginator__count">
                <p>Showing <?= $firstItemNumber ?> - <?= $lastItemNumber ?> of <?= $total ?></p>
            </div>
            <?php if($pages > 1): ?>
            <div class = "paginator__buttons">
                <div class="paginator__select">
                    <select onchange="location = this.value;">
                        <?php for($i = 0; $i < $pages; $i++): ?>
                            <option value="?page=<?= $i + 1 ?>" <?= $page === ($i + 1) ? 'selected' : '' ?>>
                                Page <?= $i + 1 ?>
                            </option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</body>
</html>
