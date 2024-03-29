<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques | Suivi des salles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.css">
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.js"></script>
</head>

<body>
    <?php include_once('../Parts/navbar.php') ?>
    <?php include_once('../connect.inc.php') ?>
    <div class="container-fluid">
        <div>
            <select class="select-picker" name="select-room" id="select-room" data-live-search="true" data-selected-text-format="selected" data-style="btn-light" data-width="10%" data-dropup-auto="false" data-size="6" title="Choisir Salle">
                <?php
                # Récuềre toutes les salles de la base de données et les affiche dans le select
                $query = "SELECT DISTINCT room FROM Device ORDER BY room ASC;";
                $stmt = $conn->prepare($query);
                $stmt->execute();

                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) {
                    echo "<option value=" . $row['room'] . ">" . $row['room'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="row my-2">
            <div class="col-12 col-lg-6">
                <label for="datetimePicker" class="form-label">Sélectionner une date et heure :</label>
                <input type="datetime-local" class="form-control" id="datetimePicker" name="datetimePicker" autocomplete="off" />
            </div>
        </div>

        <div class="row my-2">
            <div class="col-12 col-lg-6">
                <button class="btn btn-primary" id="generatePDF" name="generatePDF">Générer le rapport PDF</button>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-12 col-lg-6">
                <div class="p-3 mx-1 my-4 border border-1 rounder-1 shadow" id="chart1">
                    <div class="d-flex justify-content-center align-items-center spinner">
                        <div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><span class="visually hidden">Loading</span>
                        <p class="m-0 fs-4 my-5 ds-title"></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="p-3 mx-1 my-4 border border-1 rounder-1 shadow" id="chart2">
                    <div class="d-flex justify-content-center align-items-center spinner">
                        <div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><span class="visually hidden">Loading</span>
                        <p class="m-0 fs-4 my-5 ds-title"></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="p-3 mx-1 my-4 border border-1 rounder-1 shadow" id="chart3">
                    <div class="d-flex justify-content-center align-items-center spinner">
                        <div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><span class="visually hidden">Loading</span>
                        <p class="m-0 fs-4 my-5 ds-title"></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="p-3 mx-1 my-4 border border-1 rounder-1 shadow" id="chart4">
                    <div class="d-flex justify-content-center align-items-center spinner">
                        <div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><span class="visually hidden">Loading</span>
                        <p class="m-0 fs-4 my-5 ds-title"></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="p-3 mx-1 my-4 border border-1 rounder-1 shadow" id="chart5">
                    <div class="d-flex justify-content-center align-items-center spinner">
                        <div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><span class="visually hidden">Loading</span>
                        <p class="m-0 fs-4 my-5 ds-title"></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="p-3 mx-1 my-4 border border-1 rounder-1 shadow" id="chart6">
                    <div class="d-flex justify-content-center align-items-center spinner">
                        <div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><span class="visually hidden">Loading</span>
                        <p class="m-0 fs-4 my-5 ds-title"></p>
                    </div>
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
<script src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.js"></script>
<script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

<script>
    $(document).ready(function() {
        // Initialize date and time picker
        $('#datetimePicker').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            timePicker: true,
            timePicker24Hour: true,
            locale: {
                format: 'YYYY-MM-DD HH:mm:ss'
            }
        });

        // Add an event listener to the "Generate PDF" button
        $('#generatePDF').click(function() {
            //alert('Button clicked');

            // Retrieve selected date and time
            var selectedDatetime = $('#datetimePicker').val();

            // Retrieve selected room directly from the select element
            var selectedRoom = $('#select-room').val();

            $.ajax({
                    type: 'POST',
                    url: 'getData.php',
                    data: {
                        'select-room': selectedRoom,
                        'datetimePicker': selectedDatetime
                    },
                })
                .done(function(response) {
                    // Process the retrieved sensor data
                    console.log(response);
                    var sensorData = JSON.parse(response);
                    console.log('Sensor data:', sensorData);

                    // Example: Use html2pdf.js to generate PDF
                    var pdfElement = '<h1 style="text-align: center;">Historique des données captées de la salle<strong> ' + selectedRoom + '</strong></h1><br>';
                    pdfElement += '<br><h6> Données captées avant le <strong>' + selectedDatetime + '</strong></h6>';

                    if (sensorData.length > 0) {
                        pdfElement += '<h6><strong>' + sensorData.length + '</strong> données enregistrées</h6><br>';
                        pdfElement += '<table style="width:100%; border-collapse: collapse;">';
                        pdfElement += '<tr><th>Date and Time</th><th>Temperature</th><th>Humidity</th><th>Activity</th><th>CO2</th><th>TVOC</th><th>Illumination</th></tr>';

                        sensorData.forEach(function(sensor) {
                            pdfElement += '<tr>';
                            pdfElement += '<td>' + sensor.time + '</td>';
                            pdfElement += '<td>' + sensor.temperature + '</td>';
                            pdfElement += '<td>' + sensor.humidity + '</td>';
                            pdfElement += '<td>' + sensor.activity + '</td>';
                            pdfElement += '<td>' + sensor.co2 + '</td>';
                            pdfElement += '<td>' + sensor.tvoc + '</td>';
                            pdfElement += '<td>' + sensor.illumination + '</td>';
                            pdfElement += '</tr>';
                        });

                        pdfElement += '</table>';

                    } else {
                        pdfElement += '<p>Aucune donnée disponible pour la salle ' + selectedRoom + ' avant le ' + selectedDatetime + '. La génération du PDF n\'est pas possible.</p>';
                    }

                    // Generate PDF using html2pdf
                    var confirmResult = true; // Default to true for the case where there are no data
                    if (sensorData.length > 0) {
                        confirmResult = confirm('Voulez-vous générer le rapport PDF ?');
                    }

                    if (confirmResult) {
                        html2pdf(pdfElement, {
                            margin: 0.5,
                            filename: 'RapportDonnees' + selectedRoom + '.pdf',
                            html2canvas: {
                                scale: 3,
                                letterRendering: true,
                                useCORS: true,
                            },
                            jsPDF: {
                                unit: 'in',
                                format: 'a4',
                                orientation: 'portrait',
                            }
                        });

                    } 
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus + ': ' + errorThrown);
                });
        });
    });
</script>
</html>