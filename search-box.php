<?php include 'db.php' ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Eskom se VC</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Eskom se VC</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Province</th>
                                    <th>City</th>
                                    <th>Suburb</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Day 1</th>
                                    <th>Day 2</th>
                                    <th>Day 3</th>
                                    <th>Day 4</th>
                                    <th>Day 5</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                function replace_null($value, $replace) {
    if(empty($value) && $value !== '0') {
        return $replace;
    } else {
        return $value;
    }
}
                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM schedule WHERE CONCAT(Province,City,Suburb) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($connection, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {

                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['Province']; ?></td>
                                                    <td><?= $items['City']; ?></td>
                                                    <td><?= $items['Suburb']; ?></td>
                                                    <td><?= $items['Time_Start']; ?></td>
                                                    <td><?= $items['Time_End']; ?></td>
                                                    <td><?= replace_null($items['Day_1'], "no loadshedding"); ?></td>
                                                    <td><?= replace_null($items['Day_2'], "no loadshedding"); ?></td>
                                                    <td><?= replace_null($items['Day_3'], "no loadshedding"); ?></td>
                                                    <td><?= replace_null($items['Day_4'], "no loadshedding") ?></td>
                                                    <td><?= replace_null($items['Day_5'], "no loadshedding"); ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
