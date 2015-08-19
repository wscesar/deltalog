###======================================================================================
=                                  Show Modal Window                                    =
======================================================================================###






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
  window_top_position = window.pageYOffset
  header = document.querySelector('header')
  header_height = header.offsetHeight
  nav = document.querySelector('nav')
  
  if window_top_position > header_height
    # set nav position to fixed if window top position pass the header
    nav.classList.add 'fixed'
    header.classList.add 'fixed'
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
