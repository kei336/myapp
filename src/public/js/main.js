'use strict';

{
  for(let y=0; y<1000; y++){
    const open = document.querySelectorAll("#open"+ y);
    // idがopenであるすべての要素を定数openに入れる
    const opens = Array.from(open);
    
    // 定数opensにopenを配列として入れる
    const close = document.getElementById('close');
  
    const modal = document.querySelector("#modal"+ y);
    const mask = document.getElementById('mask');
    const gazou = document.getElementById('gazou');
    // 取得した要素を定数に入れる
  
    for (let i=0; i < opens.length; i++){
      // opens.forEach(open　=>{
        opens[i].addEventListener('click', () =>{
          modal.classList.remove('hidden');
          mask.classList.remove('hidden');       
        // });
      });
      mask.addEventListener('click', () =>{
        modal.classList.add('hidden');
        mask.classList.add('hidden');
      });
    }
  
  
    $('#image' + y).on('change', function(){
    // 中身が変更された時に実行
      let fr = new FileReader();
      // FileReaderオブジェクトの生成
      // FileReaderはFile API
      // ユーザーのローカル環境にある画像ファイルを非同期的に読み込み表示できる
      fr.onload = function(){
      // 読み込んだ時のイベント
        $('#preview' + y).attr('src', fr.result);
        // attrとはHTML要素の属性を取得したり設定できる
        // srcをfr.resultに変更
        // FileReaderのresultプロパティはファイルの内容を返す
        $('#gazou' + y).addClass('hidden');
      }
      fr.readAsDataURL(this.files[0]);
      // readAdDataURLメソッドは指定されたファイルをDataURIとして読み込む
      // Data URIとは外部データを直接ウェブページに埋め込む手法
    });
  }
}
