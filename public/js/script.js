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
            return arrayify(context.querySelectorAll(selector));
        },
        // `triggerEvent` builds a custom DOM event with given `eventName` and `detail` data
        // and triggers it on element given as `el`.
        'triggerEvent': function (el, eventName, detail) {
            var event = document.createEvent("CustomEvent");
            event.initCustomEvent(eventName, true, true, detail);
            el.dispatchEvent(event);
        }
    }

}();


