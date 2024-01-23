<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques | Suivi des salles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
</head>
<body>
    <?php include_once('../Parts/navbar.php') ?>
    <?php include_once('../connect.inc.php') ?>
    <div class="container-fluid">
        <div>
            <select class="select-picker" id="select-room" data-live-search="true" data-selected-text-format="selected" data-style="btn-light" data-width="10%" data-dropup-auto="false" data-size="6" title="Choisir Salle"> 
                <?php
                    $query = "SELECT DISTINCT room FROM Device WHERE building = 'A' ORDER BY room ASC;";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();

                    $result = $stmt->get_result();

                    while($row = $result->fetch_assoc())
                    {
                        echo "<option value=" . $row['room'] . ">" . $row['room'] . "</option>";
                    }
                ?>
                <div class="dropdown-divider"></div>
                <?php
                    $query = "SELECT DISTINCT room FROM Device WHERE building = 'B' ORDER BY room ASC;";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();

                    $result = $stmt->get_result();

                    while($row = $result->fetch_assoc())
                    {
                        echo "<option value=" . $row['room'] . ">" . $row['room'] . "</option>";
                    }
                ?>
                <div class="dropdown-divider"></div>
                <?php
                    $query = "SELECT DISTINCT room FROM Device WHERE building = 'C' ORDER BY room ASC;";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();

                    $result = $stmt->get_result();

                    while($row = $result->fetch_assoc())
                    {
                        echo "<option value=" . $row['room'] . ">" . $row['room'] . "</option>";
                    }
                ?>
                <div class="dropdown-divider"></div>
                <?php
                    $query = "SELECT DISTINCT room FROM Device WHERE building = 'E' ORDER BY room ASC;";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();

                    $result = $stmt->get_result();

                    while($row = $result->fetch_assoc())
                    {
                        echo "<option value=" . $row['room'] . ">" . $row['room'] . "</option>";
                    }
                ?>
            </select>
        </div>
        <div class="row my-4">
            <div class="col-12 col-lg-6">
                <div class="p-3 mx-1 my-4 border border-1 rounder-1 shadow" id="chart1">
                    <div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><span class="visually hidden">Loading</span><p class="m-0 fs-4 my-5 ds-title"></p></div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="p-3 mx-1 my-4 border border-1 rounder-1 shadow" id="chart2">
                    <div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><span class="visually hidden">Loading</span><p class="m-0 fs-4 my-5 ds-title"></p></div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="p-3 mx-1 my-4 border border-1 rounder-1 shadow" id="chart3">
                    <div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><span class="visually hidden">Loading</span><p class="m-0 fs-4 my-5 ds-title"></p></div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="p-3 mx-1 my-4 border border-1 rounder-1 shadow" id="chart4">
                    <div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><span class="visually hidden">Loading</span><p class="m-0 fs-4 my-5 ds-title"></p></div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="p-3 mx-1 my-4 border border-1 rounder-1 shadow" id="chart5">
                    <div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><span class="visually hidden">Loading</span><p class="m-0 fs-4 my-5 ds-title"></p></div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="p-3 mx-1 my-4 border border-1 rounder-1 shadow" id="chart6">
                    <div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><span class="visually hidden">Loading</span><p class="m-0 fs-4 my-5 ds-title"></p></div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../js/LoadData.js"></script>
</html>