$().ready(function() {
    $('#submit').click(function(e) {
        e.preventDefault();
        let datas = $('form').serialize();

        console.log(datas);
    });
});