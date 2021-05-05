


document.addEventListener('DOMContentLoaded', function(){

    document.getElementById('xlsx-file').addEventListener('change', function(e) {
        var form = document.getElementById('xlsx-upload');
        var xhr = new XMLHttpRequest();
        var url = form.getAttribute('action');
        var progressBar = document.querySelector('.progress-bar');
        (xhr.upload || xhr).addEventListener('progress', function(e) {
            var done = e.position || e.loaded
            var total = e.totalSize || e.total;
            progressBar.setAttribute('style', 'width: ' + Math.round(done/total*100) + '%');
        });
        xhr.addEventListener('load', function(e) {
            window.location.reload();
        });

        xhr.open('post', url, true);
        var fd = new FormData(form);
        xhr.send(fd);
    });

});
