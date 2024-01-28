$(document).ready(function () {
    var roomSelected = $('#room_name').html();

    $.ajax({
        type: 'POST',
        url: '../Carte/RoomController.php',
        dataType: 'json',
        data: {
            average: false,
            room: roomSelected
        },
        encode: true,
    })
    .done(function(data){
        console.log(data);
        console.log("data received");
        $('#chart1').html('<canvas id="chartTemperature"></canvas>');
        $('#chart2').html('<canvas id="chartHumidity"></canvas>');
        $('#chart3').html('<canvas id="chartActivity"></canvas>');
        $('#chart4').html('<canvas id="chartCo2"></canvas>');
        $('#chart5').html('<canvas id="chartTvoc"></canvas>');
        $('#chart6').html('<canvas id="chartIllumination"></canvas>');
        $('#chart7').html('<canvas id="chartIllumination"></canvas>');
    })

    $('#button_group input').on("click", function () {
        $('#chart1').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><p class="m-0 fs-4 my-5 ds-title"></p></div>');
        $('#chart2').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><p class="m-0 fs-4 my-5 ds-title"></p></div>');
        $('#chart3').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><p class="m-0 fs-4 my-5 ds-title"></p></div>');
        $('#chart4').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><p class="m-0 fs-4 my-5 ds-title"></p></div>');
        $('#chart5').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><p class="m-0 fs-4 my-5 ds-title"></p></div>');
        $('#chart6').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><p class="m-0 fs-4 my-5 ds-title"></p></div>');
        $('#chart7').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><p class="m-0 fs-4 my-5 ds-title"></p></div>');

        if(this.id == "btnradio1"){
            $.ajax({
                type: 'POST',
                url: '../Carte/RoomController.php',
                dataType: 'json',
                data: {
                    average: false,
                    room: roomSelected
                },
                encode: true,
            })
            .done(function(data){
                console.log(data);
                console.log("data received");
                $('#chart1').html('<canvas id="chartTemperature"></canvas>');
                $('#chart2').html('<canvas id="chartHumidity"></canvas>');
                $('#chart3').html('<canvas id="chartActivity"></canvas>');
                $('#chart4').html('<canvas id="chartCo2"></canvas>');
                $('#chart5').html('<canvas id="chartTvoc"></canvas>');
                $('#chart6').html('<canvas id="chartIllumination"></canvas>');
                $('#chart7').html('<canvas id="chartIllumination"></canvas>');

                const temperature = new Chart(
                    document.getElementById('chartTemperature'), {
                        type: 'bar',
                        data: {
                            datasets: [{
                                data: data.temperature,
                                label: 'Température (°C)',
                                borderColor: '#FF6384',
                                backgroundColor: '#a82742'
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            aspectRatio: 1,
                            resizeDelay: 1,
                        }
                    }
                )
            })
        } else if(this.id == "btnradio2"){
            $.ajax({
                type: 'POST',
                url: '../Carte/RoomController.php',
                dataType: 'json',
                data: {
                    average: true,
                    room: roomSelected
                },
                encode: true,
            })
            .done(function(data){
                console.log(data);
                console.log("data received");
                $('#chart1').html('<canvas id="chartTemperature"></canvas>');
                $('#chart2').html('<canvas id="chartHumidity"></canvas>');
                $('#chart3').html('<canvas id="chartActivity"></canvas>');
                $('#chart4').html('<canvas id="chartCo2"></canvas>');
                $('#chart5').html('<canvas id="chartTvoc"></canvas>');
                $('#chart6').html('<canvas id="chartIllumination"></canvas>');
                $('#chart7').html('<canvas id="chartIllumination"></canvas>');
            })
        }
    })
})

