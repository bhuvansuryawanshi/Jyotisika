<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Earnings Breakdown</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/Pujari/jyotishvitaran.png');?>" type="image/png">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8f8f8;
            font-family: 'Montserrat', serif;
        }

        .table-container {

            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .filter-btn {
            float: right;
            cursor: pointer;
        }

        .highlight-row {
            background-color: #a8e6a2 !important;
        }

        .table-fixed thead,
        .table-fixed tbody tr {
            display: table;
            width: 100%;
            table-layout: fixed;
        }

        .table-fixed tbody {
            display: block;
            max-height: 300px;
            overflow-y: auto;
        }

        .filter-dropdown {
            display: none;
        }

        .mb-3 {
            margin-bottom: 1rem !important;
            margin-top: 100px;
        }
    </style>
</head>

<body style="font-family: 'Montserrat', serif;">
    <header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>
    <div style="min-height: 100vh;">
        <div class="container">
            <h5 class="mb-3">
                <a class="text-decoration-none text-dark" href="<?php echo base_url('PujariUser/AnalyticsAndEarning2'); ?>">
                    <img src="<?php echo base_url('assets/images/Pujari/arrow_back.png'); ?>" alt="Back">
                    Earnings Breakdown
                </a>
            </h5>
            

            <div class="table-container">
                <h5>Online puja Breakdown <button class="filter-btn btn btn-light" onclick="toggleFilter('online')">Filter</button></h5>
                <div class="filter-dropdown text-end" id="onlineFilterDropdown">
                    <select id="onlineFilter" onchange="filterData('online')">
                        <option value="">All</option>
                        <option value="Rahu-ketu">Rahu-ketu</option>
                        <option value="Ghar shanti">Ghar shanti</option>
                    </select>
                </div>
                <table class="table table-bordered table-fixed  text-center table table-striped">
                    <thead>

                        <tr>
                            <th>Name</th>
                            <th>Pooja</th>
                            <th>Fees</th>
                        </tr>
                    </thead>
                    <tbody id="onlineBody">
                        <?php if(!empty($earnings)) : ?>
                        <?php foreach($earnings as $earning) : ?>
                        <tr>
                            <td><?php echo $earning['user_name']; ?></td>
                            <td><?php echo $earning['name']; ?></td>
                            <td><?php echo $earning['price']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>

            <div class="table-container">
                <h5>Mob puja Breakdown <button class="filter-btn btn btn-light" onclick="toggleFilter('mob')">Filter</button></h5>
                <div class="filter-dropdown text-end " id="mobFilterDropdown">
                    <select id="mobFilter" onchange="filterData('mob')">
                        <option value="">All</option>
                        <option value="Rahu-ketu">Rahu-ketu</option>
                        <option value="Ghar shanti">Ghar shanti</option>
                    </select>
                </div>
                <table class="table table-bordered table-fixed  text-center table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Pooja</th>
                            <th>Fees</th>
                        </tr>
                    </thead>
                    <tbody id="mobBody">
                        <?php if(!empty($earningMob)) : ?>
                            <?php foreach($earningMob as $earningMobs) : ?>
                        <tr>
                            <td><?php echo $earningMobs['user_name']; ?></td>
                            <td><?php echo $earningMobs['service_name']; ?></td>
                            <td><?php echo $earningMobs['discount_price']; ?> </td>
                        </tr>
                         <?php endforeach; ?>
                        <?php endif ?>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>
    <script>
        function toggleFilter(category) {
            let filterDropdown = document.getElementById(category + 'FilterDropdown');
            filterDropdown.style.display = (filterDropdown.style.display === "none" || filterDropdown.style.display === "") ? "block" : "none";
        }

        function filterData(category) {
            let filterValue = document.getElementById(category + 'Filter').value;
            let tableBody = document.getElementById(category + 'Body');
            let rows = tableBody.getElementsByTagName('tr');

            for (let row of rows) {
                let poojaType = row.getElementsByTagName('td')[1].innerText;
                if (filterValue === "" || poojaType === filterValue) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        }
    </script>
</body>

</html>