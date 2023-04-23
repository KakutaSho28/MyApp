$(function () {
    let like = $('.like-toggle'); //like-toggleのついたiタグを取得し代入。
    let likePostId; //変数を宣言（なんでここで？）
    like.on('click', function () { //onはイベントハンドラー
        let $this = $(this); //this=イベントの発火した要素＝iタグを代入
        likePostId = $this.data('post-id'); //iタグに仕込んだdata-review-idの値を取得
        //ajax処理スタート
        $.ajax({
            headers: { //HTTPヘッダ情報をヘッダ名と値のマップで記述
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },  //↑name属性がcsrf-tokenのmetaタグのcontent属性の値を取得
            url: '/like', //通信先アドレスで、このURLをあとでルートで設定します
            method: 'POST', //HTTPメソッドの種別を指定します。1.9.0以前の場合はtype:を使用。
            data: { //サーバーに送信するデータ
            'post_id': likePostId //いいねされた投稿のidを送る
            },
        })
        //通信成功した時の処理
        .done((data)=>{
            console.log($this);
            $this.toggleClass('liked'); //likedクラスのON/OFF切り替え。
            $this.next('.like-counter').html(data.post_likes_count);
        })
        //通信失敗した時の処理
        .fail((error)=> {
            console.log('fail'); 
        });
    });
    $("#img").on("change", function (e) {

        // 2. 画像ファイルの読み込みクラス
        var reader = new FileReader();
        
        // 3. 準備が終わったら、id=sample1のsrc属性に選択した画像ファイルの情報を設定
        reader.onload = function (e) {
            $("#in_img").attr("src", e.target.result);
        }
        
        // 4. 読み込んだ画像ファイルをURLに変換
        reader.readAsDataURL(e.target.files[0]);
        });
});