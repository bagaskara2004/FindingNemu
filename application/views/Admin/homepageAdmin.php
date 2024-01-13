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
</style>

<div class="container min-vh-100 d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="col-md-12">
            <canvas id="postChart" width="600" height="400"></canvas>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {

        $.ajax({
            url: 'http://localhost/findingNemu/Admin/Cadmin/getPostAndValidationStatistics',
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
                            borderColor: 'rgba(75, 192, 192, 1)', // Warna garis utama
                            borderWidth: 2
                        }, {
                            label: 'Jumlah Diambil',
                            data: validationCounts,
                            fill: false,
                            borderColor: 'rgba(255, 99, 132, 1)', // Warna garis untuk diambil
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
    });
</script>
