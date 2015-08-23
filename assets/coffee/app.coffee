###==============================================
=            Validate Form Function            =
==============================================###

text_input = document.querySelectorAll('form .text')

i = 0
while i < text_input.length
  text_input[i].addEventListener 'blur', ->
    content = @value
    content = content.replace(RegExp('    ', 'g'), ' ') #trim four blank spaces
    content = content.replace(RegExp('   ', 'g'), ' ') #trim three blank spaces
    content = content.replace(RegExp('  ', 'g'), ' ') #trim two blank spaces
    
    @value = content
    if `content != ''`
      @nextElementSibling.classList.add 'fixed'
    else
      if `content == ' '` then (@value = '') else (@value = content)
      @nextElementSibling.classList.remove 'fixed'
    return
  i++






###==============================================
=             Send Form Function                =
==============================================###

send_form = ->
  request = new XMLHttpRequest
  submit = document.querySelector('form .submit')
  name = document.getElementById('name').value
  email = document.getElementById('email').value
  phone = document.getElementById('phone').value
  msg = document.getElementById('msg').value
  data = 'name=' + name + '&email=' + email + '&phone=' + phone + '&msg=' + msg
  
  split_email = email.split('@')
  email_user = split_email[0]
  email_provider = split_email[1].split('.')[0]
  email_domain = split_email[1].split('.')[1]
  # email_country   = split_email[1].split('.')[2]
  # email_country != '' ? email_country = email_country : email = 'us'
  
  submit.setAttribute 'disabled', 'true'
  submit.innerHTML = ''
  submit.classList.add 'hide'
  submit.classList.add 'loading'
  submit.classList.remove 'hide'
  
  request.open 'POST', 'inc/send-contact.php', true
  request.setRequestHeader 'Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8'
  request.send data

  request.onload = ->
    if request.status >= 200 and request.status < 400
      submit.classList.add 'hide'
      submit.classList.add 'success'
      submit.innerHTML = 'Mensagem enviada com sucesso'
      submit.classList.remove 'loading'
      submit.classList.remove 'hide'
      # var response = request.responseText; //do another validation with this var
    else
      submit.classList.add 'hide'
      submit.classList.remove 'loading'
      submit.classList.add 'error'
      submit.innerHTML = 'erro ao enviar mensagem'
      submit.classList.remove 'hide'
    return

  return





egoi = ->
  request = new XMLHttpRequest
  cliente = '133248'
  lang = 'br'
  lista = '3'
  formid = '3'
  name = document.getElementById('name').value
  email = document.getElementById('email').value
  data = 'fname_5=' + name + '&email_6=' + email + '&lista=' + lista + '&cliente=' + cliente + '&lang=' + lang + '&formid=' + formid

  request.open 'POST', 'http://88.kmitd1.com/w/3e3eC0Oe1jSWwRnvgec151ac01', true
  request.setRequestHeader 'Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8'
  request.send data
  
  return







###========================================================
=            Magnify Images On a Modal Banner             =
========================================================###

$('.icon-magnify, .icon-magnify + img').on 'click', ->
  img = @parentNode.getAttribute('data-image')
  group = @parentNode.getAttribute('data-group')
  number = @parentNode.getAttribute('data-number')
  content = document.querySelector('.modal figure img')
  modal_banner = document.querySelector('.modal.banner')
  modal_backgrund = document.querySelector('.modal.background')
  
  modal_banner.style.display = 'block'
  modal_backgrund.style.display = 'block'
  
  setTimeout (->
    modal_banner.classList.add 'show'
    modal_backgrund.classList.add 'show'
    return
  ), 10
  
  content.setAttribute 'src', 'assets/img/' + img
  content.setAttribute 'data-group', group
  content.setAttribute 'data-number', number
  
  return




###=======================================================
=            Show Data Table On Modal Window            =
=======================================================###

$('.icon-paper, .icon-paper + img').on 'click', ->
  `var table`
  table = @parentNode.getAttribute('data-table')
  table = document.querySelector(table)
  tables = document.querySelectorAll('.modal ul')
  modal_table = document.querySelector('.modal.table')
  modal_backgrund = document.querySelector('.modal.background')
  
  tables[0].classList.remove 'show'
  tables[1].classList.remove 'show'
  tables[2].classList.remove 'show'
  table.classList.add 'show'
  
  modal_table.style.display = 'block'
  modal_backgrund.style.display = 'block'
  
  setTimeout (->
    modal_table.classList.add 'show'
    modal_backgrund.classList.add 'show'
    return
  ), 10
  
  return





###===============================================================
=            Show Next Image Banner On Modal Window            =
===============================================================###

document.querySelector('.modal .right').addEventListener 'click', ->
  img = document.querySelector('.modal img')
  group = img.getAttribute('data-group')
  next = img.getAttribute('data-number')
  next = parseInt(next) + 1
  
  if next > 3 then (next = 1) else (next = next)
  
  img.classList.add 'hide'
  
  setTimeout (->
    img.setAttribute 'src', 'assets/img/' + group + '-0' + next + '.jpg'
    img.setAttribute 'data-number', next
    img.classList.remove 'hide'
    return
  ), 500

  return





