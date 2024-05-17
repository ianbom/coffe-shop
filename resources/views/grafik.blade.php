<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Ini grafik</h1>
    </div>

    <div style="width: 800px">
        <canvas id="myChart" width="200" height="200"></canvas>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');

        // Data untuk sumbu X (Hari) dan sumbu Y (Penjualan)
        var days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
        var sales = [12, 19, 3, 5, 2, 3, 7];

        var myChart = new Chart(ctx, {
            type: 'line', // Tipe grafik diubah menjadi 'line' untuk grafik garis
            data: {
                labels: days, // Label sumbu X (Hari)
                datasets: [{
                    label: 'Sales', // Label data
                    data: sales, // Data penjualan
                    fill: false, // Tidak diisi untuk membuat garis
                    borderColor: 'rgba(54, 162, 235, 1)', // Warna garis
                    borderWidth: 1 // Ketebalan garis
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true // Mulai dari 0 pada sumbu Y
                    }
                }
            }
        });
    </script>

</body>
</html>

