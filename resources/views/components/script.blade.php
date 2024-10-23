{{-- Leaflet --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
{{-- Sweetalert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js"
    integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script>
<!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script>
<!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
<script src="{{ asset('./tdash/dist/js/adminlte.js') }}"></script> <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
<script>
    const x = document.getElementById("lokasi");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Lokasi tidak ditemukan";
        }
    }

    function showPosition(position) {
        x.innerHTML = "Latitude : " + position.coords.latitude +
            "<br>Longitude : " + position.coords.longitude;
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js"
    integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script>
<!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script>
<!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
<script src="{{ asset('./tdash/dist/js/adminlte.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
    integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>
<script>
    const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
    const Default = {
        scrollbarTheme: "os-theme-light",
        scrollbarAutoHide: "leave",
        scrollbarClickScroll: true,
    };
    document.addEventListener("DOMContentLoaded", function() {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (
            sidebarWrapper &&
            typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
        ) {
            OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                scrollbars: {
                    theme: Default.scrollbarTheme,
                    autoHide: Default.scrollbarAutoHide,
                    clickScroll: Default.scrollbarClickScroll,
                },
            });
        }
    });
</script> <!--end::OverlayScrollbars Configure--> <!-- OPTIONAL SCRIPTS --> <!-- apexcharts -->
<script>
    // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
    // IT'S ALL JUST JUNK FOR DEMO
    // ++++++++++++++++++++++++++++++++++++++++++

    /* apexcharts
     * -------
     * Here we will create a few charts using apexcharts
     */

    //-----------------------
    // - MONTHLY SALES CHART -
    //-----------------------

    const sales_chart_options = {
        series: [{
                name: "Digital Goods",
                data: [28, 48, 40, 19, 86, 27, 90],
            },
            {
                name: "Electronics",
                data: [65, 59, 80, 81, 56, 55, 40],
            },
        ],
        chart: {
            height: 180,
            type: "area",
            toolbar: {
                show: false,
            },
        },
        legend: {
            show: false,
        },
        colors: ["#0d6efd", "#20c997"],
        dataLabels: {
            enabled: false,
        },
        stroke: {
            curve: "smooth",
        },
        xaxis: {
            type: "datetime",
            categories: [
                "2023-01-01",
                "2023-02-01",
                "2023-03-01",
                "2023-04-01",
                "2023-05-01",
                "2023-06-01",
                "2023-07-01",
            ],
        },
        tooltip: {
            x: {
                format: "MMMM yyyy",
            },
        },
    };

    const sales_chart = new ApexCharts(
        document.querySelector("#sales-chart"),
        sales_chart_options,
    );
    sales_chart.render();

    //---------------------------
    // - END MONTHLY SALES CHART -
    //---------------------------

    function createSparklineChart(selector, data) {
        const options = {
            series: [{
                data
            }],
            chart: {
                type: "line",
                width: 150,
                height: 30,
                sparkline: {
                    enabled: true,
                },
            },
            colors: ["var(--bs-primary)"],
            stroke: {
                width: 2,
            },
            tooltip: {
                fixed: {
                    enabled: false,
                },
                x: {
                    show: false,
                },
                y: {
                    title: {
                        formatter: function(seriesName) {
                            return "";
                        },
                    },
                },
                marker: {
                    show: false,
                },
            },
        };

        const chart = new ApexCharts(document.querySelector(selector), options);
        chart.render();
    }

    const table_sparkline_1_data = [
        25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54,
    ];
    const table_sparkline_2_data = [
        12, 56, 21, 39, 73, 45, 64, 52, 36, 59, 44,
    ];
    const table_sparkline_3_data = [
        15, 46, 21, 59, 33, 15, 34, 42, 56, 19, 64,
    ];
    const table_sparkline_4_data = [
        30, 56, 31, 69, 43, 35, 24, 32, 46, 29, 64,
    ];
    const table_sparkline_5_data = [
        20, 76, 51, 79, 53, 35, 54, 22, 36, 49, 64,
    ];
    const table_sparkline_6_data = [
        5, 36, 11, 69, 23, 15, 14, 42, 26, 19, 44,
    ];
    const table_sparkline_7_data = [
        12, 56, 21, 39, 73, 45, 64, 52, 36, 59, 74,
    ];

    createSparklineChart("#table-sparkline-1", table_sparkline_1_data);
    createSparklineChart("#table-sparkline-2", table_sparkline_2_data);
    createSparklineChart("#table-sparkline-3", table_sparkline_3_data);
    createSparklineChart("#table-sparkline-4", table_sparkline_4_data);
    createSparklineChart("#table-sparkline-5", table_sparkline_5_data);
    createSparklineChart("#table-sparkline-6", table_sparkline_6_data);
    createSparklineChart("#table-sparkline-7", table_sparkline_7_data);

    //-------------
    // - PIE CHART -
    //-------------

    const pie_chart_options = {
        series: [700, 500, 400, 600, 300, 100],
        chart: {
            type: "donut",
        },
        labels: ["Chrome", "Edge", "FireFox", "Safari", "Opera", "IE"],
        dataLabels: {
            enabled: false,
        },
        colors: [
            "#0d6efd",
            "#20c997",
            "#ffc107",
            "#d63384",
            "#6f42c1",
            "#adb5bd",
        ],
    };

    const pie_chart = new ApexCharts(
        document.querySelector("#pie-chart"),
        pie_chart_options,
    );
    pie_chart.render();

    //-----------------
    // - END PIE CHART -
    //-----------------
</script> <!--end::Script-->
