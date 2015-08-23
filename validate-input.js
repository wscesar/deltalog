function validate_input(e) {
                
    var content = e.value;
    
    content = content.replace(/    /g,' '), //trim four blank spaces
    content = content.replace(/   /g,' '),  //trim three blank spaces
    content = content.replace(/  /g,' ');   //trim two blank spaces

    e.value = content;

    if ( content != '' ) {
        
        e.nextElementSibling.classList.add('fixed')

    } else {

        content == ' ' ? e.value = '' : e.value = content;
        e.nextElementSibling.classList.remove('fixed');

    }

}


var text_input = document.querySelectorAll('form .text');
for( var i = 0; i < text_input.length; i++ ) {

    text_input[i].addEventListener('blur', validate_input(this) );

}