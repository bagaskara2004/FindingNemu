<style>
    .container {
        max-width: 800px;
        margin: auto;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    canvas {
        width: 100%;
        height: auto;
        border-radius: 10px;
        transition: transform 0.3s ease-in-out;
    }

    canvas:hover {
        transform: scale(1.05);
    }

    .chart-container {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
        padding: 20px;
    }
</style>
<div class="container">

<h3>Selamat datang admin <?php echo $this->session->userdata('nama_admin'); ?></h3>

</div>

<div class="container min-vh-100">
<div class="row">
    <h4>Statistik</h4>
</div>
    <div class="row">
        <div class="col-md-6">
            
            <canvas id="postChart" width="400" height="200"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="userChart" width="400" height="300"></canvas>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {

        $.ajax({
            url: 'http://localhost/findingNemu/admin/Cadmin/getPostAndValidationStatistics',
            method: 'GET',
            success: function(response) {

                var data = response.data;

                var categories = [];
                var postCounts = [];
                var validationCounts = [];

                console.log('Data:', data);

                data.forEach(function(post) {
                    categories.push(post.category_name);
                    postCounts.push(post.post_count);
                    validationCounts.push(post.validation_count);
                });

                var ctx = document.getElementById('postChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: categories,
                        datasets: [{
                            label: 'Jumlah Posting',
                            data: postCounts,
                            fill: false,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2
                        }, {
                            label: 'Jumlah Diambil',
                            data: validationCounts,
                            fill: false,
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            },
            error: function(error) {
                console.error('Error fetching data:', error);
                console.log('Server response:', error.responseText);
            }
        });

        $.ajax({
            url: 'http://localhost/findingNemu/admin/Cadmin/getUserStatistics',
            method: 'GET',
            success: function(response) {
                var userStats = response.userData;

                // Ubah data sesuai dengan kebutuhan grafik garis
                var labels = ['Total Users', 'Actived Users', 'Non-Actived Users'];
                var dataPoints = [userStats.totalUsers, userStats.activedUsers, userStats.nonActivedUsers];

                var ctx = document.getElementById('userChart').getContext('2d');
                var userChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'User Statistics',
                            data: dataPoints,
                            fill: false,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            },
            error: function(error) {
                console.error('Error fetching user statistics:', error);
                console.log('Server response:', error.responseText);
            }
        });
    });
</script>
