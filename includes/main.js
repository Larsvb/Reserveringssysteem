function getName()
{
    let idTreatment = document.getElementById("treatments").value;

    if (idTreatment == "")
    {
        document.getElementById("workers").innerHTML = "kies een tijd hierboven :)";
        return;
    }
    else
    {
        if (window.XMLHttpRequest)
        {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else
        {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function()
        {
            if (this.readyState == 4 && this.status == 200)
            {
                document.getElementById("workers").innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET","includes/treatment-worker.php?q="+idTreatment,true);
        xmlhttp.send();

    }
}

let treatments = document.getElementById("treatments");
treatments.addEventListener("change", getName);
