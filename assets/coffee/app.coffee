###=====================================================================
=            Show modal form when user are leaving the page            =
=====================================================================###

do ->
  modal_form = document.querySelector('.modal.form')
  modal_bg = document.querySelector('.modal.background')

  document.querySelector('body').addEventListener 'mouseleave', (element) ->
    displayed = modal_form.getAttribute('data-displayed')

    if element.offsetY - $(window).scrollTop() < 0 and displayed != 'true'

      modal_form.style.display = 'block'
      modal_bg.style.display = 'block'

      setTimeout (->
        modal_bg.classList.add 'show'
        modal_form.classList.add 'show'
        modal_form.classList.add 'shake'
        modal_form.setAttribute 'data-displayed', 'true'
      ),500




###===============================================================
=            Show modal form when user clic on button            =
===============================================================###
do ->
  document.querySelector('#allotments a').onclick =  ->
    
    displayed = document.querySelector('.modal.form').getAttribute('data-displayed')
    
    $('.modal.form').css 'display', 'block'
    $('.modal.background').css 'display', 'block'

    setTimeout (->
      # displayed.classList.add('show')
      # displayed.setAttribute('data-displayed', 'true')
      $('.modal.form').attr('data-displayed', 'true').addClass 'show'
      $('.modal.background').addClass 'show'
    ), 1




###====================================================
=            Validate Text Inputs Function            =
====================================================###

text_input = document.querySelectorAll('form .text')

i = 0
while i < text_input.length
  text_input[i].onblur = ->
    content = @value
    content = content.replace(RegExp('    ', 'g'), ' ') #trim four blank spaces
    content = content.replace(RegExp('   ', 'g'), ' ') #trim three blank spaces
    content = content.replace(RegExp('  ', 'g'), ' ') #trim two blank spaces
    type    = @getAttribute('type')

    
    # Replace content and value to empty if there are just blank spaces
    if content == ' '
      @value = ''
      content = ''
    else
      @value = content


    # If content is not empty fix label
    if content != ''
      @nextElementSibling.classList.add 'fixed'
    else
      @nextElementSibling.classList.remove 'fixed'


    # If type equals email verify if email exists
    if type == 'email'
      form     = @getAttribute('data-form')
      submit   = document.querySelector(form + ' .submit')
      data     = 'domain=' + @value.split('@')[1]
      was_sent = submit.getAttribute 'data-send'

      if was_sent != 'true'
        request = new XMLHttpRequest
        request.open 'POST', 'inc/validate-email.php', true
        request.setRequestHeader 'Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8'
        request.send data

        request.onload = ->
          if request.status >= 200 and request.status < 400
            response = request.responseText
            
            if response != 'valid-email'
              submit.setAttribute 'disabled', 'true'
              submit.classList.add 'alert'
              submit.innerHTML = 'Informe um email válido'
            else
              submit.removeAttribute 'disabled'
              submit.classList.remove 'alert'
              submit.innerHTML = 'Enviar'
  i++




###==============================================
=             Send Form Function                =
==============================================###

send_form = (element) ->
  form        = element.getAttribute('data-form')
  submit      = document.querySelector(form + ' .submit')
  name        = document.querySelector(form + ' .name').value
  email       = document.querySelector(form + ' .email').value
  phone       = document.querySelector(form + ' .phone').value
  msg         = document.querySelector(form + ' .msg').value
  data        = 'name=' + name + '&email=' + email + '&phone=' + phone + '&msg=' + msg
  
  submit.setAttribute 'disabled', 'true'
  submit.innerHTML = ''
  submit.classList.add 'hide'
  submit.classList.add 'loading'
  submit.classList.remove 'hide'
  
  request = new XMLHttpRequest
  request.open 'POST', 'inc/send-contact.php', true
  request.setRequestHeader 'Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8'
  request.send data

  request.onload = ->
    if request.status >= 200 and request.status < 400
      all_submits = document.querySelectorAll('form .submit')

      # set data-displayed on modal form to true
      document.querySelector('.modal.form').setAttribute 'data-displayed', 'true'

      i = 0
      while i < all_submits.length
        # set data-send equals true on all submit button
        all_submits[i].setAttribute 'data-send', 'true'
        
        # disable all submit button
        all_submits[i].setAttribute 'disabled', 'true'
        all_submits[i].classList.add 'hide'
        all_submits[i].classList.add 'success'
        all_submits[i].innerHTML = 'Sua mensagem enviada com sucesso, obrigado'
        all_submits[i].classList.remove 'loading'
        all_submits[i].classList.remove 'hide'

        i++

    else
      alert 'Erro ao enviar email, arquivo send-contact não encontrado, contate o administrador do site'





