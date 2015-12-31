var Layout=function() {

    return {
        // `arraify` takes an array-like object and turns it into real Array
        // to make all the Array.prototype goodness available.
        'arrayify': function (a) {
            return [].slice.call(a);
        },

        // `byId` returns element with given `id` - you probably have guessed that ;)
        'ElbyId': function (id) {
            return document.getElementById(id);
        },

        // `$` returns first element for given CSS `selector` in the `context` of
        // the given element or whole document.
        '$': function (selector, context) {
            context = context || document;
            return context.querySelector(selector);
        },
        // `$$` return an array of elements for given CSS `selector` in the `context` of
        // the given element or whole document.
        '$$': function (selector, context) {
            context = context || document;
            return this.arrayify(context.querySelectorAll(selector));
        },
        // `triggerEvent` builds a custom DOM event with given `eventName` and `detail` data
        // and triggers it on element given as `el`.
        'triggerEvent': function (el, eventName, detail) {
            var event = document.createEvent("CustomEvent");
            event.initCustomEvent(eventName, true, true, detail);
            el.dispatchEvent(event);
        },
        'Ajax':function(url){
            var apiV=url;
            var x=new XMLHttpRequest();
            var onReadyStateChange=function(cb){
                if(x.readyState==4 && x.status==200){
                    //console.log(x.responseText);
                    var res=JSON.parse(x.responseText);
                    cb(res);
                }
            };

            _DELETE= function (url,cb) {

            };
            _GET= function (url,cb) {
                if(x.readyState==4||x.readyState==0){
                    x.open('GET',url);
                    x.onreadystatechange= function () {
                        onReadyStateChange(cb);
                    };
                    x.send(null);
                }

            };
            _PUT= function (url,payload,cb) {

            };
            _POST= function (url,payload,cb) {

            };
            _PATCH= function (url,payload,cb) {
                if(x.readyState==4||x.readyState==0){
                    x.open('PATCH',url);
                    x.setRequestHeader("Content-Type","application/json");
                    x.onreadystatechange= function () {
                        onReadyStateChange(cb)
                    };
                    x.send(JSON.stringify(payload));
                }

            };
            return {
                "get":_GET,
                "patch":_PATCH

            };
        }

    };

}();


