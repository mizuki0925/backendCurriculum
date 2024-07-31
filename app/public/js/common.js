$(function () {
    // TODO：①JQUERY、API
    // ここに処理を書く
    console.log('test');

    // 参考：都道府県APIのサイト
    // https://opendata.resas-portal.go.jp/docs/api/v1/prefectures.html
    setPrefectures();

    // テストボタン押下時
    $(".test-btn").on("click", function () {
        // console.log('testボタン');
        let isHide = $('.api-btn').hasClass('hide');

        if (isHide) {
            // APIボタンを非表示にする
            $('.api-btn').removeClass('hide');
            $(this).text('非表示する');
        } else {
            // APIボタンを表示する
            $('.api-btn').addClass('hide');
            $(this).text('表示する');
        }
    });

    // APIボタン押下時
    $(".api-btn").on("click", function () {
        // console.log('apiボタン');
        getData();
        console.log('API通信OK');
    });

    // 都道府県セレクトボックス変更時
    $('#prefectures').change(function () {
        // 市区町村のセレクトボックスの初期化
        $('#cities').children().remove();
        option = $('<option>').text('-').val('');
        $('#cities').append(option);

        let preCode = $(this).val();
        if (preCode == '') return;

        setCities(preCode);
    });
});

/**
 * テストAPI処理
 */
function getData() {
    let data = 'test1';
    const url = '/api/test/getData/' + data;

    $.ajax({
        type: 'get',           // HTTP通信のタイプ(get, post, put など)
        url: url,           // リクエストを送信する先のURL
        async: true,            // 非同期化の設定 (default : true)
        headers: {              // Http header
            "Content-Type": "application/json", // 送信するデータの型
            "X-HTTP-Method-Override": "GET"
        },
        dataType: 'json',       // サーバから返されるデータの型(html, xml, json, text など)
        // data : JSON.stringify({  // 送信するデータの型(Object , String, Array)
        //     "data" : 'test1',
        // }),
        success: function (result) { // 成功時に実行されるコールバック関数
            console.log(result);
            $(".last").find('p').text(result['data']);
        },
        error: function (request, status, error) { // 通信に失敗したときに呼ばれるコールバック関数。
            console.log(error)
        }
    });
}

/**
 * 都道府県一覧を取得し、セット処理
 */
function setPrefectures() {
    // https://opendata.resas-portal.go.jp/api/v1/prefectures
    const url = '/api/test/getPrefectures';
    const success = function(data) {
        setSelectBox('prefectures', data);
    };
    Ajax('GET', url, null, success, null);
}

/**
 * 市区町村一覧を取得し、セット処理
 *
 * @param {strin} preCode
 */
function setCities(preCode) {
    // https://opendata.resas-portal.go.jp/api/v1/cities?prefCode=1
    const url = '/api/test/getCities/' + preCode;
    const success = function(data) {
        setSelectBox('cities', data);
    };
    Ajax('GET', url, null, success, null);
}

/**
 * セレクトボックスのセット処理
 *
 * @param {string} target
 * @param {JSON} data
 */
function setSelectBox(target, data) {
    let select = $(`#${target}`);
    let option = '';

    $.each(data, function (index, val) {
        if (target == 'prefectures') {
            option = $('<option>').text(val['prefName']).val(val['prefCode']);
        } else {
            option = $('<option>').text(val['cityName']).val(val['cityCode']);
        }
        select.append(option);
    });
}

/**
 * ajaxメソッド（共通化）
 *
 * @param {string} method
 * @param {string} url
 * @param {object} data
 * @param {Function} successFnc
 * @param {Function} errorFnc
 */
function Ajax(method, url, data, successFnc, errorFnc) {
    $.ajax({
        type: method,           // HTTP通信のタイプ(get, post, put など)
        url: url,           // リクエストを送信する先のURL
        headers: {              // Http header
            "Content-Type": "application/json", // 送信するデータの型
        },
        dataType: 'json',       // サーバから返されるデータの型(html, xml, json, text など)
        success: function (result) { // 成功時に実行されるコールバック関数
            if (typeof successFnc === 'function') {
                successFnc(result);
            }
        },
        error: function (request, status, error) { // 通信に失敗したときに呼ばれるコールバック関数。
            console.log(error);
            if (typeof errorFnc === 'function') {
                errorFnc(error);
            }
        }
    });
}
