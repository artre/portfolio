// JavaScript file

var myImage = document.getElementById("image-rotate");

var imageArray = ["/images/Paintings/blind_feelings.jpg",
    "/images/Paintings/hedonism1.jpg",
    "/images/Paintings/hedonism2.jpg",
    "/images/Paintings/hedonism3.jpg"
];

var imageIndex = 0;

function changeImage() {
    myImage.setAttribute("src", (template_directory + imageArray[imageIndex]));
    imageIndex++;
    if (imageIndex >= imageArray.length) {
        imageIndex = 0;
    }
}

var intervalHandleMyImage = setInterval(changeImage, 3000);

myImage.onclick = function() {
    clearInterval(intervalHandleMyImage);
}



/* Timer
================================================================ */

var secondsRemaining;
var intervalHandleTimer;

function resetPage() {
    document.getElementById("inputArea").style.display = "block";
}

function tick() {
    // grab the h1
    var timeDisplay = document.getElementById("time");

    // turn seconds into mm:ss
    var min = Math.floor(secondsRemaining / 60);
    var sec = secondsRemaining - (min * 60);

    // add a leading zero (as a string value) if seconds less than 10
    if (sec < 10) {
        sec = "0" + sec;
    }
    // concatenate with colon
    var message = min + ":" + sec;
    // now change the display
    timeDisplay.innerHTML = message;

    // stop if down to zero
    if (secondsRemaining === 0) {
        alert("Done!");
        clearInterval(intervalHandleTimer);
        resetPage();
    }
    // subtract from seconds remaining
    secondsRemaining--;
}

function startCountdown() {
    // get contents of the "minutes" text box
    var minutes = document.getElementById("minutes").value;
    // check if not a number
    if (isNaN(minutes)) {
        alert("Please enter a number!");
        return;
    }
    // how many seconds?
    secondsRemaining = minutes * 60;
    // every second, call the "tick" function
    intervalHandleTimer = setInterval(tick, 1000);
    // hide the form
    //document.getElementById("inputArea").style.display = "none";
}

// as soon as the page is loaded...
window.onload = function() {
    // create input text box and give it an id of "minutes"
    var inputMinutes = document.createElement("input");
    inputMinutes.setAttribute("id", "minutes");
    inputMinutes.setAttribute("type", "text");
    // create a button
    var startButton = document.createElement("input");
    startButton.setAttribute("type", "button");
    startButton.setAttribute("value", "Start Countdown");
    startButton.onclick = function() {
        startCountdown();
    };
    // add to the DOM, to the div called "inputArea"
    document.getElementById("inputArea").appendChild(inputMinutes);
    document.getElementById("inputArea").appendChild(startButton);


    var pauseButton = document.getElementById("timer-pause");
    var playButton = document.getElementById("timer-play");

    pauseButton.onclick = function() {
        clearInterval(intervalHandleTimer);
    };

    playButton.onclick = function() {
        intervalHandleTimer = setInterval(tick, 1000);
    };
    // $("#timer-pause").onclick(function() {
    //     clearInterval(intervalHandleTimer);
    // });
    // $("#timer-play").onclick(function() {
    //     intervalHandleTimer = setInterval(tick, 1000);
    // });
};


/* AJAX Processing HTML Responses
=========================================================================== */

// Self invoking anonymous function, good for creating variables that will not interfere with anything that is outside of it
(function() {

    var link = document.getElementById("ajaxlink");

    link.onclick = function() {
        // XHR Object
        var xhr = new XMLHttpRequest();

        // handle the "onreadystatechange" event
        // xhr.readyState property values
        // 0 = uninitialized
        // 1 = Loading
        // 2 = Loaded
        // 3 = Interactive
        // 4 = Complete

        xhr.onreadystatechange = function() {
            if ((xhr.readyState == 4) && (xhr.status == 200 || xhr.status == 304))  {
                var div = document.getElementById("ajaxhtml");
                div.innerHTML = xhr.responseText;
            }
        };

        // open the request
        xhr.open("GET", (template_directory + "/files/ajax.html") , true);

        // send the request

        xhr.send(null);

        return false; //return false is disable a default behavior of <a> tag so it will not send us to some link
    };


})();

/* AJAX Processing XML Responses
 =========================================================================== */
// Self invoking anonymous function, good for creating variables that will not interfere with anything that is outside of it
(function() {

    var link = document.getElementById("ajax-xml-link");

    link.onclick = function() {
        // XHR Object
        var xhr = new XMLHttpRequest();

        // handle the "onreadystatechange" event
        // xhr.readyState property values
        // 0 = uninitialized
        // 1 = Loading
        // 2 = Loaded
        // 3 = Interactive
        // 4 = Complete

        xhr.onreadystatechange = function() {
            if ((xhr.readyState == 4) && (xhr.status == 200 || xhr.status == 304)) {
                var xmldiv = document.getElementById("ajaxxml");
                var heading = xhr.responseXML.getElementsByTagName("heading")[0].firstChild.nodeValue;
                var h2 = document.createElement("h2");
                var h2Text = document.createTextNode(heading);
                h2.appendChild(h2Text);
                xmldiv.appendChild(h2);

                var list = document.createElement("ul");
                var items = xhr.responseXML.getElementsByTagName("items")[0];
                items = items.getElementsByTagName("item");

                for (var i = 0; i < items.length; i++) {
                    var item = items[i].firstChild.nodeValue;
                    var li = document.createElement("li");
                    var liText = document.createTextNode(item);
                    li.appendChild(liText);
                    list.appendChild(li);
                }

                xmldiv.appendChild(h2);
                xmldiv.appendChild(list);

                xmldiv.removeChild(link);
            }
        };

        // open the request
        xhr.open("GET", (template_directory +"/files/ajax.xml"), true);

        // send the request

        xhr.send(null);

        return false; //return false is disable a default behavior of <a> tag so it will not send us to some link
    };


})();

