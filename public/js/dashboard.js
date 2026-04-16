document.addEventListener('DOMContentLoaded', function () {
    const patientsCanvas = document.getElementById('patientsChart');
    const drugsCanvas = document.getElementById('drugsChart');

    const dashboardData = window.dashboardData || {
        patientsByGender: {
            labels: ['Male', 'Female'],
            values: [0, 0]
        },
        drugsByCategory: {
            labels: [],
            values: []
        }
    };

    if (patientsCanvas && typeof Chart !== 'undefined') {
        new Chart(patientsCanvas, {
            type: 'bar',
            data: {
                labels: dashboardData.patientsByGender.labels,
                datasets: [{
                    label: 'Patients',
                    data: dashboardData.patientsByGender.values,
                    borderWidth: 1,
                    backgroundColor: ['#0d6efd', '#dc3545']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    }

    if (drugsCanvas && typeof Chart !== 'undefined') {
        new Chart(drugsCanvas, {
            type: 'doughnut',
            data: {
                labels: dashboardData.drugsByCategory.labels,
                datasets: [{
                    data: dashboardData.drugsByCategory.values,
                    backgroundColor: [
                        '#00bcd4',
                        '#ff9800',
                        '#8bc34a',
                        '#9c27b0',
                        '#ff6384',
                        '#36a2eb',
                        '#4bc0c0',
                        '#ffcd56'
                    ],
                    borderColor: '#ffffff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });
    }
});