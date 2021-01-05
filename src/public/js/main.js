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
      let fr = new FileReader();
      fr.onload = function(){
        $('#preview' + y).attr('src', fr.result);
        $('#gazou' + y).addClass('hidden');
      }
      fr.readAsDataURL(this.files[0]);
    });
  }
}