/* AJAX Processing JSON Responses
 =========================================================================== */
// Self invoking anonymous function, good for creating variables that will not interfere with anything that is outside of it
(function() {

    var link = document.getElementById("ajax-json-link");

    link.onclick = function() {
        // XHR Object
        var xhr = new XMLHttpRequest();

        // handle the "onreadystatechange" event
        // xhr.readyState property values
        // 0 = uninitialized
        // 1 = Loading
        // 2 = Loaded
        // 3 = Interactive
        // 4 = Complete

        xhr.onreadystatechange = function() {
            if ((xhr.readyState == 4) && (xhr.status == 200 || xhr.status == 304)) {
                var jsondiv = document.getElementById("ajaxjson");

                var json = JSON.parse(xhr.responseText);




                var heading = json.heading;
                var h2 = document.createElement("h2");
                var h2Text = document.createTextNode(heading);
                h2.appendChild(h2Text);
                jsondiv.appendChild(h2);

                var list = document.createElement("ul");
                var items = json.items;

                for (var key in items) {
                    var item = items[key];
                    var li = document.createElement("li");
                    var liText = document.createTextNode(item);
                    li.appendChild(liText);
                    list.appendChild(li);
                }

                jsondiv.appendChild(h2);
                jsondiv.appendChild(list);

                jsondiv.removeChild(link);

            }
        };

        // open the request
        xhr.open("GET", (template_directory +"/files/ajax.json"), true);

        // send the request

        xhr.send(null);

        return false; //return false is disable a default behavior of <a> tag so it will not send us to some link
    };


})();

///* AJAX Making Our library Easier to Use
// =========================================================================== */
//// Self invoking anonymous function, good for creating variables that will not interfere with anything that is outside of it
//(function() {
//
//    var link = document.getElementById("ajax-lib-link");
//
//    link.onclick = function() {
//
//        ajax('files/ajax.json', {
//            method: "GET",
//            complete: function(response){
//                var jsondiv = document.getElementById("ajaxlib");
//
//                var json = response;
//
//                var heading = json.heading;
//                var h2 = document.createElement("h2");
//                var h2Text = document.createTextNode(heading);
//                h2.appendChild(h2Text);
//                jsondiv.appendChild(h2);
//
//                var list = document.createElement("ul");
//                var items = json.items;
//
//                for (var key in items) {
//                    var item = items[key];
//                    var li = document.createElement("li");
//                    var liText = document.createTextNode(item);
//                    li.appendChild(liText);
//                    list.appendChild(li);
//                }
//
//                jsondiv.appendChild(h2);
//                jsondiv.appendChild(list);
//
//                jsondiv.removeChild(link);
//            }
//        })
//        return false; //return false is disable a default behavior of <a> tag so it will not send us to some link
//    };
//
//
//})();



/* AJAX Making Our library Easier to Use
 =========================================================================== */
// Self invoking anonymous function, good for creating variables that will not interfere with anything that is outside of it
(function() {

    var link = document.getElementById("ajax-lib-link");

    link.onclick = function() {

        Tutsplus.ajax((template_directory + '/files/ajax.json'), {
            method: "GET",
            complete: function(response) {

                var jsondiv = document.getElementById("ajaxlib");

                var json = response;


                var heading = json.heading;
                var h2 = document.createElement("h2");
                var h2Text = document.createTextNode(heading);
                h2.appendChild(h2Text);
                jsondiv.appendChild(h2);

                var list = document.createElement("ul");
                var items = json.items;

                for (var key in items) {
                    var item = items[key];
                    var li = document.createElement("li");
                    var liText = document.createTextNode(item);
                    li.appendChild(liText);
                    list.appendChild(li);
                }

                jsondiv.appendChild(h2);
                jsondiv.appendChild(list);

                jsondiv.removeChild(link);
            }
        });

        return false; //return false is disable a default behavior of <a> tag so it will not send us to some link
    };

    var form = document.getElementById('form-ajax');

    form.onsubmit = function() {
        var emailVal = document.getElementById("email-ajax").value;
        var url = form.getAttribute("action");

        Tutsplus.ajax(url, {
            method: "POST",
            data: {
                email: emailVal
            },
            complete: function(response) {
                var workingContainer = document.getElementsByClassName("bottomGreySandbox")[0];
                var divAjax = document.createElement("div");
                divAjax.setAttribute("id", "div1");
                workingContainer.appendChild(divAjax);

                var divNext = document.getElementById("div1");
                divNext.innerHTML = response;

            }
        });

        return false;
    };


})();