egoi = (element) ->
  form    = element.getAttribute('data-form')
  name    = document.querySelector(form + ' .name').value
  email   = document.querySelector(form + ' .email').value
  cliente = '133248'
  lang    = 'br'
  lista   = '3'
  formid  = '3'
  data    = 'fname_5=' + name + '&email_6=' + email + '&lista=' + lista + '&cliente=' + cliente + '&lang=' + lang + '&formid=' + formid

  request = new XMLHttpRequest
  request.open 'POST', 'http://88.kmitd1.com/w/3e3eC0Oe1jSWwRnvgec151ac01', true
  request.setRequestHeader 'Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8'
  request.send data




###=======================================================
=            Show Data Table On Modal Window            =
=======================================================###
do ->
  $('.icon-paper, .icon-paper + img').on 'click', ->
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
    ), 1
    







###========================================================
=            Magnify Images On a Modal Banner             =
========================================================###
do ->
  $('.icon-magnify, .icon-magnify + img, figure .img, .aerial_view button').on 'click', ->
    img                  = @parentNode.getAttribute('data-image')
    group                = @parentNode.getAttribute('data-group')
    number               = @parentNode.getAttribute('data-number')
    caption              = @parentNode.getAttribute('data-caption')
    section              = @parentNode.getAttribute('data-section')
    modal_banner         = document.querySelector('.modal.banner')
    modal_backgrund      = document.querySelector('.modal.background')
    img_placeholder      = document.querySelector('.modal figure img')
    caption_placeholder  = document.querySelector('.modal figure figcaption')
    
    modal_banner.style.display = 'block'
    modal_backgrund.style.display = 'block'
    
    setTimeout (->
      modal_banner.classList.add 'show'
      modal_backgrund.classList.add 'show'
    ), 1
    
    img_placeholder.setAttribute 'src', 'assets/img/' + img
    img_placeholder.setAttribute 'data-group', group
    img_placeholder.setAttribute 'data-number', number
    img_placeholder.setAttribute 'data-section', section
    
    if caption != null
      caption_placeholder.innerHTML = caption
      caption_placeholder.style.display = 'block'
    else
      caption_placeholder.innerHTML = ''
      caption_placeholder.style.display = 'none'





###===============================================================
=            Show Next Image Banner On Modal Window            =
===============================================================###
do ->
  document.querySelector('.modal .icon-right_arrow').onclick = ->
    img     = document.querySelector('.modal img')
    caption = document.querySelector('.modal figcaption')
    group   = img.getAttribute('data-group')
    section = img.getAttribute('data-section')
    next    = img.getAttribute('data-number')
    next    = parseInt(next) + 1
    
    if next > 3 then (next = 1) else (next = next)

    next_caption = document.querySelector(section + ' .figure' + next).getAttribute('data-caption')

    caption.innerHTML = next_caption
    caption.style.display = 'block'
    img.classList.add 'hide'
    
    setTimeout (->
      img.setAttribute 'src', 'assets/img/' + group + '-0' + next + '.jpg'
      img.setAttribute 'data-number', next
      img.classList.remove 'hide'
      return
    ), 500






