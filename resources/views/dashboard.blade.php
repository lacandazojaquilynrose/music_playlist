<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        /* Base layout container configurations matching the pink aesthetic theme */
        .dashboard-wrapper h2 {
            color: #ff69b4 !important;
            font-weight: bold !important;
        }
        .dashboard-wrapper p {
            color: #b3b3b3 !important;
        }
        /* Custom card component formatting */
        .stat-card-custom {
            background-color: #1e1e1e !important;
            border: 1px solid #ff69b4 !important;
            border-radius: 8px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .stat-card-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(255, 105, 180, 0.2);
        }
        .text-pink {
            color: #ff69b4 !important;
        }
        .dashboard-wrapper .text-muted {
            color: #e0e0e0 !important; /* Forces it to a highly readable light silver/white */
            letter-spacing: 0.05rem;
        }
    </style>

    <div class="container py-5 dashboard-wrapper">
        
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="display-6">Welcome Back, {{ Auth::user()->name }}!</h2>
                <p class="lead">Here is a quick overview of what's happening across your media engine network panel today.</p>
            </div>
        </div>

        <div class="row g-4 mb-5">
            
            <div class="col-md-4">
                <div class="stat-card-custom p-4 shadow-sm h-100 d-flex flex-column justify-content-between">
                    <div>
                        <span class="text-uppercase text-muted tracking-wider small fw-bold d-block mb-1">System Capacity</span>
                        <h3 class="text-white fw-bold display-5 mb-0">{{ $userCount }}</h3>
                    </div>
                    <div class="mt-3 text-pink small fw-semibold">
                        Total Registered App Accounts
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="stat-card-custom p-4 shadow-sm h-100 d-flex flex-column justify-content-between">
                    <div>
                        <span class="text-uppercase text-muted tracking-wider small fw-bold d-block mb-1">Media Collection</span>
                        <h3 class="text-white fw-bold display-5 mb-0">{{ $songCount }}</h3>
                    </div>
                    <div class="mt-3 text-pink small fw-semibold">
                        Active Index Tracks Saved
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="stat-card-custom p-4 shadow-sm h-100 d-flex flex-column justify-content-between">
                    <div>
                        <span class="text-uppercase text-muted tracking-wider small fw-bold d-block mb-1">Server Status</span>
                        <h3 class="text-success fw-bold display-5 mb-0">ONLINE</h3>
                    </div>
                    <div class="mt-3 text-pink small fw-semibold">
                        Secure Database Connected
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="stat-card-custom p-4 shadow">
                    <h3 class="h5 text-pink fw-bold text-center mb-4">System Database Metrics</h3>
                    <div style="position: relative; height:320px; width:100%">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const userCount = @json($userCount);
        const songCount = @json($songCount);

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Registered Users', 'Saved Songs'], // Requirement: Shows data from multiple tables side by side
                datasets: [{
                    label: 'Total Platform Database Records',
                    data: [userCount, songCount],
                    backgroundColor: ['#ff69b4', '#b3b3b3'], // Pink for users, Gray for songs
                    borderColor: ['#ff69b4', '#ffffff'],
                    borderWidth: 1,
                    barThickness: 60
                }]
            },
            options: { 
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: { color: '#ffffff' }
                    }
                },
                scales: { 
                    y: { 
                        beginAtZero: true,
                        grid: { color: '#333333' },
                        ticks: { color: '#ffffff', stepSize: 1 }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { color: '#ffffff' }
                    }
                }
            }
        });
    </script>
</x-app-layout>