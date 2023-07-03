let sampleChartsClass;
(function ($) {
    $(document).ready(function (){
        var labelEq = Object.keys(Data1);
        var dataEq = Object.values(Data1);
        var labelLab = Object.keys(Data2);
        var dataLab = Object.values(Data2);

        const ctx = document.getElementById('myBarChart1');
        sampleChartsClass.ChartData(ctx, 'bar', labelEq, dataEq)

        const pieChart = document.getElementById('myBarChart2');
        sampleChartsClass.ChartData(pieChart, 'bar', labelLab, dataLab)
    });

    sampleChartsClass = {
        ChartData:function (ctx, type, labels, data){
            new Chart(ctx, {
                type: type,
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'My First Dataset',
                        data: data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(255, 159, 64, 0.6)',
                            'rgba(255, 205, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(153, 102, 255, 0.6)'
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)'
                        ],
                        borderWidth: 1
                    }],
                },
                options: {
                    layout: {
                      padding: 20
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    }
})(jQuery);
