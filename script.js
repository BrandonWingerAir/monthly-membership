function showChangeImg() {
  document.querySelector('#container__img-change').style.display = 'flex';
}

function hideChangeImg() {
  document.querySelector('#container__img-change').style.display = 'none';
}

function uploadImg() {
  document.querySelector('#profile__img-upload').click();
}

function previewImg(e) {
  if (e.files[0]) {
    document.querySelector('#profile__img').style.pointerEvents = 'none';
    document.querySelector('.profile__btn_img-change').style.pointerEvents = 'none';
    document.querySelector('.list-group').style.display = 'none';

    var reader = new FileReader();

    reader.onload = function(e) {
      document.querySelector('#profile__img').setAttribute('src', e.target.result);
    }

    reader.readAsDataURL(e.files[0]);

    document.querySelector('#profile__btn_img-upload').style.display = 'block';
    document.querySelector('#profile__btn_img-save').style.display = 'block';
  }
}