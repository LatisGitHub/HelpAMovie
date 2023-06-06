
    var hoverDivs = document.getElementsByClassName('hover-effect');
    for (var i = 0; i < hoverDivs.length; i++) {
        hoverDivs[i].addEventListener('mouseenter', function () {
            this.style.transform = 'scale(1.1)';
            this.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.5)';
        });

        hoverDivs[i].addEventListener('mouseleave', function () {
            this.style.transform = 'scale(1)';
            this.style.boxShadow = 'none';
        });
    }
