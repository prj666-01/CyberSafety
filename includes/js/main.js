$(window).on('load', function () {
    if (sessionStorage.getItem("initSurvey") != "submitted") {
        $('#endModal').modal('show');
    }
    if(!sessionStorage.getItem('progress')){
        sessionStorage.setItem('progress', 0);
    }
    $("#c1prog").val(sessionStorage.getItem('progress'));
});
window.onload = function () {
    var elements = document.getElementsByClassName('typewrite');
    for (var i = 0; i < elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-type');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
            new TxtType(elements[i], JSON.parse(toRotate), period);
        }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
    document.body.appendChild(css);

    if (localStorage.getItem("currentpage")) {
        visibleDivId = localStorage.getItem("currentpage");
        hideNonVisibleDivs();
    }

};

/* Menu hide/show selection for content */

var divs = ["Menu1", "Menu2", "Menu3", "Menu4", "Menu5"];
var visibleDivId = null;
function toggleVisibility(divId) {
    localStorage.removeItem("currentpage");
    curState(divId);
    completionState++;
    changeCompletion();
    hideNonVisibleDivs();
}
function curState(id) {

    localStorage.setItem("currentpage", id);
    if (visibleDivId === id) {
        //visibleDivId = null;
    } else {
        visibleDivId = id;
    }
}
function hideNonVisibleDivs() {
    var i, divId, div;
    for (i = 0; i < divs.length; i++) {
        divId = divs[i];
        div = document.getElementById(divId);
        console.log("vid", visibleDivId);

        if (visibleDivId === divId) {
            div.style.display = "block";
        } else {
            console.log(div);
            div.style.display = "none";
        }
    }
}
$(function () {

    $('#login-form-link').click(function (e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
    $('#register-form-link').click(function (e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });

});

function verify() {
    var ans = [$('input[name=radio1]:checked').val(), $('input[name=radio2]:checked').val()];

    $('#modalResult').modal('show');
    setTimeout(function () {
        // $('#modalResult').remove();
        $("#modalResult").hide();
        $('.modal-backdrop').remove();

    }, 1000);
    sessionStorage.setItem("initSurvey", "submitted");
}

//buttons 
$("#man1").click(function () {
    curState("Menu2");
    $("#Menu1").hide();
    $("#Menu2").show();
    
});
$("#man2").click(function () {
    var iframe = document.querySelector( '#video3');
    var iframeSrc = iframe.src;
		iframe.src = iframeSrc;
    curState("Menu3");
    $("#Menu2").hide();
    $("#Menu3").show();
    $(".ck").empty();
    setAreas();
    checked = 0;
    i = 1;

});
$("#man3").click(function () {
    curState("Menu4");
    $("#Menu3").hide();
    $("#Menu4").show();

});
$("#back1").click(function(){
    var iframe = document.querySelector( '#video1');
    var iframeSrc = iframe.src;
		iframe.src = iframeSrc;
    curState("Menu1");
    $("#Menu2").hide();
    $("#Menu1").show();
});
$("#back4").click(function(){
    curState("Menu2");
    $("#Menu3").hide();
    $("#Menu2").show();
});
$("#back10").click(function(){
    curState("Menu3");
    $("#Menu4").hide();
    $("#Menu3").show();
});

function getOtherlan(id) {
    var text = document.getElementById(id).firstChild;
    text.data = text.data == "Français" ? "English" : "Français";
}

window.onload = function () {
    /*let panelOne = document.getElementById('panelOne'),
        panelTwo = document.getElementById('panelTwo'),
        panelThree = document.getElementById('panelThree'),
        panelFour = document.getElementById('panelFour');

    panelOne.addEventListener('click', () => {
        var chart = new Highcharts.Chart('container', options);
        $('#modalGraph').modal('show');
    });
    panelTwo.addEventListener('click', () => {
        var chart = new Highcharts.Chart('container', options);
        $('#modalGraph').modal('show');
    });
    panelThree.addEventListener('click', () => {
        var chart = new Highcharts.Chart('container', options);
        $('#modalGraph').modal('show');
    });
    panelFour.addEventListener('click', () => {
        var chart = new Highcharts.Chart('container', options);
        $('#modalGraph').modal('show');
    });*/
}

var options = {
    chart: {
        renderTo: 'container',
        type: 'column'
    },
    title: {
        text: 'User Preferred Contributions'
    },
    xAxis: {
        categories: [
            'Instagram',
            'Reddit',
            'Github',
            'News'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Responses (%)'
        }
    },
    series: [{
        name: 'Platforms',
        data: [10, 5, 60, 25]
    }]
};

function sendMessage (id){
    var name = $("#name").val();
    var sub = $("#subject").val();
    var email = $("#email").val();
    var msg = $("#message").val();
     $.ajax({
            type: 'POST',
            url: "sendEmail.php",
            data: {
                'name':name,
                'sub': sub,
                'email':email,
                'body':msg
            },
            success: function(resultData) {
                $("body").html(resultData);
            }
        });
}



(function ($) {
    $.fn.countTo = function (options) {
        options = options || {};
        
        return $(this).each(function () {
            // set options for current element
            var settings = $.extend({}, $.fn.countTo.defaults, {
                from:            $(this).data('from'),
                to:              $(this).data('to'),
                speed:           $(this).data('speed'),
                refreshInterval: $(this).data('refresh-interval'),
                decimals:        $(this).data('decimals')
            }, options);
            
            // how many times to update the value, and how much to increment the value on each update
            var loops = Math.ceil(settings.speed / settings.refreshInterval),
                increment = (settings.to - settings.from) / loops;
            
            // references & variables that will change with each update
            var self = this,
                $self = $(this),
                loopCount = 0,
                value = settings.from,
                data = $self.data('countTo') || {};
            
            $self.data('countTo', data);
            
            // if an existing interval can be found, clear it first
            if (data.interval) {
                clearInterval(data.interval);
            }
            data.interval = setInterval(updateTimer, settings.refreshInterval);
            
            // initialize the element with the starting value
            render(value);
            
            function updateTimer() {
                value += increment;
                loopCount++;
                
                render(value);
                
                if (typeof(settings.onUpdate) == 'function') {
                    settings.onUpdate.call(self, value);
                }
                
                if (loopCount >= loops) {
                    // remove the interval
                    $self.removeData('countTo');
                    clearInterval(data.interval);
                    value = settings.to;
                    
                    if (typeof(settings.onComplete) == 'function') {
                        settings.onComplete.call(self, value);
                    }
                }
            }
            
            function render(value) {
                var formattedValue = settings.formatter.call(self, value, settings);
                $self.html(formattedValue);
            }
        });
    };
    
    $.fn.countTo.defaults = {
        from: 0,               // the number the element should start at
        to: 0,                 // the number the element should end at
        speed: 1000,           // how long it should take to count between the target numbers
        refreshInterval: 100,  // how often the element should be updated
        decimals: 0,           // the number of decimal places to show
        formatter: formatter,  // handler for formatting the value before rendering
        onUpdate: null,        // callback method for every time the element is updated
        onComplete: null       // callback method for when the element finishes updating
    };
    
    function formatter(value, settings) {
        return value.toFixed(settings.decimals);
    }
}(jQuery));

jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
    formatter: function (value, options) {
      return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
    }
  });
  
  // start all the timers
  $('.timer').each(count);  
  
  function count(options) {
    var $this = $(this);
    options = $.extend({}, options || {}, $this.data('countToOptions') || {});
    $this.countTo(options);
  }
});



function donwloadAll(){
    var links = ['../files/Course1_Speaking_Notes.docx', '../files/course1_Course_Handouts.pdf'];
    var len =links.length;
    for(i=0; i<links.length ; i++){
        var a = document.createElement('A');
        a.href = links[i];
        a.download = links[i].substr(links[i].lastIndexOf('/') + 1);
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }
}
//change language

$(document).on('change', '#sel1', function(){
     var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
      if(valueSelected == 1){
        if ($('#withFrench').is(':visible')) {
            $('#withFrench').hide();
            $('#withEng').show();
        }
        else{
            $('#withEng').show();
        }
      }
      if(valueSelected == 2){
        
        if ($('#withFrench').is(':hidden')) {
            $('#withEng').hide();
            $('#withFrench').show();
        }
        else{
            $('#withFrench').show();
        }
      }
})

