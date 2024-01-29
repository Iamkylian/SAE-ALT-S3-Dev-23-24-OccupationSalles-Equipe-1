$(document).ready(function () {
    // Récupère la salle sélectionnée
    var roomSelected = $('#room_name').html();

    // Envoie une requête ajax vers le controlleur RoomController.php
    $.ajax({
        type: 'POST',
        url: '../Carte/RoomController.php',
        dataType: 'json',
        data: {
            room: roomSelected
        },
        encode: true,
    })
    .done(function(data){
        // Affiche les données reçues dans la console
        console.log(data);
        console.log("data received");
        // Création de chaque graphique et suppresion du spinner
        $('#chart1').html('<canvas id="chartTemperature"></canvas>');
        $('#chart2').html('<canvas id="chartHumidity"></canvas>');
        $('#chart3').html('<canvas id="chartActivity"></canvas>');
        $('#chart4').html('<canvas id="chartCo2"></canvas>');
        $('#chart5').html('<canvas id="chartTvoc"></canvas>');
        $('#chart6').html('<canvas id="chartIllumination"></canvas>');
        $('#chart7').html('<canvas id="chartIllumination"></canvas>');

        const temperature = new Chart(
            document.getElementById('chartTemperature'), {
                type:'bar',
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
                type:'bar',
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
                type:'bar',
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
                type:'bar',
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
                type:'bar',
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
                type:'bar',
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

    $('#button_group input').on("click", function () {
        $('#chart1').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><p class="m-0 fs-4 my-5 ds-title"></p></div>');
        $('#chart2').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><p class="m-0 fs-4 my-5 ds-title"></p></div>');
        $('#chart3').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><p class="m-0 fs-4 my-5 ds-title"></p></div>');
        $('#chart4').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><p class="m-0 fs-4 my-5 ds-title"></p></div>');
        $('#chart5').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><p class="m-0 fs-4 my-5 ds-title"></p></div>');
        $('#chart6').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><p class="m-0 fs-4 my-5 ds-title"></p></div>');
        $('#chart7').html('<div class="d-flex justify-content-center align-items-center spinner"><div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div><p class="m-0 fs-4 my-5 ds-title"></p></div>');

        // Lorsqu'on clique sur le bouton "Average"
        if(this.id == "btnradio2"){
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

                const temperature = new Chart(
                    document.getElementById('chartTemperature'), {
                        type:'bar',
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
                        type:'bar',
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
                        type:'bar',
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
                        type:'bar',
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
                        type:'bar',
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
                        type:'bar',
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
        // Lorsqu'on clique sur le bouton "Last data"
        } else if(this.id == "btnradio1"){
            
            $.ajax({
                type: 'POST',
                url: '../Carte/RoomController.php',
                dataType: 'json',
                data: {
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
                        type:'bar',
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
                        type:'bar',
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
                        type:'bar',
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
                        type:'bar',
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
                        type:'bar',
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
                        type:'bar',
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

        }
    })
})

