/**
 * Created by ARTEM on 15.06.14.
 */
var Tutsplus = {};

Tutsplus.createXHR = function(url, options) {
    var xhr = false;

    if (window.XMLHttpRequest) {
        // XHR Object
        xhr = new XMLHttpRequest();
    }

    if (xhr) {
        options = options || {};
        options.method = options.method || "GET";

        xhr.onreadystatechange = function() {
            if ((xhr.readyState == 4) && (xhr.status == 200 || xhr.status == 304)) {
                if (options.complete) {
                    options.complete.call(xhr, JSON.parse(xhr.responseText));
                }
            }
        };

        // open the request
       xhr.open(options.method, (template_directory + "/" + url), true);
//         xhr.open(options.method,  url, true);
        return xhr;
    } else {
        return false
    }
};

Tutsplus.ajax = function(url, options) {
    var xhr = Tutsplus.createXHR(url, options);

    if (xhr) {
        // send the request
        xhr.send(null);
    }
};