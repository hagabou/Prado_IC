jQuery(document).ready(function($) {
    $(".main-content img").addClass('pure-img');
    $("footer img").addClass('pure-img');
    
    /*Main menu : afficher le texte de l'attribut title sour les 3 premiers liens*/
//    linkTxt = $("#main-menu .pure-menu-item a").attr("title");
//    if(linkTxt){
//        $("#main-menu .pure-menu-item a").append(<span>linkTxt</span>);
//    }
    
//    $("#main-menu .pure-menu-item a").each(function(){
//        var linkTxt = $(this).attr("title");
//        linkTxtwrapped = linkTxt.wrap( "<span class='descr'></span>" );
//        $(this).append("<br>", linkTxtwrapped);
//    });
    
//    $("#main-menu .pure-menu-item a").each(function(){
//        linkTxt = $(this).attr("title");
//        $(this).after(linkTxt.wrap( "<span class='desc'></span>" ) );
//    });
    
    
//    $("#main-menu .pure-menu-item a").after($(this).attr("title").wrap( "<span class='desc'></span>" ) );
    
    $("#main-menu ul > .pure-menu-item.pure-menu-has-children.pure-menu-allow-hover a").after(function() {
        return "<span class='desc'>" +$( this ).attr("title") + "</span>";
      });
    

    
    //FLEXSLIDER
    $('#homeslider.flexslider').flexslider({
        animation: "slide"	
    });
        
});

// TOOGLE MENU PURE CSS 
//https://purecss.io/layouts/tucked-menu-vertical/
(function (window, document) {
var menu = document.getElementById('main-header'),
  rollback,
  WINDOW_CHANGE_EVENT = ('onorientationchange' in window) ? 'orientationchange':'resize';

function toggleHorizontal() {
  menu.classList.remove('closing');
  [].forEach.call(
      document.getElementById('main-header').querySelectorAll('.custom-can-transform'),
      function(el){
          el.classList.toggle('pure-menu-horizontal');
      }
  );
};

function toggleMenu() {
  // set timeout so that the panel has a chance to roll up
  // before the menu switches states
  if (menu.classList.contains('open')) {
      menu.classList.add('closing');
      rollBack = setTimeout(toggleHorizontal, 500);
  }
  else {
      if (menu.classList.contains('closing')) {
          clearTimeout(rollBack);
      } else {
          toggleHorizontal();
      }
  }
  menu.classList.toggle('open');
  document.getElementById('toggle').classList.toggle('x');
};

function closeMenu() {
  if (menu.classList.contains('open')) {
      toggleMenu();
  }
}

document.getElementById('toggle').addEventListener('click', function (e) {
  toggleMenu();
  e.preventDefault();
});

window.addEventListener(WINDOW_CHANGE_EVENT, closeMenu);
})(this, this.document);
//END TOGGLE MENU 