$(document).ready(function () {
    // Lors de l'arrivée sur la page, on affiche un spinner et on cache les graphiques
    $('#select-room').selectpicker();

    // A la fin du chargement on affiche "No room selected" si le select n'a pas de valeur
    $('#chart1').html('<p class="text-center text-danger fs-5 my-5">No room selected</p>');
    $('#chart2').html('<p class="text-center text-danger fs-5 my-5">No room selected</p>');
    $('#chart3').html('<p class="text-center text-danger fs-5 my-5">No room selected</p>');
    $('#chart4').html('<p class="text-center text-danger fs-5 my-5">No room selected</p>');
    $('#chart5').html('<p class="text-center text-danger fs-5 my-5">No room selected</p>');
    $('#chart6').html('<p class="text-center text-danger fs-5 my-5">No room selected</p>');
})

$('#select-room').on('change', function() {
    // Lors du changement de valeur du select, on affiche un spinner et on cache les graphiques
    $('#chart1').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><span class="visually hidden">Loading</span><p class="m-0 fs-4 my-5 ds-title"></p></div>');
    $('#chart2').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><span class="visually hidden">Loading</span><p class="m-0 fs-4 my-5 ds-title"></p></div>');
    $('#chart3').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><span class="visually hidden">Loading</span><p class="m-0 fs-4 my-5 ds-title"></p></div>');
    $('#chart4').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><span class="visually hidden">Loading</span><p class="m-0 fs-4 my-5 ds-title"></p></div>');
    $('#chart5').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><span class="visually hidden">Loading</span><p class="m-0 fs-4 my-5 ds-title"></p></div>');
    $('#chart6').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><span class="visually hidden">Loading</span><p class="m-0 fs-4 my-5 ds-title"></p></div>');

    var roomSelected = $('#select-room').find(":selected").val();

    // On envoie la valeur du select au fichier DataController.php qui va nous renvoyer les données de la pièce sélectionnée
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

        // On affiche les graphiques et on cache le spinner
        $('#chart1').html('<canvas id="chartTemperature"></canvas>');
        $('#chart2').html('<canvas id="chartHumidity"></canvas>');
        $('#chart3').html('<canvas id="chartActivity"></canvas>');
        $('#chart4').html('<canvas id="chartCo2"></canvas>');
        $('#chart5').html('<canvas id="chartTvoc"></canvas>');
        $('#chart6').html('<canvas id="chartIllumination"></canvas>');


        // On crée les graphiques avec les données reçues
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