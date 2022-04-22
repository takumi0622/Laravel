//商品データを削除する処理
$(function() {
    
    //home.bladeの削除ボタンクリックで処理が実行
    $('.deleteProductButton').on('click', function() {
        //削除確認のダイアログ表示処理
        var deleteConfirm = confirm ("削除aaしてよろしいでしょうか？");

        if(deleteConfirm == true) {
            let clickEle = $(this)
            let productID = clickEle.attr('id')
            
            $.ajax({
                url: '/home' + productID,
                type: 'GET',
                data: {
                    id: productID,
                    "_method": "DELETE",
                    },
                })
            .done(function() {
                clickEle.closest('tr').remove();
            })
            .fail(function() {
                alert('削除できませんでした');
            });

        } else {
            (function(e) {
                e.preventDefault()
            });
        }; 

    });
});