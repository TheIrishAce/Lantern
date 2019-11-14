function searchManagement(){

    var Character =$("#searchCharacter").val();
    var Event =$("#searchEvent").val();
    var Location =$("#searchLocation").val();

    //Search Character variables
    var searchCname =$("#characterName").val();
    var searchCage =$("#characterAge").val();
    var searchCdob =$("#characterDob").val();
    var searchCgender =$("#characterGender").val();
    var searchCrace =$("#characterRace").val();
    var searchCappearance =$("#characterAppearance").val();
    var searchCspecies =$("#characterSpecies").val();

    //Search Location variables
    var searchLname =$("#locationName").val();
    var searchLtype =$("#locationType").val();
    var searchLdescription =$("#locationDescription").val();

    //Search Event variables
    var searchEname =$("#eventName").val();
    var searchEdate =$("#eventDate").val();
    var searchElinkcharacter =$("#eventLinkCharacter").val();
    var searchEdescription =$("#eventDescription").val();

    if(Character!=""){

    $.ajax({

        url:'lib/php/searchCharacter.php',
        type: 'POST',
        async: false,
        cache: false,
        data: {
            SearchCharacterButton: 1,
            searchCharacter:Character
        },
        error: function (response) {
          alert("Local error callback.");
        },
        success: function(response){
          console.log(response);
          try {
            var obj = JSON.parse(response);
            if (obj.exit =="success")
            {
              console.log(Character);
              console.log(response);
              alert("Character Found");
              //window.location.replace("https://lanterngrape.herokuapp.com/management.html");
              console.log(obj);
              $("#characterName").val('');
              $("#characterName").val(obj.returnedCharacter.CharacterName);
            }
          }

          catch(err) {
            alert("No character with the name " + Character + " found.");
          }
        }
    });
    /*
    }

    else if(Event !=""){

        url:'lib/php/searchEvent.php',
        type: 'POST',
        async: false;
        data: {
            save:2,
            eventType:Event

        },

        success:function(response){
            console.log(response);
            if(response = "success"){

                alert("Event Found");
                window.location.replace("https://laterngrape.herokuapp.com/management.html");

            }

            else{
             alert("Error, Event Could not be found");
            }
        }

    }
    */
    return false;

    }

}
