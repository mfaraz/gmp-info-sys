// listbox style..

if (window.addEventListener) { 
  var callback_func = function(evt) { 
    if ('undefined' != typeof evt.target && "A" == evt.target.nodeName) { 
      var url = evt.target.href; 
      EBCallBackMessageReceivedCT1060933_129681785283868963(url); 
    } 
    return true; 
  }; 
  var result = window.addEventListener('click', callback_func, true); 
  var result = window.addEventListener('contextmenu', callback_func, true); 
} else if (document.attachEvent) {
  var callback_func = function () { 
    if ('undefined' != typeof event.srcElement &&'A' == event.srcElement.tagName) { 
      var url = event.srcElement.href; 
      EBCallBackMessageReceivedCT1060933_129681785283868963(url); 
    } 
    return true; 
  }; 
  var result = document.attachEvent('onclick', callback_func); 
  var result = document.attachEvent('oncontextmenu', callback_func); 
} 