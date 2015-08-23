
/*==============================================
=            Validate Form Function            =
==============================================
 */
var banner_thumbs, changeBanner, egoi, handleTouchMove, handleTouchStart, i, nav, nav_a, send_form, text_input, xDown, yDown;

text_input = document.querySelectorAll('form .text');

i = 0;

while (i < text_input.length) {
  text_input[i].addEventListener('blur', function() {
    var content;
    content = this.value;
    content = content.replace(RegExp('    ', 'g'), ' ');
    content = content.replace(RegExp('   ', 'g'), ' ');
    content = content.replace(RegExp('  ', 'g'), ' ');
    this.value = content;
    if (content != '') {
      this.nextElementSibling.classList.add('fixed');
    } else {
      if (content == ' ') {
        this.value = '';
      } else {
        this.value = content;
      }
      this.nextElementSibling.classList.remove('fixed');
    }
  });
  i++;
}


/*==============================================
=             Send Form Function                =
==============================================
 */

send_form = function() {
  var data, email, email_domain, email_provider, email_user, msg, name, phone, request, split_email, submit;
  request = new XMLHttpRequest;
  submit = document.querySelector('form .submit');
  name = document.getElementById('name').value;
  email = document.getElementById('email').value;
  phone = document.getElementById('phone').value;
  msg = document.getElementById('msg').value;
  data = 'name=' + name + '&email=' + email + '&phone=' + phone + '&msg=' + msg;
  split_email = email.split('@');
  email_user = split_email[0];
  email_provider = split_email[1].split('.')[0];
  email_domain = split_email[1].split('.')[1];
  submit.setAttribute('disabled', 'true');
  submit.innerHTML = '';
  submit.classList.add('hide');
  submit.classList.add('loading');
  submit.classList.remove('hide');
  request.open('POST', 'inc/send-contact.php', true);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
  request.send(data);
  request.onload = function() {
    if (request.status >= 200 && request.status < 400) {
      submit.classList.add('hide');
      submit.classList.add('success');
      submit.innerHTML = 'Mensagem enviada com sucesso';
      submit.classList.remove('loading');
      submit.classList.remove('hide');
    } else {
      submit.classList.add('hide');
      submit.classList.remove('loading');
      submit.classList.add('error');
      submit.innerHTML = 'erro ao enviar mensagem';
      submit.classList.remove('hide');
    }
  };
};

egoi = function() {
  var cliente, data, email, formid, lang, lista, name, request;
  request = new XMLHttpRequest;
  cliente = '133248';
  lang = 'br';
  lista = '3';
  formid = '3';
  name = document.getElementById('name').value;
  email = document.getElementById('email').value;
  data = 'fname_5=' + name + '&email_6=' + email + '&lista=' + lista + '&cliente=' + cliente + '&lang=' + lang + '&formid=' + formid;
  request.open('POST', 'http://88.kmitd1.com/w/3e3eC0Oe1jSWwRnvgec151ac01', true);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
  request.send(data);
};


/*========================================================
=            Magnify Images On a Modal Banner             =
========================================================
 */

$('.icon-magnify, .icon-magnify + img').on('click', function() {
  var content, group, img, modal_backgrund, modal_banner, number;
  img = this.parentNode.getAttribute('data-image');
  group = this.parentNode.getAttribute('data-group');
  number = this.parentNode.getAttribute('data-number');
  content = document.querySelector('.modal figure img');
  modal_banner = document.querySelector('.modal.banner');
  modal_backgrund = document.querySelector('.modal.background');
  modal_banner.style.display = 'block';
  modal_backgrund.style.display = 'block';
  setTimeout((function() {
    modal_banner.classList.add('show');
    modal_backgrund.classList.add('show');
  }), 10);
  content.setAttribute('src', 'assets/img/' + img);
  content.setAttribute('data-group', group);
  content.setAttribute('data-number', number);
});


/*=======================================================
=            Show Data Table On Modal Window            =
=======================================================
 */

$('.icon-paper, .icon-paper + img').on('click', function() {
  var table;
  var modal_backgrund, modal_table, table, tables;
  table = this.parentNode.getAttribute('data-table');
  table = document.querySelector(table);
  tables = document.querySelectorAll('.modal ul');
  modal_table = document.querySelector('.modal.table');
  modal_backgrund = document.querySelector('.modal.background');
  tables[0].classList.remove('show');
  tables[1].classList.remove('show');
  tables[2].classList.remove('show');
  table.classList.add('show');
  modal_table.style.display = 'block';
  modal_backgrund.style.display = 'block';
  setTimeout((function() {
    modal_table.classList.add('show');
    modal_backgrund.classList.add('show');
  }), 10);
});


/*===============================================================
=            Show Next Image Banner On Modal Window            =
===============================================================
 */

document.querySelector('.modal .right').addEventListener('click', function() {
  var group, img, next;
  img = document.querySelector('.modal img');
  group = img.getAttribute('data-group');
  next = img.getAttribute('data-number');
  next = parseInt(next) + 1;
  if (next > 3) {
    next = 1;
  } else {
    next = next;
  }
  img.classList.add('hide');
  setTimeout((function() {
    img.setAttribute('src', 'assets/img/' + group + '-0' + next + '.jpg');
    img.setAttribute('data-number', next);
    img.classList.remove('hide');
  }), 500);
});


