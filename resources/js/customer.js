// 荷主削除ボタンが押下されたら
$("[id=customer_delete]").on("click",function(){
    const result = window.confirm("荷主を削除しますか？");
    // 「はい」が押下されたらsubmit、「いいえ」が押下されたら処理キャンセル
    if(result == false) {
        return false;
    }
});