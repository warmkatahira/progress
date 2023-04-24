const orange = 'rgba(246, 173, 85, 1)';
const gray = 'rgb(196, 196, 196)';

// 30秒毎に自動更新
$(document).ready(function() {
    setInterval(function() {
        location.reload();
    }, 30000);
});

window.onload = function () {
    progress_chart();
}

function progress_chart(){
    Progress_Chart = null;
    // 環境でパスを可変させる
    if(process.env.MIX_APP_ENV === 'local'){
        var ajax_url = '/post_list/progress_chart_ajax';
    }
    if(process.env.MIX_APP_ENV === 'pro'){
        var ajax_url = '/touch/post_list/progress_chart_ajax';
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },    
        url: ajax_url,
        type: 'POST',
        data: { 
            "customer_code" : $('#customer_code').val()
        },
        dataType: 'json',
        success: function(data){
            // チャートを表示
            let Context = document.querySelector("#progress_chart").getContext('2d');
            // 前回のチャートを破棄
            if (Progress_Chart != null) {
                Progress_Chart.destroy();
            }
            Progress_Chart = new Chart(Context, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        // 
                        data: [data['progress_1'], data['progress_2']],
                        backgroundColor: [orange, gray],
                        label: ['進捗率']
                    }],
                },
                options: {
                    responsive: false,
                    title: {
                    },
                    animation: false,
                }
            })
            // 進捗率に出力
            $('#progress').html(data['progress_1'] + ' %');
        },
        error: function(){
            alert('失敗');
        }
    });
}