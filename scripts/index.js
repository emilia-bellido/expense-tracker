
$(document).ready(function () {



    //toggle to view trasnactions
    $("#view-transaction").on("click", (e) => {
       
        $("#transactions-holder").fadeToggle(200);
    

    });


    let total = $("#total_num").text().trim();
    console.log(total);


    //styling for the total balance
    if(total >= 0 ){
        $("#total_num").removeClass("danger");
        $("#total_num").addClass("success");
        console.log("no debt")
    }else{
        $("#total_num").removeClass("success");
        $("#total_num").addClass("danger");
        console.log("you broke");
    }

    //adding a transaction form validation 

    const toast = $("#error-toast");

    $("#form-add").on("submit", (e) =>{

        let desc = $("input[name='desc']").val().trim();
        let category = $("select[name='category']").val(); 
        let amount = $("input[name='amount']").val().trim();
        let date = $("input[name='date']").val().trim();
        let type = $("select[name='type']").val();
         
        if (desc === "" || amount === "" || date === "" || category === "" || type === "") {
            e.preventDefault();
            toast.show();
            
        }


    });

  
    
});


   


