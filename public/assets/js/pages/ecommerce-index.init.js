var options = {
    chart: {
        height: 270,
        type: "bar",
        toolbar: { show: false },
        dropShadow: {
            enabled: true,
            top: 0,
            left: 5,
            bottom: 5,
            right: 0,
            blur: 5,
            color: "#45404a2e",
            opacity: 0.35,
        },
    },
    colors: ["#22c55e", "#08b0e7"], // Xanh lá cho Doanh thu, Xanh dương cho Lợi nhuận
    plotOptions: {
        bar: {
            borderRadius: 6,
            dataLabels: { position: "top" },
            columnWidth: "20",
            distributed: false, // Không phân bố màu sắc riêng cho từng cột
        },
    },
    dataLabels: {
        enabled: true,
        formatter: function (o, opts) {
            var seriesIndex = opts.seriesIndex;
            var percentage;
            if (seriesIndex === 0) {
                percentage = (o / revenue) * 100;
            } else if (seriesIndex === 1) {
                percentage = (o / profit) * 100;
            }
            if (percentage >= 1000) {
                // return (percentage / 1000).toFixed(1).replace(/\.0$/, "") + "%";
            } else {
                // return percentage.toFixed(1).replace(/\.0$/, "") + "%";
            }
        },
        offsetY: -20,
        style: { fontSize: "10px", colors: ["#8997bd"] },
    },
    series: [
        {
            name: "Doanh thu",
            data: chartRevenue, // Cột cao màu xanh lá cây
            color: "#22c55e",
        },
        {
            name: "Lợi nhuận",
            data: chartProfit, // Cột thấp màu xanh dương
            color: "#41cbd8",
        },
    ],
    xaxis: {
        categories: chartTimeUnit,
        position: "top",
        axisBorder: { show: false },
        axisTicks: { show: false },
        crosshairs: {
            fill: {
                type: "gradient",
                gradient: {
                    colorFrom: "#D8E3F0",
                    colorTo: "#BED1E6",
                    stops: [0, 100],
                    opacityFrom: 0.4,
                    opacityTo: 0.5,
                },
            },
        },
        tooltip: { enabled: true },
    },
    yaxis: {
        axisBorder: { show: false },
        axisTicks: { show: false },
        labels: {
            show: true,
            formatter: function (o) {
                if (o >= 1e9) {
                    return (o / 1e9).toFixed(1).replace(/\.0$/, "") + " tỷ";
                } else if (o >= 1e6) {
                    return (o / 1e6).toFixed(1).replace(/\.0$/, "") + " triệu";
                } else if (o >= 1e3) {
                    return (o / 1e3).toFixed(1).replace(/\.0$/, "") + "k";
                } else {
                    return o.toString() + " vnđ";
                }
            },
        },
    },
    grid: {
        row: { colors: ["transparent", "transparent"], opacity: 0.2 },
        strokeDashArray: 2.5,
    },
    legend: { show: false },
};
// Render chart
var chart = new ApexCharts(document.querySelector("#monthly_income"), options);
chart.render();