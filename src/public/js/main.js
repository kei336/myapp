'use strict';

{
   
    const modal = document.querySelector("#modal");
    const mask = document.getElementById('mask');
    const gazou = document.getElementById('gazou');;
    const button = document.querySelectorAll('button');
    const buttons = Array.from(button); 

    // 取得した要素を定数に入れる
    for(let u=0; u < buttons.length; u++ ){
      buttons[u].addEventListener('click', ()=>{
        const id = buttons[u].value;
        $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },//Headersを書き忘れるとエラーになる
          url: "/users/ajax",
          type: 'POST',
          data: {'post_id' : id}
      })
      // Ajaxリクエスト成功時の処理
      .done(function(data) {
          console.log(data);
          const url = "/posts/"+data.id;
          $('#form').attr('action', url);
          $('#title').val(data.title);
          $('#content').val(data.content);
          if(data.image != null){

            $('#gazou').attr('src', "/storage/images/"+data.image);
          }else{
            $('#gazou').hide();
          }
          
          modal.classList.remove('hidden');
          mask.classList.remove('hidden'); 
          
      })
      // Ajaxリクエスト失敗時の処理
      .fail(function(data) {
          alert('Ajaxリクエスト失敗');
      });
       
      });
    }

      mask.addEventListener('click', () =>{
        modal.classList.add('hidden');
        mask.classList.add('hidden');
        $('#gazou').show();
      });
    
  
  
    $('#img').on('change', function(){
    // 中身が変更された時に実行
      let fr = new FileReader();
      // FileReaderオブジェクトの生成
      // FileReaderはFile API
      // ユーザーのローカル環境にある画像ファイルを非同期的に読み込み表示できる
      fr.onload = function(){
      // 読み込んだ時のイベント
        $('#preview').attr('src', fr.result);
        // attrとはHTML要素の属性を取得したり設定できる
        // srcをfr.resultに変更
        // FileReaderのresultプロパティはファイルの内容を返す
        $('#gazou').addClass('hidden');
      }
      fr.readAsDataURL(this.files[0]);
      // readAdDataURLメソッドは指定されたファイルをDataURIとして読み込む
      // Data URIとは外部データを直接ウェブページに埋め込む手法
    });
  }

