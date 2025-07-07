window.addEventListener('load', function() {
    var banner = document.querySelector('.banner')
    var imgs = document.querySelectorAll('.bannerbox>li')
    var points = document.querySelectorAll('.bannerbox2>li')
    var index = 0

    function changeOne(type) {
        imgs[index].className = ''
        points[index].className = ''
        if (type === true) {
            index++
        } else if (type === false) {
            index--
        } else {
            index = type
        }
        if (index >= imgs.length) {
            index = 0
        }
        if (index < 0) {
            index = imgs.length - 1
        }
        imgs[index].className = 'active'
        points[index].className = 'active'
    }
    banner.addEventListener('click', function(e) {
        e = e || window.event
        if (e.target.className === 'LeftBtn') {
            changeOne(false)
        }
        if (e.target.className === 'RightBtn') {
            changeOne(true)
        }
        if (e.target.dataset.name === 'point') {
            var i = e.target.dataset.i - 0
            changeOne(i)
        }
    })

    var time = setInterval(function() {
        changeOne(true)
    }, 5000)
    banner.onmouseover = function() {
        clearInterval(time)
    }
    banner.onmouseout = function() {
        time = setInterval(function() {
            changeOne(true)
        }, 5000)
    }

})