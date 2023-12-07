
<?php
    include_once "./controllers/forestController.php";
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?= $forestName?></title>
        <meta name="description" content="A small application for tracking fires">
        <meta name="keywords" content="standing, on, giants, technical, fire, forest">
        <link rel="stylesheet" href="./theme/styles/main.css">
    </head>
    <body class="body">



    <h1><?= htmlspecialchars($forestName) ?></h1>
    <h4><?= $total?> total fires</h4>
    <div class ="table-wrapper">
        <table class="detail-table">
            <tr class="detail-table-header">
                <th class="detail-table-cell">FPA ID</th>
                <th class="detail-table-cell">Fire</th>
                <th class="detail-table-cell">Discovery Date</th>
                <th class="detail-table-cell">Cause</th>
                <th class="detail-table-cell">Size</th>
                <th class="detail-table-cell">Latitude</th>
                <th class="detail-table-cell">Longitude</th>
                <th class="detail-table-cell">State</th>
            </tr>
        <?php foreach($forestFires as $fire): ?>
            <?php
                $julianDate = $fire['DISCOVERY_DATE'];
                $unixTimestamp = ($julianDate - 2440587.5) * 86400;
                $discoveryDate = date('d-m-Y', $unixTimestamp);
            ?>
            <tr class="detail-table-row">
                <td class="detail-table-cell"><?= htmlspecialchars($fire['FPA_ID']) ?></td>
                <td class="detail-table-cell"><?= htmlspecialchars($fire['FIRE_NAME']) ?></td>
                <td class="detail-table-cell"><?= htmlspecialchars($discoveryDate) ?></td>
                <td class="detail-table-cell"><?= htmlspecialchars($fire['STAT_CAUSE_DESCR']) ?></td>
                <td class="detail-table-cell"><?= htmlspecialchars($fire['FIRE_SIZE']) ?></td>
                <td class="detail-table-cell"><?= htmlspecialchars($fire['LATITUDE']) ?></td>
                <td class="detail-table-cell"><?= htmlspecialchars($fire['LONGITUDE']) ?></td>
                <td class="detail-table-cell"><?= htmlspecialchars($fire['STATE']) ?></td>
            </tr>
        <?php endforeach; ?>
        </table>
    </div>
    <?php if(count($forestFires) > 0):?>

    <div class = "paginator">
        <div class ="paginator__count">
            <p>Showing <?= $firstItemNumber ?> - <?= $lastItemNumber ?> of <?= $total ?></p>
        </div>
        <?php if($pages > 1): ?>
        <div class = "paginator__buttons">
            <div class="paginator__select">
                <select onchange="location = this.value;">
                    <?php for($i = 0; $i < $pages; $i++): ?>
                        <option value="?name=<?= urlencode($forestName) ?>&page=<?= $i + 1 ?>" <?= $page === ($i + 1) ? 'selected' : '' ?>>
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