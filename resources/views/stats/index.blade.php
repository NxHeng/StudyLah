@extends('layouts.app')

@section('content')
    @php
        // Assuming you have the total duration in seconds
        $totalDuration = $user->study_duration;
        
        // Convert seconds to hours and minutes
        $hours = floor($totalDuration / 3600);
        $minutes = floor(($totalDuration % 3600) / 60);
    @endphp

    <div class="h1 text-center m-3">
        Stats
    </div>
    <div class="row container-fluid ps-5">
        <div class="col-lg-4 col-sm-12 m-2 border rounded hp-zoom bg-body-tertiary">
            <div class="text-center h3 p-3">
                Deck Distribution
            </div>
            <div class="justify-content-center align-items-center">
                <div>
                    <canvas id="deckCountChart" height="400px"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 m-2 border rounded hp-zoom bg-body-tertiary">
            <div class="text-center h3 p-3">
                Note Distribution
            </div>
            <div class="justify-content-center align-items-center">
                <div>
                    <canvas id="noteCountChart" height="400px"></canvas>
                </div>
            </div>
        </div>
        <div class="my-auto mx-auto col-lg-3 col-sm-12">
            <div class="text-center border rounded m-1 p-3 hp-zoom bg-body-tertiary">
                <span class="h4 my-auto">Total Decks Created: </span>
                <span class="display-6 my-auto text-primary mx-2">{{ $totalDecks }}</span>
            </div>
            <div class="text-center border rounded m-1 p-3 hp-zoom bg-body-secondary">
                <span class="h4 my-auto">Total Cards Created: </span>
                <span class="display-6 my-auto text-primary mx-2">{{ $totalCards }}</span>
            </div>
            <div class="text-center border rounded m-1 p-3 hp-zoom bg-body-tertiary">
                <span class="h4 my-auto">Total Shared Notes: </span>
                <span class="display-6 my-auto text-primary mx-2">{{ $totalNotes }}</span>
            </div>
            <div class="text-center border rounded m-1 p-3 hp-zoom bg-body-secondary">
                <span class="h4 my-auto">Total Shared Events: </span>
                <span class="display-6 my-auto text-primary mx-2">{{ $totalEvents }}</span>
            </div>
            <div class="text-center border rounded m-1 p-3 hp-zoom bg-body-tertiary">
                <div class="h4 my-auto">Total Study Time: </div>
                <span class="display-6 my-auto text-primary mx-2">{{ $hours }}</span>
                <span class="h4 my-auto">hrs</span>
                <span class="display-6 my-auto text-primary mx-2">{{ $minutes }}</span>
                <span class="h4 my-auto">mins</span>
            </div>
        </div>
    </div>
    <div>

    </div>
    <div class="m-5 border rounded hp-zoom bg-body-tertiary">
        <div class="text-center h3 p-3">
            Login Streak
        </div>
        <div class="justify-content-center align-items-center">
            <div>
                <canvas id="loginChart" height="400px"></canvas>
            </div>
        </div>
    </div>

    <script>
        var colors = [
            '#FF6384', '#36A2EB', '#FFCE56', '#cc65fe', '#445ce3', '#e244b1',
            '#e27824', '#e3e424', '#24e3d9', '#F44336', '#E91E63', '#9C27B0',
            '#673AB7', '#3F51B5', '#2196F3', '#009688', '#4CAF50', '#FF9800',
            '#FF5722', '#795548'
        ];

        function generateChart(elementId, labels, data, colors, type) {
            var ctx = document.getElementById(elementId).getContext('2d');
            var chart = new Chart(ctx, {
                type: type,
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: colors,
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        display: false,
                    },
                    layout: {
                        padding: {
                            left: 15,
                            right: 15,
                            top: 15,
                            bottom: 15
                        }
                    }
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            //deck
            generateChart('deckCountChart', {!! $deckLabels !!}, {!! $deckCounts !!}, colors, 'pie');
            //note
            generateChart('noteCountChart', {!! $noteLabels !!}, {!! $noteCounts !!}, colors, 'pie');
            //login
            generateChart('loginChart', {!! json_encode($dayLabels) !!}, {!! json_encode($dayData) !!}, '#009688', 'bar');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
