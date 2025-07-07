window.addEventListener('load', function() {
    const scenery = document.querySelector('.hrefbox')
    const column = document.querySelector('.column')
    var falg = true
    scenery.addEventListener('click', function() {
        if (falg) {
            column.classList.add('active')
            falg = false
        } else {

            column.classList.remove('active')
            falg = true
        }


    })

    const boxLeft = document.querySelectorAll('.boxLeft')
    const boxLeft2 = document.querySelectorAll('.boxLeft2')

    boxLeft.forEach(function(item, index) {
        item.addEventListener('mousemove', function() {
            if (falg) item.classList.add('active')

        })
    })
    boxLeft.forEach(function(item, index) {
        item.addEventListener('mouseout', function() {
            if (falg) item.classList.remove('active')

        })

    })
    boxLeft2.forEach(function(item, index) {
        item.addEventListener('mousemove', function() {
            if (falg) item.classList.add('active')

        })
    })
    boxLeft2.forEach(function(item, index) {
            item.addEventListener('mouseout', function() {
                if (falg) item.classList.remove('active')

            })

        })
        // 返回
    const scrollBox = document.querySelector('.scrollBoxTop')
    const nav = document.querySelector('nav')
    const audio = document.querySelector('.audiomp3')

    window.onscroll = function() {
        var height = parseInt(document.documentElement.scrollTop || document.body.scrollTop)
        if (height >= 1400) {
            scrollBox.classList.add('active')

        } else if (height < 500) {
            scrollBox.classList.remove('active')
        }
        if (height >= 1400) {
            audio.style.display = 'block'
        } else if (height < 800) {
            audio.style.display = 'none'
        }

    }
    scrollBox.onclick = function() {
        window.scrollTo({
            left: 0,
            top: 0,
            behavior: 'smooth'
        })
    }




})