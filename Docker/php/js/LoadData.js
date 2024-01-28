$(document).ready(function () {
    $('#select-room').selectpicker();

    $('#chart1').html('<p class="text-center text-danger fs-5 my-5">No room selected</p>');
    $('#chart2').html('<p class="text-center text-danger fs-5 my-5">No room selected</p>');
    $('#chart3').html('<p class="text-center text-danger fs-5 my-5">No room selected</p>');
    $('#chart4').html('<p class="text-center text-danger fs-5 my-5">No room selected</p>');
    $('#chart5').html('<p class="text-center text-danger fs-5 my-5">No room selected</p>');
    $('#chart6').html('<p class="text-center text-danger fs-5 my-5">No room selected</p>');
})

$('#select-room').on('change', function() {
    $('#chart1').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><span class="visually hidden">Loading</span><p class="m-0 fs-4 my-5 ds-title"></p></div>');
    $('#chart2').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><span class="visually hidden">Loading</span><p class="m-0 fs-4 my-5 ds-title"></p></div>');
    $('#chart3').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><span class="visually hidden">Loading</span><p class="m-0 fs-4 my-5 ds-title"></p></div>');
    $('#chart4').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><span class="visually hidden">Loading</span><p class="m-0 fs-4 my-5 ds-title"></p></div>');
    $('#chart5').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><span class="visually hidden">Loading</span><p class="m-0 fs-4 my-5 ds-title"></p></div>');
    $('#chart6').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><span class="visually hidden">Loading</span><p class="m-0 fs-4 my-5 ds-title"></p></div>');

    var roomSelected = $('#select-room').find(":selected").val();

    $.ajax({
        type: 'POST',
        url: '../Statistiques/DataController.php',
        dataType: 'json',
        data: {
            room: roomSelected
        },
        encode: true,
    })
    .done(function(data){
        console.log(data);

        $('#chart1').html('<canvas id="chartTemperature"></canvas>');
        $('#chart2').html('<canvas id="chartHumidity"></canvas>');
        $('#chart3').html('<canvas id="chartActivity"></canvas>');
        $('#chart4').html('<canvas id="chartCo2"></canvas>');
        $('#chart5').html('<canvas id="chartTvoc"></canvas>');
        $('#chart6').html('<canvas id="chartIllumination"></canvas>');


        const temperature = new Chart(
            document.getElementById('chartTemperature'), {
                type:'line',
                data: {
                    labels: data.time,
                    datasets: [{
                        data: data.temperature,
                        label: 'Température (°C)',
                        borderColor: '#FF6384',
                        backgroundColor: '#a82742'
                    }]
                },
                options: {
                    animations: {
                        radius: {
                          duration: 400,
                          easing: 'linear',
                          loop: (context) => context.active
                        }
                      },
                    scales: {
                        x: {
                            display:false
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    aspectRatio: 1,
                    resizeDelay: 1,
                }
            }
        )

        const humidity = new Chart(
            document.getElementById('chartHumidity'), {
                type:'line',
                data: {
                    labels: data.time,
                    datasets: [{
                        data: data.humidity,
                        label: 'Humidité (%)'
                    }]
                },
                options: {
                    animations: {
                        radius: {
                          duration: 400,
                          easing: 'linear',
                          loop: (context) => context.active
                        }
                      },
                    scales: {
                        x: {
                            display:false
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    aspectRatio: 1,
                    resizeDelay: 1,
                }
            }
        )
        
        const illumination = new Chart(
            document.getElementById('chartIllumination'), {
                type:'line',
                data: {
                    labels: data.time,
                    datasets: [{
                        data: data.illumination,
                        label: 'Illumination (Lux)',
                        borderColor: '#4BC0C0',
                        backgroundColor: '#186b6b'
                    }]
                },
                options: {
                    animations: {
                        radius: {
                          duration: 400,
                          easing: 'linear',
                          loop: (context) => context.active
                        }
                      },
                    scales: {
                        x: {
                            display:false
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    aspectRatio: 1,
                    resizeDelay: 1,
                }
            }
        )

        const activity = new Chart(
            document.getElementById('chartActivity'), {
                type:'line',
                data: {
                    labels: data.time,
                    datasets: [{
                        data: data.activity,
                        label: 'Activité',
                        borderColor: '#FF9F40',
                        backgroundColor: '#875624'
                    }]
                },
                options: {
                    animations: {
                        radius: {
                          duration: 400,
                          easing: 'linear',
                          loop: (context) => context.active
                        }
                      },
                    scales: {
                        x: {
                            display:false
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    aspectRatio: 1,
                    resizeDelay: 1,
                }
            }
        )

        const co2 = new Chart(
            document.getElementById('chartCo2'), {
                type:'line',
                data: {
                    labels: data.time,
                    datasets: [{
                        data: data.co2,
                        label: 'CO2 (ppm)',
                        borderColor: '#9966FF',
                        backgroundColor: '#4c249c'
                    }]
                },
                options: {
                    animations: {
                        radius: {
                          duration: 400,
                          easing: 'linear',
                          loop: (context) => context.active
                        }
                      },
                    scales: {
                        x: {
                            display:false
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    aspectRatio: 1,
                    resizeDelay: 1,
                }
            }
        )

        const tvoc = new Chart(
            document.getElementById('chartTvoc'), {
                type:'line',
                color: 'white',
                data: {
                    labels: data.time,
                    datasets: [{
                        data: data.tvoc,
                        label: 'TVOC (ppb)',
                        borderColor: '#FFCD56',
                        backgroundColor: '#826623'
                    }]
                },
                options: {
                    animations: {
                        radius: {
                          duration: 400,
                          easing: 'linear',
                          loop: (context) => context.active
                        }
                      },
                    scales: {
                        x: {
                            display:false
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    aspectRatio: 1,
                    resizeDelay: 1,
                }
            }
        )
    })
})