###===============================================================
=            Show Previous Image Banner On Modal Window          =
===============================================================###
do ->
  document.querySelector('.modal .icon-left_arrow').onclick = ->
    img     = document.querySelector('.modal img')
    caption = document.querySelector('.modal figcaption')
    group   = img.getAttribute('data-group')
    section = img.getAttribute('data-section')
    next    = img.getAttribute('data-number')
    next    = parseInt(next) - 1
    
    if next < 1 then (next = 3) else (next = next)

    next_caption = document.querySelector(section + ' .figure' + next).getAttribute('data-caption')
    
    caption.innerHTML = next_caption
    caption.style.display = 'block'
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
do ->
  document.querySelector('.modal.background').onclick = ->

    # select all modal windows
    modal_form = document.querySelector('.modal.form')
    modal_table = document.querySelector('.modal.table')
    modal_banner = document.querySelector('.modal.banner')
    modal_bg = document.querySelector('.modal.background')

    # remove 'show' class from all modal windows
    modal_form.classList.remove 'show'
    modal_table.classList.remove 'show'
    modal_banner.classList.remove 'show'
    modal_bg.classList.remove 'show'

    # wait one second till the css animation ends and apply display none on all modal windows
    setTimeout (->
      modal_form.classList.remove 'shake'
      modal_form.style.display = 'none'
      modal_table.style.display = 'none'
      modal_banner.style.display = 'none'
      modal_bg.style.display = 'none'
      return
    ), 1000








###======================================================================================
=                                Animate Window Scroll                                  =
======================================================================================###
do ->
  nav_a = document.querySelectorAll('nav a')
  to_top = document.querySelector('.icon-top_arrow')

  to_top.onclick = ->
    $('html, body').stop().animate { scrollTop: 0 }, 1000

  i = 0
  while i < nav_a.length
    
    nav_a[i].onclick = ->
      
      section = @getAttribute('data-section')
      goTo = document.querySelector(section).offsetTop

      $('html, body').stop().animate { scrollTop: goTo }, 1000

      return false

    i++






###======================================================================================
=            Scroll Header Background and Fix Nav Position on Window Scrool             =
=====================================================================================####
do ->
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





###======================================================================================
=                             Show and Hide Responsive Nav                              =
======================================================================================###

nav = document.querySelector('nav')
nav_a = document.querySelectorAll('nav a')

# show hidden nav
document.querySelector('nav .button').onclick = ->
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
banner              = document.querySelector('#prime-logistics > .banner')
banner_left_arrow   = document.querySelector('#prime-logistics > .banner .icon-left_arrow')
banner_right_arrow  = document.querySelector('#prime-logistics > .banner .icon-right_arrow')
banner_thumbs       = document.querySelectorAll('.thumbs > button')

changeBanner = (element) ->
  next_banner   = element.getAttribute('data-number')
  next_caption  = element.getAttribute('data-caption')
  caption       = document.querySelector('#prime-logistics .banner .caption p')
  
  i = 0 
  #pass trough banner_thumbs removing 'active' class
  while i < banner_thumbs.length
    banner_thumbs[i].classList.remove 'active'
    i++
  
  element.classList.add 'active'                      # add 'active' class on clicked thumb
  banner.style.opacity = '0'                          # hide banner
  banner.setAttribute 'data-number', next_banner      # change image
  caption.innerHTML = next_caption                    #change caption
  banner.style.opacity = '1'                          # show banner





###====================================
=            Banner Timer            =
====================================###

thumb = 1
timer = setInterval((->
  thumb++
  
  if thumb > 3 then (thumb = 1) else (thumb = thumb)
  
  document.querySelector('#thumb0' + thumb).click()

), 4000)





###=================================================================
=            Apply changeBanner() on all banner_thumbs             =
=================================================================###

i = 0
while i < banner_thumbs.length
  banner_thumbs[i].addEventListener 'click', (->

    changeBanner this
    clearInterval timer

    timer = setInterval((->
      thumb++
      if thumb > 3 then (thumb = 1) else (thumb = thumb)
      $('#thumb0' + thumb).click()
    ), 4000)

  ), false
  i++





###=================================================
=            Banner Left Arrow Function            =
=================================================###

banner_left_arrow.onclick = ->
  next_banner = banner.getAttribute('data-number')
  next_banner = parseInt(next_banner) - 1

  if next_banner < 1 then (next_banner = 3) else (next_banner = next_banner)

  # banner.setAttribute 'data-number', next_banner
  document.querySelector('#thumb0' + next_banner).click()





###=================================================
=            Banner Right Arrow Function            =
=================================================###

banner_right_arrow.onclick = ->
  next_banner = banner.getAttribute('data-number')
  next_banner = parseInt(next_banner) + 1
  
  if next_banner > 3 then (next_banner = 1) else (next_banner = next_banner)

  # banner.setAttribute 'data-number', next_banner
  document.querySelector('#thumb0' + next_banner).click()










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
