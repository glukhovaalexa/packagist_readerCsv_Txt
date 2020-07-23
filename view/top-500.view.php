<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous>">
</head>

<body>
    <div class="container">
        <h3 class="mb-3 text-danger">
            TOP-500 Most Popular Domains
        </h3>
        <?php $top500 = array_slice($domainsRecords, 0, 500) ?>
        <?php if(count ($top500) > 0): ?>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Domain</th>
                    <th scope="col">IP-address</th>
                    <th scope="col">Rang</th>
                    <th scope="col">Status</th>
                    <th scope="col">Checked at</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($top500 as $domain => $rang): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $domain ?></td>
                    <td><?= gethostbyname($domain) ?></td>
                    <td><?= $rang ?></td>
                    <td><?php echo $status->getStatus($domain)['status'];  ?></td>
                    <td><?php echo round($status->getStatus($domain)['time'], 2); ?> min ago</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif ?>
    </div>

</body>

</html>