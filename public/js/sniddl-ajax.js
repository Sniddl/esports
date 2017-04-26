__SNIDDL_AJAX_INIT__ = function (elements){
  for (var i = 0; i < elements.length; i++) {
    el = elements[i];
    a = el.getAttribute.bind(el);
    el.__data__ = {
      action:  a('_action')  || a('data-action'),
      ajax:    a('_ajax')    || a('data-ajax'),
      error:   a('_error')   || a('data-error'),
      json:    a('_json')    || a('data-json'),
      method:  a('_method')  || a('data-method'),
      success: a('_success') || a('data-success'),
      target:  a('_target')  || a('target')
    }
    window.test = el
    r = el.removeAttribute.bind(el);
    r('_action');r('_ajax');r('_error');r('_json');r('_method');r('_success');r('_target');
    r('data-action');r('data-ajax');r('data-error');r('data-json');r('data-method');r('data-success');r('target')

    // el.setAttribute ("onclick", null)
    // new_el = el.cloneNode(true)
    // el.parentNode.replaceChild(new_el, el);
    // el = new_el
    el.onclick = function(e) {
      action  = this.__data__['action'];
      ajax    = this.__data__['ajax'];
      error   = this.__data__['error'];
      json    = JSON.parse(this.__data__['json']);
      method  = this.__data__['method'];
      success = this.__data__['success'];
      target  = this.__data__['target'];
      data    = window.__SNIDDL_AJAX__.data;
      headers = window.__SNIDDL_AJAX__.headers;
      console.log('clicked');
      //merge json + permanent json
      _json = json;
      json = {};
      for(var key in _json){
        json[key]=_json[key];
      }
      for(var key in data){
        json[key]=data[key];
      }

      e.preventDefault();

      if (ajax && ajax.toLowerCase() == "true" ) {

        var xhr = new XMLHttpRequest();
        xhr.open(method, action);
        xhr.setRequestHeader('Content-Type', 'application/json');
        if (headers){
          for(var key in headers){
            xhr.setRequestHeader(key, headers[key]);
          }
        }
        xhr.onload = function() {
            var data = xhr.responseText;
            if (xhr.status === 200) {
              if(success){
                eval(success);
              }else{
                console.log("%c\
                Ajax was successful.\n\
                Run code when successful by using the '_success' or 'data-success' attribute.\n\
                Likewise, use the '_error' or 'data-error' attribute to handle errors.\n\
                You can pass the 'data' variable to retrieve the results.",
                "color:#ccc; font-size: 14px; "
                );
                console.log('data:\n', data);
              }
            }
            else if(xhr.status === 400 || xhr.status === 500){
              if(error){
                eval(error);
              }else{
                document.write( data);
              }
            }
        }.bind(this);
        xhr.send(JSON.stringify(json));
      }
      else if (method) {
        method = method.toLowerCase();
        //create form
        form = document.createElement('form');
        document.body.appendChild(form);
        form.setAttribute("id", "globalForm");
        form.setAttribute("method", method);
        form.setAttribute("action", action);
        // create permanent fields for each key in data.
            // if (data) {
            //   if (typeof data == "object") {
            //     for (var key in data){
            //       input = document.createElement('input');
            //       form.appendChild(input);
            //       input.setAttribute("name", key);
            //       input.setAttribute("value", data[key]);
            //       input.setAttribute('type', 'hidden');
            //     }
            //   } else {
            //     throw "The data parameter must be an object.";
            //   }
            // }
        // create hidden input for each json key
        for (var key in json){
          input = document.createElement('input');
          form.appendChild(input);
          input.setAttribute("name", key);
          input.setAttribute("value", json[key]);
          input.setAttribute('type', 'hidden');
        }

        //subit form & redirect
        form.submit();
      }
      else if (action) {
        switch (target) {
          case "_blank": window.open(action); break;
          case "_self": window.self.location = action; break;
          case "_parent": window.parent.location = action; break;
          case "_top": window.top.location = action; break;
          case "blank": window.open(action); break;
          case "self": window.self.location = action; break;
          case "parent": window.parent.location = action; break;
          case "top": window.top.location = action; break;
          default:
            window.location = action;
        }
      }
    }
  }
}



elements = document.querySelectorAll('[data-action]') ;
short_hand_elements = document.querySelectorAll('[_action]')
setTimeout(__SNIDDL_AJAX_INIT__(elements),
           __SNIDDL_AJAX_INIT__(short_hand_elements),
            0);

// @prop data OBJECT -- data that is sent through forms.
// @prop headers OBJECT -- headers for the requests.
// window.__SNIDDL_AJAX__ = {};
