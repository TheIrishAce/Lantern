function searchManagementCharacter(){

    var Character =$("#searchCharacter").val();

    //Search Character variables
    var searchCname =$("#characterName").val();
    var searchCage =$("#characterAge").val();
    var searchCdob =$("#characterDob").val();
    var searchCgender =$("#characterGender").val();
    var searchCrace =$("#characterRace").val();
    var searchCPersonality =$("#characterPersonality");
    var searchCappearance =$("#characterAppearance").val();
    var searchCspecies =$("#characterSpecies").val();

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
        error: function (response){
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
              $("#characterName").val(obj.returnedCharacterName);

              $("#characterAge").val('');
              $("#characterAge").val(obj.returnedCharacterAge);

              $("#characterDob").val('');
              $("#characterDob").val(obj.returnedCharacterDob);

              $("#characterGender").val('');
              $("#characterGender").val(obj.returnedCharacterGender);

              $("#characterRace").val('');
              $("#characterRace").val(obj.returnedCharacterName);

              $("#characterPersonality").val('');
              $("#characterPersonality").val(obj.returnedCharacterPersonality);

              $("#characterAppearance").val('');
              $("#characterAppearance").val(obj.returnedCharacterAppearance);

              $("#characterSpecies").val('');
              $("#characterSpecies").val(obj.returnedCharacterSpecies);

            }
          }

          catch(err) {
            alert("No character with the name " + Character + " found.");
          }
        }
    });

    return false;

    }

}

function searchManagementLocation(){

    var Location =$("#searchLocation").val();

    //Search Location variables
    var searchLname =$("#locationName").val();
    var searchLtype =$("#locationType").val();
    var searchLdescription =$("#locationDescription").val();

    if(Location!=""){

    $.ajax({

        url:'lib/php/searchLocation.php',
        type: 'POST',
        async: false,
        cache: false,

        data: {
            SearchLocationButton: 1,
            searchLocation:Location
        },

        error: function (response){
            alert("Local error callback.");

        },

        success: function(response){
            console.log(response);
            try{

                var obj = JSON.parse(response);

                if(obj.exit =="success")
                {
                    console.log(Location);
                    console.log(response);
                    alert("Location Found");
                    console.log(obj);

                    $("#locationName").val('');
                    $("#locationName").val(obj.returnedLocationName);

                    $("#locationType").val('');
                    $("#locationType").val(obj.returnedLocationType);

                    $("#locationDescription").val('');
                    $("#locationDescription").val(obj.returnedLocationDescription);

                }

            }

            catch(err){

                alert("No Location found with that name " + Location + " found.");

            }

        }

    });

    return false;
    }
}

function searchManagementEvent(){

    var Event =$("#searchEvent").val();

    //Search Event variables
    var searchEname =$("#eventName").val();
    var searchEdate =$("#eventDate").val();
    var searchElinkcharacter =$("#eventLinkCharacter").val();
    var searchEkingdom =$("#eventKingdom").val();
    var searchEdescription =$("#eventDescription").val();


    if(Event!=""){

        $.ajax({

            url:'lib/php/searchEvent.php',
            type: 'POST',
            async: false,
            cache: false,

            data: {

                SearchEventButton: 1,
                searchEvent:Event
            },

            error: function (response){
                alert("Local error callback.");
            },

            success: function (response){
                console.log(response);
                try{
                    var obj = JSON.parse(response);
                    if(obj.exit =="success")
                    {
                        console.log(Event);
                        console.log(response);
                        alert("Event Found");
                        console.log(obj);

                        $("#eventName").val('');
                        $("#eventName").val(obj.returnedEventName);

                        $("#eventDate").val('');
                        $("#eventDate").val(obj.returnedEventData);

                        $("#eventLinkCharacter").val('');
                        $("#eventLinkCharacter").val(obj.returnedEventLinkCharacter);

                        $("#eventKingdom").val('');
                        $("#eventKingdom").val(obj.returnedEventKingdom);

                        $("#eventDescription").val('');
                        $("#eventDescription").val(obj.returnedEventDescription);
                    }
                }

                catch(err) {
                    alert("No Event With that name " + Event + " found.");
                }
            }

        });

        return false;
    }


}
