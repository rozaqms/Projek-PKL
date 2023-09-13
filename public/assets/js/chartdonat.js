createDonutChart(categoryData);
displayCategoryCounts(categoryData);

function createDonutChart(categoryData) {
    var categoryNames = Object.keys(categoryData);
    var categoryCounts = Object.values(categoryData);

    var ctx = document.getElementById("categoryChart").getContext("2d");
    var categoryChart = new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: categoryNames,
            datasets: [{
                data: categoryCounts,
                backgroundColor: [
                    "#FF6384",
                    "#36A2EB",
                    "#FFCE56",
                    "#8C8C8C",
                    "#00A99D",
                    "#FF9900",
                    // ... you can add more colors as needed
                ]
            }]
        },
        options: {
            chart: {
                fontFamily: 'inherit'
            },
            borderWidth: 0,
            cutout: '75%',
            cutoutPercentage: 65,
            responsive: true,
            maintainAspectRatio: false,
            title: {
                display: false
            },
            animation: {
                animateScale: true,
                animateRotate: true
            },
            stroke: {
                width: 0
            },
            tooltips: {
                enabled: true,
                intersect: false,
                mode: 'nearest',
                bodySpacing: 5,
                yPadding: 10,
                xPadding: 10,
                caretPadding: 0,
                displayColors: false,
                backgroundColor: '#20D489',
                titleFontColor: '#ffffff',
                cornerRadius: 4,
                footerSpacing: 0,
                titleSpacing: 0
            },
            plugins: {
                legend: {
                    display: false
                }
            }                
        }
    });
}

function displayCategoryCounts(categoryData) {
var categoryNames = Object.keys(categoryData);
var categoryCounts = Object.values(categoryData);

var totalCategoryCounts = categoryCounts.reduce(function (a, b) {
    return a + parseInt(b);
}, 0);

// Mengisi nilai div dengan id yang sesuai
document.getElementById("lainnyaCount").innerHTML = categoryCounts[0] !== undefined ? categoryCounts[0] : 0;
document.getElementById("makananCount").innerHTML = categoryCounts[1] !== undefined ? categoryCounts[1] : 0;
document.getElementById("minumanCount").innerHTML = categoryCounts[2] !== undefined ? categoryCounts[2] : 0;

// Menampilkan jumlah total
document.getElementById("categoryCounts").innerHTML = totalCategoryCounts;
document.getElementById("categoryCounts").setAttribute("data-kt-countup-value", totalCategoryCounts);
}