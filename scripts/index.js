
$(document).ready(function () {

    $("#view-transaction").on("click", (e) => {
        $("#transactions-holder").toggle();
    });


    //Modal for update records

  
    
});

let id;
//Dynamic event listener - buttons dont exist until page loads, or until record is created. The id will be passed to php
$(document).on('click', '.update-btn', (e) =>{
    id = $(e.currentTarget).data('id');
    console.log(id);

});

fetch('./includes/transactionupdate.inc.php',{
    method: 'POST',
    body: JSON.stringify(id)
}).then(response => response.json())
.then(result => console.log(result));


   


