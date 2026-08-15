$(document).ready(function () {

    //toggle to view trasnactions
    $("#view-transaction").on("click", (e) => {
        let currentText = $("#button-text").text().trim();
        
        if(currentText === "Hide Recent Transactions"){
            $("#button-text").text("View Recent Transactions");
        } else {
            // ...exactly matches the text here!
            $("#button-text").text("Hide Recent Transactions");
        }

        $("#arrow").toggleClass("bi-arrow-down bi-arrow-up");
        $("#transactions-holder").fadeToggle(200);
    

    });

        let total = parseFloat($("#total_num").data("value"));
        console.log(total);
        //styling for the total balance
        if (total >= 0) {
            $("#total_num").removeClass("danger");
            $("#total_num").addClass("success");
        } else {
            $("#total_num").removeClass("success");
            $("#total_num").addClass("danger");
        };
    //adding a transaction form validation 

    const toast = $("#error-toast");
    const toastInstance = new bootstrap.Toast(toast);

    $("#form-add").on("submit", (e) =>{

        let desc = $("input[name='desc']").val().trim();
        let category = $("select[name='category']").val(); 
        let amount = $("input[name='amount']").val().trim();
        let date = $("input[name='date']").val().trim();
        let type = $("select[name='type']").val();
         
        if (desc === "" || amount === "" || date === "" || category === "" || type === "") {
            e.preventDefault();
            toastInstance.show();
            
        }


    });

  
    
});


   


