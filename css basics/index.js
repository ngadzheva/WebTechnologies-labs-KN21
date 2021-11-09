(function() {
    var section = document.querySelector('section:nth-of-type(2)');
    section.addEventListener('click', function(event) {
        var p = document.querySelectorAll('p:last-of-type');
        p.forEach(function(paragraph) {
            if (paragraph.style.display === 'none') {
                paragraph.style.display = 'block';
            } else {
                paragraph.style.display = 'none';
            }
        })
    });

    var lastSection = document.querySelector('section:last-of-type');
    lastSection.addEventListener('mouseover', function(event) {
        event.target.style.backgroundColor = 'orange';
    });
    lastSection.addEventListener('mouseout', function(event) {
        event.target.style.backgroundColor = 'white';
    })
})();