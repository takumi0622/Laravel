$(function () {
    //検索ボタンクリックで処理が実行
    $('#search_button').on('click', function () {
        $("#product_table").empty();

        var search_keyword = $('#search_keyword').val();

        if (!search_keyword) {
            return false;
            //検索ワードが空の時、ここで処理を止める
        }

        $.ajax({
            type: 'GET',
            url: '/home' + search_keyword,
            datatype: 'json',
            data: {
                keyword: search_keyword,
            },

        }).done(function (data) {
            //通信成功事の処理
            let html = "";
            $.each(data, function (index, value) {
                let id = value.id;
                let product_name = value.product_name;
                let price = value.price;
                let stock = value.stock;
                let company_name = value.company_name;
                let img = value.img;

                viewテンプレート
                html= `
                <tr>
                    <td>${id}</td>
                    <td><img src="${img}" class="img-fluid" width="200" height="200"></td>
                    <td>${product_name}</td>
                    <td>${price}</td>
                    <td>${stock}</td>
                    <td>${company_name}</td>
                </tr>
                `
            })
            $('.product_table').append(html);
        }).fail(function () {
            //通信が失敗した時の処理
            console.log('エラー');
        })
    })
});
