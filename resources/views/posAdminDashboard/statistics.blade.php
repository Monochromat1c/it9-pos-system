@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="/assets/css/bootstrap(for pagination).min.css">
<link rel="stylesheet" href="/assets/css/adminProducts.css">
<title>Statistics</title>

<section class="adminDashboardBody kld--display-flex">
    <div id="sidebar" class="sidebar kld--site kld--min-width-dvw-100 kld--min-height-dvh-100">
        <header class="kld--display-flex kld--align-items-center adminDashboardNavbar custom-pattern">
            <section class="adminNavbarContent kld--navbar kld--display-flex kld--align-items-center">
                <a href="/admin/dashboard">
                    <p class="kld--text-color-white kld--site-title dashboardTitle">Sari-Savvy Store</p>
                </a>
                <ul class="kld--text-color-white kld--display-flex kld--align-items-center navbarLink">
                    <li class="kld--padding-1"><a href="#"
                            class="kld--text-color-info kld--text-hover-info-light-4">Products</a></li>|
                    <li class="kld--padding-1"><a href="/admin/users"
                            class="kld--text-color-white kld--text-hover-info-light-4">Users</a></li>|
                    <li class="kld--padding-1"><a href="/admin/view/statistics"
                            class="kld--text-color-white kld--text-hover-info-light-4">Statistics</a></li>|
                    <li class="kld--padding-1"><a href="{{ route('admin.transactions') }}"
                            class="kld--text-color-white kld--text-hover-info-light-4">Transactions</a></li>
                </ul>
                <section class="navbarProfile kld--text-color-white">
                    <a href="/admin/profile" class="kld--text-color-white kld--text-hover-info-light-4 kld--display-flex
                        kld--align-items-center kld--justify-center">
                        <div class="kld--display-flex kld--align-items-center kld--justify-center kld--margin-right-1">
                            @if($user->profile_picture)
                                <img src="{{ Storage::url($user->profile_picture) }}" alt="Profile Picture"
                                    class="navbar-profile">
                            @else
                                <img src="{{ asset('assets/img/default-profile.jpg') }}"
                                    alt="Default Profile Picture" class="navbar-profile">
                            @endif
                        </div>
                        <div>
                            {{ $user->first_name }}
                            {{ $user->last_name }}
                        </div>
                    </a>
                </section>
            </section>
            <section class="mobileHamburger kld--margin-right-2">
                <input type="checkbox" name="check" id="check" class="checkbox kld--display-none">
                <label for="check" class="margin-right-1" class="hamburger">
                    <i class="fa fa-bars border-radius-full kld--text-color-white kld--font-size-large hamburger"></i>
                </label>
            </section>
        </header>
        <main class="kld--container kld--margin-top-1">
            <section>
                <nav>
                    <ul>
                        <li>
                            <p class="kld--text-align-center">
                                <a class="kld--font-size-medium kld--padding-1 kld--text-color-white kld--display-block"
                                    href="/admin/products">Products</a>
                            </p>
                        </li>
                        <hr class="kld--margin-top-half kld--margin-bottom-half">

                        <li>
                            <p class="kld--text-align-center">
                                <a class="kld--font-size-medium kld--padding-1 kld--text-color-white kld--display-block"
                                    href="/admin/users">Users</a>
                            </p>
                        </li>
                        <hr class="kld--margin-top-half kld--margin-bottom-half">

                        <li>
                            <p class="kld--text-align-center">
                                <a class="kld--font-size-medium kld--padding-1 kld--text-color-white kld--display-block"
                                    href="/admin/view/statistics">Statistics</a>
                            </p>
                        </li>
                        <hr class="kld--margin-top-half kld--margin-bottom-half">

                        <li>
                            <p class="kld--text-align-center">
                                <a class="kld--font-size-medium kld--padding-1 kld--text-color-white kld--display-block"
                                    href="{{ route('admin.transactions') }}">Transactions</a>
                            </p>
                        </li>
                    </ul>
                </nav>
            </section>
        </main>
        <footer class="kld--container kld--margin-bottom-1 ">
            <nav>
                <ul>
                    <li>
                        <p class="kld--text-align-center kld--padding-bottom-half">
                            <a class="kld--font-size-medium kld--button-primary kld--text-color-white kld--padding-button-2 kld--border-radius-medium kld--min-width-percent-100 kld--display-block"
                                href="/admin/profile">Profile</a>
                        </p>
                    </li>
                    <hr class="kld--margin-top-half kld--margin-bottom-half">
                    <li>
                        <p class="kld--text-align-center">
                            <form action="{{ route('logout') }}" method="post"
                                class="kld--margin-top-1">
                                @csrf
                                <button type="submit"
                                    class="kld--button-red kld--text-color-white kld--padding-button-2 kld--border-radius-medium kld--min-width-percent-100">Logout</button>
                            </form>
                        </p>
                    </li>
                </ul>
            </nav>
        </footer>
    </div>
    <section class="kld--site kld--min-width-dvw-100">
        <header class="kld--display-flex kld--align-items-center adminDashboardNavbar custom-pattern">
            <section class="adminNavbarContent kld--navbar kld--display-flex kld--align-items-center">
                <a href="/admin/dashboard">
                    <p class="kld--text-color-white kld--site-title dashboardTitle">Sari-Savvy Store</p>
                </a>
                <ul class="kld--text-color-white kld--display-flex kld--align-items-center navbarLink">
                    <li class="kld--padding-1"><a href="/admin/products"
                            class="kld--text-color-white kld--text-hover-info-light-4">Products</a></li>|
                    <li class="kld--padding-1"><a href="/admin/users"
                            class="kld--text-color-white kld--text-hover-info-light-4">Users</a></li>|
                    <li class="kld--padding-1"><a href="#"
                            class="kld--text-color-info kld--text-hover-info-light-4">Statistics</a></li>|
                    <li class="kld--padding-1"><a href="/admin/view/transactions"
                            class="kld--text-color-white kld--text-hover-info-light-4">Transactions</a></li>
                </ul>
                <section class="navbarProfile kld--text-color-white">
                    <a href="/admin/profile" class="kld--text-color-white kld--text-hover-info-light-4 kld--display-flex
                        kld--align-items-center kld--justify-center">
                        <div class="kld--display-flex kld--align-items-center kld--justify-center kld--margin-right-1">
                            @if($user->profile_picture)
                                <img src="{{ Storage::url($user->profile_picture) }}" alt="Profile Picture"
                                    class="navbar-profile">
                            @else
                                <img src="{{ asset('assets/img/default-profile.jpg') }}"
                                    alt="Default Profile Picture" class="navbar-profile">
                            @endif
                        </div>
                        <div>
                            {{ $user->first_name }}
                            {{ $user->last_name }}
                        </div>
                    </a>
                </section>
            </section>
            <section class="mobileHamburger kld--margin-right-2">
                <input type="checkbox" name="check" id="check" class="checkbox kld--display-none">
                <label for="check" class="margin-right-1" class="hamburger">
                    <i class="fa fa-bars border-radius-full kld--text-color-white kld--font-size-large hamburger"></i>
                </label>
            </section>
        </header>
        <main>
            <div class="header kld--margin-top-2 kld--margin-bottom-1">
                <h1 class="kld--text-color-white kld--text-align-center">Sales Statistics</h1>
            </div>
            <section class="kld--container">
                <div class="statistics-section overflow-y-scroll kld--margin-bottom-2">
                    <h2 class="kld--text-color-white">Daily Sales</h2>
                    <canvas id="dailySalesChart"></canvas>
                    <table class="products-table kld--text-color-white">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Total Sales</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dailyStatistics as $stat)
                                <tr class="table-row">
                                    <td>{{ $stat->date }}</td>
                                    <td>{{ $stat->total_sales }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="kld--display-flex kld--justify-center kld--text-color-white">
                        {{ $dailyStatistics->links('vendor.pagination.custom-pagination') }}
                    </div>
                </div>
                <div class="statistics-section overflow-y-scroll kld--margin-bottom-2">
                    <h2 class="kld--text-color-white">Weekly Sales</h2>
                    <canvas id="weeklySalesChart"></canvas>
                    <table class="kld--text-color-white products-table">
                        <thead>
                            <tr>
                                <th>Week Start</th>
                                <th>Week End</th>
                                <th>Total Sales</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($weeklyStatistics as $stat)
                                <tr class="table-row">
                                    <td>{{ $stat->week_start }}</td>
                                    <td>{{ $stat->week_end }}</td>
                                    <td>{{ $stat->total_sales }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="kld--display-flex kld--justify-center kld--text-color-white">
                        {{ $weeklyStatistics->links('vendor.pagination.custom-pagination') }}
                    </div>
                </div>
                <div class="statistics-section overflow-y-scroll kld--margin-bottom-2">
                    <h2 class="kld--text-color-white">Monthly Sales</h2>
                    <canvas id="monthlySalesChart"></canvas>
                    <table class="products-table kld--text-color-white">
                        <thead>
                            <tr>
                                <th>Year</th>
                                <th>Month</th>
                                <th>Total Sales</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($monthlyStatistics as $stat)
                                <tr class="table-row">
                                    <td>{{ $stat->year }}</td>
                                    <td>{{ \Carbon\Carbon::createFromFormat('m', $stat->month)->format('F') }}
                                    </td>
                                    <td>{{ $stat->total_sales }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="kld--display-flex kld--justify-center kld--text-color-white">
                        {{ $monthlyStatistics->links('vendor.pagination.custom-pagination') }}
                    </div>
                </div>
                <div class="statistics-section overflow-y-scroll kld--margin-bottom-2">
                    <h2 class="kld--text-color-white">Yearly Sales</h2>
                    <canvas id="yearlySalesChart"></canvas>
                    <table class="products-table kld--text-color-white">
                        <thead>
                            <tr>
                                <th>Year</th>
                                <th>Total Sales</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($yearlyStatistics as $stat)
                                <tr class="table-row">
                                    <td>{{ $stat->year }}</td>
                                    <td>{{ $stat->total_sales }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="kld--display-flex kld--justify-center kld--text-color-white">
                        {{ $yearlyStatistics->links('vendor.pagination.custom-pagination') }}
                    </div>
                </div>
            </section>
        </main>
    </section>
</section>

<script src="/assets/js/mobile-sidebar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const ctxDaily = document.getElementById('dailySalesChart').getContext('2d');
    const dailySalesChart = new Chart(ctxDaily, {
        type: 'line',
        data: {
            labels: [@foreach ($dailyStatistics as $stat) "{{ $stat->date }}", @endforeach],
            datasets: [{
                label: 'Total Sales',
                data: [@foreach ($dailyStatistics as $stat) {{ $stat->total_sales }}, @endforeach],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const ctxWeekly = document.getElementById('weeklySalesChart').getContext('2d');
    const weeklySalesChart = new Chart(ctxWeekly, {
        type: 'bar',
        data: {
            labels: [@foreach ($weeklyStatistics as $stat) "{{ $stat->week_start }} - {{ $stat->week_end }}", @endforeach],
            datasets: [{
                label: 'Total Sales',
                data: [@foreach ($weeklyStatistics as $stat) {{ $stat->total_sales }}, @endforeach],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const ctxMonthly = document.getElementById('monthlySalesChart').getContext('2d');
    const monthlySalesChart = new Chart(ctxMonthly, {
        type: 'line',
        data: {
            labels: [@foreach ($monthlyStatistics as $stat) "{{ $stat->month }}", @endforeach],
            datasets: [{
                label: 'Total Sales',
                data: [@foreach ($monthlyStatistics as $stat) {{ $stat->total_sales }}, @endforeach],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const ctxYearly = document.getElementById('yearlySalesChart').getContext('2d');
    const yearlySalesChart = new Chart(ctxYearly, {
        type: 'bar',
        data: {
            labels: [@foreach ($yearlyStatistics as $stat) "{{ $stat->year }}", @endforeach],
            datasets: [{
                label: 'Total Sales',
                data: [@foreach ($yearlyStatistics as $stat) {{ $stat->total_sales }}, @endforeach],
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script><script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const ctxDaily = document.getElementById('dailySalesChart').getContext('2d');
    const dailySalesChart = new Chart(ctxDaily, {
        type: 'line',
        data: {
            labels: [@foreach ($dailyStatistics as $stat) "{{ $stat->date }}", @endforeach],
            datasets: [{
                label: 'Total Sales',
                data: [@foreach ($dailyStatistics as $stat) {{ $stat->total_sales }}, @endforeach],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const ctxWeekly = document.getElementById('weeklySalesChart').getContext('2d');
    const weeklySalesChart = new Chart(ctxWeekly, {
        type: 'bar',
        data: {
            labels: [@foreach ($weeklyStatistics as $stat) "{{ $stat->week_start }} - {{ $stat->week_end }}", @endforeach],
            datasets: [{
                label: 'Total Sales',
                data: [@foreach ($weeklyStatistics as $stat) {{ $stat->total_sales }}, @endforeach],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const ctxMonthly = document.getElementById('monthlySalesChart').getContext('2d');
    const monthlySalesChart = new Chart(ctxMonthly, {
        type: 'line',
        data: {
            labels: [@foreach ($monthlyStatistics as $stat) "{{ $stat->month }}", @endforeach],
            datasets: [{
                label: 'Total Sales',
                data: [@foreach ($monthlyStatistics as $stat) {{ $stat->total_sales }}, @endforeach],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const ctxYearly = document.getElementById('yearlySalesChart').getContext('2d');
    const yearlySalesChart = new Chart(ctxYearly, {
        type: 'bar',
        data: {
            labels: [@foreach ($yearlyStatistics as $stat) "{{ $stat->year }}", @endforeach],
            datasets: [{
                label: 'Total Sales',
                data: [@foreach ($yearlyStatistics as $stat) {{ $stat->total_sales }}, @endforeach],
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctxDaily = document.getElementById('dailySalesChart').getContext('2d');
        const dailySalesChart = new Chart(ctxDaily, {
            type: 'line',
            data: {
                labels: [@foreach($dailyStatistics as $stat)
                    "{{ $stat->date }}", @endforeach
                ],
                datasets: [{
                    label: 'Total Sales',
                    data: [@foreach($dailyStatistics as $stat) {
                        {
                            % 24 stat - % 3 Etotal_sales
                        }
                    }, @endforeach],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctxWeekly = document.getElementById('weeklySalesChart').getContext('2d');
        const weeklySalesChart = new Chart(ctxWeekly, {
            type: 'bar',
            data: {
                labels: [@foreach($weeklyStatistics as $stat)
                    "{{ $stat->week_start }} - {{ $stat->week_end }}", @endforeach
                ],
                datasets: [{
                    label: 'Total Sales',
                    data: [@foreach($weeklyStatistics as $stat) {
                        {
                            % 24 stat - % 3 Etotal_sales
                        }
                    }, @endforeach],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctxMonthly = document.getElementById('monthlySalesChart').getContext('2d');
        const monthlySalesChart = new Chart(ctxMonthly, {
            type: 'line',
            data: {
                labels: [@foreach($monthlyStatistics as $stat)
                    "{{ $stat->month }}", @endforeach
                ],
                datasets: [{
                    label: 'Total Sales',
                    data: [@foreach($monthlyStatistics as $stat) {
                        {
                            % 24 stat - % 3 Etotal_sales
                        }
                    }, @endforeach],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctxYearly = document.getElementById('yearlySalesChart').getContext('2d');
        const yearlySalesChart = new Chart(ctxYearly, {
            type: 'bar',
            data: {
                labels: [@foreach($yearlyStatistics as $stat)
                    "{{ $stat->year }}", @endforeach
                ],
                datasets: [{
                    label: 'Total Sales',
                    data: [@foreach($yearlyStatistics as $stat) {
                        {
                            % 24 stat - % 3 Etotal_sales
                        }
                    }, @endforeach],
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection