$(function(){
    $('#print').click(function(){
        // Adjust the size of the QR code
        $('.qrcode').css('width', '205px'); // Adjust '150px' to your desired width for A6

        var _h = $('head').clone();
        var _p = $('#outprint').clone();
        var _el = $('<div>');
        _h.find("title").text("Generated QR Codes - Print View");
        _el.append(_h);
        _el.append(_p);
        var nw = window.open('','_blank','width=900,height=700,top=100,left=300');
        nw.document.write(_el.html());
        nw.document.close();
        setTimeout(() => {
            nw.print();
            setTimeout(() => {
                nw.close();
            }, 500);
        }, 750);
    });
});