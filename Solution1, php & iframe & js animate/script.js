(function () {
  var
  contactform = document.getElementById('contactform'),
  reciveddata = document.getElementById('reciveddata'),
  ifrm = document.getElementById('ifrm'),
  openform = function () {
    setTimeout(function(){
      reciveddata.className = 'open';
    }, 50); // delay for smooth
  },
  frameload = function(){
    openform();
  },
  formsubmit = function(){
    ifrm.onload=frameload;
    
  },
  init = function(){
    contactform.onsubmit = formsubmit;
    reciveddata.className = 'close'; // when js worked perfect !
  };
  init();
})();