var banner_thumbs,changeBanner,egoi,handleTouchMove,handleTouchStart,i,nav,nav_a,send_form,text_input,thumb,timer,xDown,yDown;for(text_input=document.querySelectorAll("form .text"),i=0;i<text_input.length;)text_input[i].addEventListener("blur",function(){var e;return e=this.value,e=e.replace(RegExp("    ","g")," "),e=e.replace(RegExp("   ","g")," "),e=e.replace(RegExp("  ","g")," ")," "===e?(this.value="",e=""):this.value=e,""!==e?this.nextElementSibling.classList.add("fixed"):this.nextElementSibling.classList.remove("fixed")}),i++;for(send_form=function(){var e,t,n,a,s,o,i,c,r,l,d;r=new XMLHttpRequest,d=document.querySelector("form .submit"),i=document.getElementById("name").value,t=document.getElementById("email").value,c=document.getElementById("phone").value,o=document.getElementById("msg").value,e="name="+i+"&email="+t+"&phone="+c+"&msg="+o,l=t.split("@"),s=l[0],a=l[1].split(".")[0],n=l[1].split(".")[1],d.setAttribute("disabled","true"),d.innerHTML="",d.classList.add("hide"),d.classList.add("loading"),d.classList.remove("hide"),r.open("POST","inc/send-contact.php",!0),r.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8"),r.send(e),r.onload=function(){r.status>=200&&r.status<400?(d.classList.add("hide"),d.classList.add("success"),d.innerHTML="Mensagem enviada com sucesso",d.classList.remove("loading"),d.classList.remove("hide")):(d.classList.add("hide"),d.classList.remove("loading"),d.classList.add("error"),d.innerHTML="erro ao enviar mensagem",d.classList.remove("hide"))}},egoi=function(){var e,t,n,a,s,o,i,c;c=new XMLHttpRequest,e="133248",s="br",o="3",a="3",i=document.getElementById("name").value,n=document.getElementById("email").value,t="fname_5="+i+"&email_6="+n+"&lista="+o+"&cliente="+e+"&lang="+s+"&formid="+a,c.open("POST","http://88.kmitd1.com/w/3e3eC0Oe1jSWwRnvgec151ac01",!0),c.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8"),c.send(t)},$(".icon-magnify, .icon-magnify + img").on("click",function(){var e,t,n,a,s,o;n=this.parentNode.getAttribute("data-image"),t=this.parentNode.getAttribute("data-group"),o=this.parentNode.getAttribute("data-number"),e=document.querySelector(".modal figure img"),s=document.querySelector(".modal.banner"),a=document.querySelector(".modal.background"),s.style.display="block",a.style.display="block",setTimeout(function(){s.classList.add("show"),a.classList.add("show")},10),e.setAttribute("src","assets/img/"+n),e.setAttribute("data-group",t),e.setAttribute("data-number",o)}),$(".icon-paper, .icon-paper + img").on("click",function(){var e,t,n,e,a;e=this.parentNode.getAttribute("data-table"),e=document.querySelector(e),a=document.querySelectorAll(".modal ul"),n=document.querySelector(".modal.table"),t=document.querySelector(".modal.background"),a[0].classList.remove("show"),a[1].classList.remove("show"),a[2].classList.remove("show"),e.classList.add("show"),n.style.display="block",t.style.display="block",setTimeout(function(){n.classList.add("show"),t.classList.add("show")},10)}),document.querySelector(".modal .right").addEventListener("click",function(){var e,t,n;t=document.querySelector(".modal img"),e=t.getAttribute("data-group"),n=t.getAttribute("data-number"),n=parseInt(n)+1,n=n>3?1:n,t.classList.add("hide"),setTimeout(function(){t.setAttribute("src","assets/img/"+e+"-0"+n+".jpg"),t.setAttribute("data-number",n),t.classList.remove("hide")},500)}),document.querySelector(".modal .left").addEventListener("click",function(){var e,t,n;t=document.querySelector(".modal img"),e=t.getAttribute("data-group"),n=t.getAttribute("data-number"),n=parseInt(n)-1,n=1>n?3:n,t.classList.add("hide"),setTimeout(function(){t.setAttribute("src","assets/img/"+e+"-0"+n+".jpg"),t.setAttribute("data-number",n),t.classList.remove("hide")},500)}),document.querySelector(".modal.background").addEventListener("click",function(){var e,t,n;n=document.querySelector(".modal.table"),t=document.querySelector(".modal.banner"),e=document.querySelector(".modal.background"),n.classList.remove("show"),t.classList.remove("show"),e.classList.remove("show"),setTimeout(function(){n.style.display="none",t.style.display="none",e.style.display="none"},1e3)}),nav_a=document.querySelectorAll("nav a"),i=0;i<nav_a.length;)nav_a[i].addEventListener("click",function(){var e,t;t=this.getAttribute("data-section"),e=document.querySelector(t).offsetTop,$("html, body").stop().animate({scrollTop:e},1e3)},!1),i++;for(window.onscroll=function(){var e,t,n,a,s,o;s=document.querySelector("nav"),a=document.querySelector("#map-canvas"),t=document.querySelector("header"),n=t.offsetHeight,o=window.pageYOffset,e=document.querySelector("#map-canvas").offsetTop,o>n?(s.classList.add("fixed"),t.classList.add("fixed")):(t.style.backgroundPosition="50% "+o+"px",s.classList.remove("fixed"),t.classList.remove("fixed"))},nav=document.querySelector("nav"),nav_a=document.querySelectorAll("nav a"),document.querySelector("nav .button").addEventListener("click",function(){document.querySelector("nav").classList.add("active")}),i=0;i<nav_a.length;)nav_a[i].addEventListener("click",function(){nav.classList.remove("active")},!1),i++;for(banner_thumbs=document.querySelectorAll(".ctrl > button"),changeBanner=function(e){var t,n;for(t=document.querySelector("#prime-logistics > .banner"),n=e.getAttribute("data-banner"),i=0;i<banner_thumbs.length;)banner_thumbs[i].classList.remove("active"),i++;e.classList.add("active"),t.style.opacity="0",t.setAttribute("data-banner",n),t.style.opacity="1"},thumb=1,timer=setInterval(function(){thumb++,thumb=thumb>3?1:thumb,$("#thumb0"+thumb).click()},4e3),i=0;i<banner_thumbs.length;)banner_thumbs[i].addEventListener("click",function(){changeBanner(this),clearInterval(timer),timer=setInterval(function(){thumb++,thumb=thumb>3?1:thumb,$("#thumb0"+thumb).click()},4e3)},!1),i++;handleTouchStart=function(e){var t,n;t=e.touches[0].clientX,n=e.touches[0].clientY},handleTouchMove=function(e){var t,n,a,s,o,i;if(n&&o){if(a=e.touches[0].clientX,i=e.touches[0].clientY,t=n-a,s=o-i,Math.abs(t)>Math.abs(s)&&t>0)return document.querySelector("nav").classList.remove("active"),!1;n=null,o=null}},document.addEventListener("touchstart",handleTouchStart,!1),document.addEventListener("touchmove",handleTouchMove,!1),xDown=null,yDown=null;
//# sourceMappingURL=app.js.map