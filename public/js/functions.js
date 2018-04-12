onload = function() {
    $("form").validate();
    var input = document.getElementById("enter");
    input.addEventListener("keyup", function(event) {
        event.preventDefault();
        if (event.keyCode === 13) {
            document.getElementById("search").click();
        }
    });
}

function letDivCenter(edit){
    var top = ($(window).height() - $(edit).height())/2;
    var left = ($(window).width() - $(edit).width())/2;
    var scrollTop = $(document).scrollTop();
    var scrollLeft = $(document).scrollLeft();
    $(edit).css( { position : 'absolute', 'top' : top + scrollTop, left : left + scrollLeft } ).show();
}

function clickEnter() {
    var input = document.getElementById('enter');
    if (input.value == null || input.value == "") {
        input.placeholder = 'enter something'
    } else {
        if (Engine.value == "GG") {
            window.open('https://www.google.ca/search?&q=' + input.value)
        } else if (Engine.value == "BD") {
            window.open('https://www.baidu.com/s?wd=' + input.value)
        } else if (Engine.value == "BB") {
            window.open('https://search.bilibili.com/all?keyword=' + input.value)
        } else if (Engine.value == "Weibo") {
            window.open('http://s.weibo.com/weibo/' + input.value)
        } else if (Engine.value == "Youtube") {
            window.open('https://www.youtube.com/results?search_query=' + input.value)
        } else if (Engine.value == "Zhihu") {
            window.open('https://www.zhihu.com/search?type=content&q=' + input.value)
        }
    }
}

function editEnable(i) {
    var edit = document.getElementById('edit' + i)
    if(edit.style.display === "none") {
        edit.style.display = ""
    } else {
        edit.style.display = "none"
    }
}

function addType(){
    var edit = document.getElementById('addTypeForm')
    if(edit.style.display === "none") {
        edit.style.display = ""
    } else {
        edit.style.display = "none"
    }
}
