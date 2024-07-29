$(function() {
    $('#getBookInfo').click( function( e ) {
        e.preventDefault();
        const isbn = $("#isbn").val();
        const url = "https://api.openbd.jp/v1/get?isbn=" + isbn + "&pretty";

        $.getJSON( url, function( data ) {
            if( data[0] == null ) {
                alert("データが見つかりません");
            } else {
                if( data[0].summary.cover == "" ){
                    $("#thumbnail").html('<img src="' + noImagePicUrl + '" alt="gazou"/>');
                } else {
                    $("#thumbnail").html('<img src=\"' + data[0].summary.cover + '\" style=\"border:solid 1px #000000\" />');
                }
                document.getElementById('title').value = '';
                document.getElementById('publisher').value = '';
                document.getElementById('author').value = '';
                document.getElementById('book_url').value = '';
                $("#title").val(data[0].summary.title);
                $("#publisher").val(data[0].summary.publisher);
                $("#volume").val(data[0].summary.volume);
                $("#series").val(data[0].summary.series);
                $("#author").val(data[0].summary.author);
                $("#pubdate").val(data[0].summary.pubdate);
                //$("#book_url").val(data[0].summary.cover);
                $("#description").val(data[0].onix.CollateralDetail.TextContent[0].Text);
               
                if( data[0].summary.cover == null ){
                    $("#book_url").val("no");
                }else{
                    $("#book_url").val(data[0].summary.cover);
                }


                console.log("Cover value:", data[0].summary.cover);
            }
        });
    });
});