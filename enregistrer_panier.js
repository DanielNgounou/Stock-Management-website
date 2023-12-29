$(function(){
    $(".enregistrer").click(function(){
      var table = $("#Table");
      var tableValues = [];
      table.find("tr").each(function(){
        var rowValues = [];
        $(this).find("td").each(function(){
          rowValues.push($(this).text());
        });
        tableValues.push(rowValues);
      });
      // Convert the array to a JSON string
      var tableValuesJSON = JSON.stringify(tableValues);
      console.log(tableValuesJSON);
      $.ajax({
        url: "store_session.php",
        type: "POST",
        data: {tableValues: tableValuesJSON},
        dataType: "json" // Specify the data type of the response
      }).done(function(response){
        // Parse the response as a JSON object
        var responseJSON = response;
        alert(responseJSON.message);
      }).fail(function(jqXHR, textStatus, errorThrown){
        // Handle the error
        console.log(errorThrown);
      });
    });
  });