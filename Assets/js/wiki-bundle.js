function slugify(e,n){$("#"+n).val(e.value.toLowerCase().trim().replace(/ |_|\/|\\/g,"-").replace(/[^\w-]+/g,"").replace(/-+/g,"-").replace(/-$/g,"").replace(/^-/g,""))}function hashtagify(e,n){$("#"+n).val(e.value.toLowerCase().trim().replace(/ |_/g,"").replace(/[^\w-]+/g,"").replace(/-+/g,"").replace(/-$/g,"").replace(/^-/g,""))}function countdown(e){function n(){l(o),0===o&&(c(),i.stop()),o--}var t,i=this,o=e.seconds||10,l=e.onUpdateStatus||function(){},c=e.onCounterEnd||function(){};this.start=function(){clearInterval(t),t=0,o=e.seconds,t=setInterval(n,1e3)},this.stop=function(){clearInterval(t)}}function urldecode(e){return decodeURIComponent(e.replace(/\+/g," "))}function urlencode(e){return encodeURIComponent(e).replace(/%20/g,"+")}function toggle_wiki_header(e){div=document.getElementById(e+"__content"),link=document.getElementById(e+"__link"),"none"==div.style.display?(div.style.display="",link.innerHTML="[-]"):(div.style.display="none",link.innerHTML="[+]")}function toggle_wiki_headers(e){document.getElementsByTagName("div");$("div[id*='__content']").each(function(){e?this.style.display="none":this.style.display="block"}),$("a[id*='__link']").each(function(){e?this.innerHTML="[+]":this.innerHTML="[-]"})}function resize_embed_url(e){var n=document.documentElement.clientHeight;n-=document.getElementById(e).offsetTop,n-=110,n<600&&(n=800),document.getElementById(e).style.height=n+"px"}