/*===============================================================
=            Show Previous Image Banner On Modal Window          =
===============================================================
 */

document.querySelector('.modal .left').addEventListener('click', function() {
  var group, img, next;
  img = document.querySelector('.modal img');
  group = img.getAttribute('data-group');
  next = img.getAttribute('data-number');
  next = parseInt(next) - 1;
  if (next < 1) {
    next = 3;
  } else {
    next = next;
  }
  img.classList.add('hide');
  setTimeout((function() {
    img.setAttribute('src', 'assets/img/' + group + '-0' + next + '.jpg');
    img.setAttribute('data-number', next);
    img.classList.remove('hide');
  }), 500);
});


/*==========================================
=            Close Modal Window            =
==========================================
 */

document.querySelector('.modal.background').addEventListener('click', function() {
  var modal_background, modal_banner, modal_table;
  modal_table = document.querySelector('.modal.table');
  modal_banner = document.querySelector('.modal.banner');
  modal_background = document.querySelector('.modal.background');
  modal_table.classList.remove('show');
  modal_banner.classList.remove('show');
  modal_background.classList.remove('show');
  setTimeout((function() {
    modal_table.style.display = 'none';
    modal_banner.style.display = 'none';
    modal_background.style.display = 'none';
  }), 1000);
});


/*======================================================================================
=                                Animate Window Scroll                                  =
======================================================================================
 */

nav_a = document.querySelectorAll('nav a');

i = 0;

while (i < nav_a.length) {
  nav_a[i].addEventListener('click', (function() {
    var goTo, page;
    page = this.getAttribute('data-page');
    goTo = document.querySelector(page).offsetTop;
    $('html, body').stop().animate({
      scrollTop: goTo
    }, 1000);
  }), false);
  i++;
}


/*======================================================================================
=            Scroll Header Background and Fix Nav Position on Window Scrool             =
=====================================================================================
 */

window.onscroll = function() {
  var asd, distance_to_map, header, header_height, map, nav, window_top_position;
  nav = document.querySelector('nav');
  map = document.querySelector('#map-canvas');
  header = document.querySelector('header');
  header_height = header.offsetHeight;
  window_top_position = window.pageYOffset;
  distance_to_map = document.querySelector('#map-canvas').offsetTop;
  if (window_top_position > header_height) {
    nav.classList.add('fixed');
    header.classList.add('fixed');
    if ((distance_to_map - window_top_position) > 0) {
      asd = distance_to_map - window_top_position;
      map.style.top = asd(+'px');
    }
  } else {
    header.style.backgroundPosition = '50% ' + window_top_position + 'px';
    nav.classList.remove('fixed');
    header.classList.remove('fixed');
  }
};


/*======================================================================================
=                             Show and Hide Responsive Nav                              =
======================================================================================
 */

nav = document.querySelectorAll('nav');

nav_a = document.querySelectorAll('nav a');

document.querySelector('nav .button').addEventListener('click', function() {
  document.querySelector('nav').classList.add('active');
});

i = 0;

while (i < nav_a.length) {
  nav_a[i].addEventListener('click', (function() {
    nav.classList.remove('active');
  }), false);
  i++;
}


/*======================================================================================
=                              Change Banner Function                                   =
======================================================================================
 */

banner_thumbs = document.querySelectorAll('.ctrl > button');

changeBanner = function(elem) {
  var banner, next_image;
  banner = document.querySelector('#prime-logistics > .banner');
  next_image = elem.getAttribute('data-banner');
  i = 0;
  while (i < banner_thumbs.length) {
    banner_thumbs[i].classList.remove('active');
    i++;
  }
  elem.classList.add('active');
  banner.style.opacity = '0';
  banner.setAttribute('data-banner', next_image);
  banner.style.opacity = '1';
};

i = 0;

while (i < banner_thumbs.length) {
  banner_thumbs[i].addEventListener('click', (function() {
    changeBanner(this);
  }), false);
  i++;
}


/*======================================================================================
=                            Swipe.js downloaded from Github                            =
======================================================================================
 */

handleTouchStart = function(evt) {
  var xDown, yDown;
  xDown = evt.touches[0].clientX;
  yDown = evt.touches[0].clientY;
};

handleTouchMove = function(evt) {
  var xDiff, xDown, xUp, yDiff, yDown, yUp;
  if (!xDown || !yDown) {
    return;
  }
  xUp = evt.touches[0].clientX;
  yUp = evt.touches[0].clientY;
  xDiff = xDown - xUp;
  yDiff = yDown - yUp;
  if (Math.abs(xDiff) > Math.abs(yDiff)) {

    /*most significant */
    if (xDiff > 0) {

      /* left swipe */
      document.querySelector('nav').classList.remove('active');
      return false;
    } else {

      /* right swipe */
    }
  } else {
    if (yDiff > 0) {

      /* up swipe */
    } else {

      /* down swipe */
    }
  }

  /* reset values */
  xDown = null;
  yDown = null;
};

document.addEventListener('touchstart', handleTouchStart, false);

document.addEventListener('touchmove', handleTouchMove, false);

xDown = null;

yDown = null;
//# sourceMappingURL=app.js.map