###===============================================================
=            Show Previous Image Banner On Modal Window          =
===============================================================###

document.querySelector('.modal .left').addEventListener 'click', ->
  img = document.querySelector('.modal img')
  group = img.getAttribute('data-group')
  next = img.getAttribute('data-number')
  next = parseInt(next) - 1
  if next < 1 then (next = 3) else (next = next)
  img.classList.add 'hide'
  setTimeout (->
    img.setAttribute 'src', 'assets/img/' + group + '-0' + next + '.jpg'
    img.setAttribute 'data-number', next
    img.classList.remove 'hide'
    return
  ), 500
  return





###==========================================
=            Close Modal Window            =
==========================================###

document.querySelector('.modal.background').addEventListener 'click', ->
  modal_table = document.querySelector('.modal.table')
  modal_banner = document.querySelector('.modal.banner')
  modal_background = document.querySelector('.modal.background')
  modal_table.classList.remove 'show'
  modal_banner.classList.remove 'show'
  modal_background.classList.remove 'show'
  setTimeout (->
    modal_table.style.display = 'none'
    modal_banner.style.display = 'none'
    modal_background.style.display = 'none'
    return
  ), 1000
  return








###======================================================================================
=                                Animate Window Scroll                                  =
======================================================================================###

nav_a = document.querySelectorAll('nav a')
i = 0
while i < nav_a.length
  nav_a[i].addEventListener 'click', (->
    page = @getAttribute('data-page')
    goTo = document.querySelector(page).offsetTop
    $('html, body').stop().animate { scrollTop: goTo }, 1000
    return
  ), false
  i++





###======================================================================================
=            Scroll Header Background and Fix Nav Position on Window Scrool             =
=====================================================================================####

window.onscroll = ->
  nav = document.querySelector('nav')
  map = document.querySelector('#map-canvas')
  
  header = document.querySelector('header')
  header_height = header.offsetHeight

  window_top_position = window.pageYOffset
  distance_to_map = document.querySelector('#map-canvas').offsetTop
  
 
  if window_top_position > header_height
    # set nav position to fixed if window top position pass the header
    nav.classList.add 'fixed'
    header.classList.add 'fixed'


    # if (distance_to_map - window_top_position) > 0
    #   asd = distance_to_map - window_top_position
      # alert(asd)
      # map.style.top =  asd +'px'
      # map.style.bottom =  -x +'px'

  else
    # change header background position
    header.style.backgroundPosition = '50% ' + window_top_position + 'px'

    # remove fixed position when window scroll reaches the header
    nav.classList.remove 'fixed'
    header.classList.remove 'fixed'
  return





 ###======================================================================================
 =                             Show and Hide Responsive Nav                              =
 ======================================================================================###

 nav = document.querySelectorAll('nav')
 nav_a = document.querySelectorAll('nav a')
 # show hidden nav
 document.querySelector('nav .button').addEventListener 'click', ->
   document.querySelector('nav').classList.add 'active'
   return
 # hide nav when user select an option
 i = 0
 while i < nav_a.length
   nav_a[i].addEventListener 'click', (->
     nav.classList.remove 'active'
     return
   ), false
   i++





###======================================================================================
=                              Change Banner Function                                   =
======================================================================================###

banner_thumbs = document.querySelectorAll('.ctrl > button')
# apply changeBanner() on all banner_thumbs 

changeBanner = (elem) ->
  banner = document.querySelector('#prime-logistics > .banner')
  next_image = elem.getAttribute('data-banner')
  #pass trough banner_thumbs removing 'active' class
  i = 0
  while i < banner_thumbs.length
    banner_thumbs[i].classList.remove 'active'
    i++
  #add 'active' class on clicked button
  elem.classList.add 'active'
  # hide banner
  banner.style.opacity = '0'
  # change image
  banner.setAttribute 'data-banner', next_image
  # show banner
  banner.style.opacity = '1'
  return

i = 0
while i < banner_thumbs.length
  banner_thumbs[i].addEventListener 'click', (->
    changeBanner this
    return
  ), false
  i++





###======================================================================================
=                            Swipe.js downloaded from Github                            =
======================================================================================###

handleTouchStart = (evt) ->
  xDown = evt.touches[0].clientX
  yDown = evt.touches[0].clientY
  return

handleTouchMove = (evt) ->
  if !xDown or !yDown
    return
  xUp = evt.touches[0].clientX
  yUp = evt.touches[0].clientY
  xDiff = xDown - xUp
  yDiff = yDown - yUp
  if Math.abs(xDiff) > Math.abs(yDiff)

    ###most significant###

    if xDiff > 0

      ### left swipe ###

      document.querySelector('nav').classList.remove 'active'
      return false
    else

      ### right swipe ###

  else
    if yDiff > 0

      ### up swipe ###

    else

      ### down swipe ###

  ### reset values ###

  xDown = null
  yDown = null
  return

document.addEventListener 'touchstart', handleTouchStart, false
document.addEventListener 'touchmove', handleTouchMove, false
xDown = null
yDown = null
