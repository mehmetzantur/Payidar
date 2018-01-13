    $(document).ready(function(){
        ClassicEditor
        .create( document.querySelector( '#detail' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );

        var msgCount = document.getElementById("waitingMsgCountHidden").value;
        if( msgCount != 0){
            document.getElementById("waitingMsgCountSidebar").innerHTML = "Mesajlar <span class='badge badge-warning'>"
                + msgCount + "</span>";
        }else{
            document.getElementById("waitingMsgCountSidebar").innerHTML = "Mesajlar";
        }



        var commentCount = document.getElementById("waitingCommentCountHidden").value;
        if( commentCount != 0){
            document.getElementById("waitingCommentCountSidebar").innerHTML = "Yorumlar <span class='badge badge-warning'>"
                + commentCount + "</span>";
        }else{
            document.getElementById("waitingCommentCountSidebar").innerHTML = "Yorumlar";
        }


});



