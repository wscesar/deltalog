body = document.getElementsByTagName('BODY')[0]
body.mouseleave ->
  displayed = document.querySelector('.modal.form').getAttribute('data-displayed')
  if displayed != 'true'
    $('.modal.form').css 'display', 'block'
    $('.modal.background').css 'display', 'block'
    setTimeout (->
      $('.modal.form').attr('data-displayed', 'true').addClass 'show'
      $('.modal.background').addClass 'show'
      return
    ), 1
  return

# ---
# generated by js2coffee 2.1.0