var ctx = document.getElementById('myChart').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: ['Maret', 'April', 'Mei', 'Juni'],
				datasets: [{
					label: 'per Unit',
					data: [{
              x: 50,
              y: 45
          }, {
              x: 60,
              y: 80
          },{
              x: 60,
              y: 65
          },{
              x: 30,
              y: 110
          }],
          backgroundColor:'rgba(255, 99, 132, .2)',
					borderColor: 'rgba(255, 99, 132, 1)',
					borderWidth: 1, fill: false
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		})
    var ctx2 = document.getElementById('myChart2').getContext('2d');
		var myPieChart = new Chart(ctx2, {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [75, 90, 80, 100],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
            'rgba(54, 162, 235, 0.2)',
						'rgba(255, 159, 64, 0.2)',
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Red',
					'Orange',
					'Yellow',
					'Green',

				]
			},
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
    });
    var ctx3 = document.getElementById('myChart3').getContext('2d');
		var myChart3 = new Chart(ctx3, {
			type: 'bar',
			data: {
				labels: ['Maret', 'April', 'Mei', 'Juni'],
				datasets: [{
					label: 'per Unit',
					data: [75, 90, 80, 100],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
						'rgba(255, 99, 132, 1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});