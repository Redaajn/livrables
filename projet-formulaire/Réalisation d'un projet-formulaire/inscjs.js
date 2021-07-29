function ins(){
            var text=document.getElementById("nom").value;
            document.getElementById("p").innerHTML+="<b id=if>Nom:</b>&nbsp;"+text+"<br>";

            var text=document.getElementById("Prenom").value;
            document.getElementById("p").innerHTML+="<b id=if>Prénom:</b>&nbsp;"+text+"<br>";

            var text=document.getElementById("Adresse").value;
            document.getElementById("p").innerHTML+="<b id=if>Adresse:</b>&nbsp;"+text+"<br>";

            var text=document.getElementById("Telephone").value;
            document.getElementById("p").innerHTML+="<b id=if>Téléphone:</b>&nbsp;"+text+"<br>";

            var text=document.getElementById("Email").value;
            document.getElementById("p").innerHTML+="<b id=if>Email:</b>&nbsp;"+text+"<br><br>";
          

        }

