const $ =document.querySelector.bind(document);
const $$ =document.querySelectorAll.bind(document);
const parent= $('.img_sub_overfolw');
const arr_img= [...$$('.div_bottom')];
parent.style.width=arr_img.length * 200 + 'px';