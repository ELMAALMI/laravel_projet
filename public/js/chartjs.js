/**
 * chiffre
 */
$.ajax(
    {
        type:'GET',
        url:urlchiffre,
        success:function(data)
        {
            var month  = [];
            var revenu = [];
            var json  = JSON.parse(data);
            for (let index = 0; index < json.length; index++)
            {
                month.push(json[index].month);
                revenu.push(json[index].nb);
            }
            console.log(month)
            new Chart(document.getElementById("line-chart"), {
                type: 'line',
                data: {
                  labels: month,
                  datasets: [{ 
                      data: revenu,
                      label: "Revunu",
                      borderColor: "#3e95cd",
                      fill: false
                    }
                  ]
                },
                
              });
        }
});
/*
DÉPENSES
*/
$.ajax(
    {
        type:'GET',
        url : urlrevenu 
        ,
        success:function(data)
        {
            var month  = [];
            var DÉPENSES  = [];
            var json  = JSON.parse(data);
            for (let index = 0; index < json.length; index++)
            {
                month.push(json[index].month);
                DÉPENSES.push(json[index].nb);
            }
            console.log(month)
            new Chart(document.getElementById("line-revenu"), {
                type: 'line',
                data: {
                  labels: month,
                  datasets: [{ 
                      data: DÉPENSES ,
                      label: "DÉPENSES ",
                      borderColor: "#3e95cd",
                      fill: false
                    }
                  ]
                },
                
              });
        }
});

/**produit demande */
$.ajax(
{
    type:'GET',
    url:urlproduit,
    success:function(data)
    {
        var abel = [];
        var order = [];
        var json  = JSON.parse(data);
        for (let index = 0; index < json.length; index++)
        {
            abel.push("");
            order.push(json[index].nb);
        }
        console.log(order)
        new Chart(document.getElementById("bar-chart"),
        {
            type: 'bar',
            data: {
            labels: abel,
            datasets: [
                {
                label: "Produit",
                backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                data: order
                }
            ]
            },
            options: {
            legend: { display: false },
            title: {
                display: true,
                text: ''
            }
            }
        });
    }
});
/**
 * service
 */

$.ajax(
    {
        type:'GET',
        url:urlservice,
        success:function(data)
        {
            var service = [];
            var demande = [];
            var json  = JSON.parse(data);
            for (let index = 0; index < json.length; index++)
            {
                service.push(json[index].nom);
                demande.push(json[index].nb);
            }
            console.log(service)
            console.log(demande)
            new Chart(document.getElementById("pie-chart"), {
                type: 'pie',
                data: {
                  labels: service,
                  datasets: [{
                    label: "",
                    backgroundColor: ["#3e95cd", "#8e5ea2"],
                    data: demande
                  }]
                },
            });
        }
    });
