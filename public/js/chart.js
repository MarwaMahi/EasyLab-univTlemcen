
$(function () {
    getMessage();
   getMessage1();
    getMessage2();
    getMessage3();

    function getMessage() {
        $.getJSON('charts', function(data) {
           
         //console.log(data);
            var dataPoints2 = [];
            var datasets = [];
            var date = [];
            var color = ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"];
            var i = 0;
            /*$.each(data, function(key, value) {
                color.push(dataset);
            });*/
            $.each(data, function(key, value) {
                if (key != 'date') {
                    dataPoints2.push(key);
                    var tmp = key;
                    var dataPoints = [];
                    $.each(value, function(key, value2) {
                        dataPoints.push(value2);
                    });
                    var dataset = {
                        label: tmp,
                        backgroundColor: color[i++],

                        data: dataPoints
                    }
                    datasets.push(dataset);
                } else {
                    $.each(value, function(key, value3) {
                        date.push(value3['annee']);
                    });

                }

            });

            //console.log(color);
            //console.log(dataPoints);
            new Chart(document.getElementById("bar-chart-grouped"), {


                type: 'bar',
                data: {
                    labels: date,
                    datasets: datasets
                },
                options: {
                    title: {
                        display: true,

                        text: ' Nombre des articles publiés par équipe '
                    },
                    animationEnabled: true,
                    exportEnabled: true,
                }
            });


        });


    }
       function getMessage1() {
        $.getJSON('charts1', function(data1) {
           
         //console.log(data);
            var dataPoints2 = [];
            var dataPoints = [];
            var datasets = [];
            var date = [];
            var color = ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"];
            var i = 0;
            /*$.each(data, function(key, value) {
                color.push(dataset);
            });*/
            $.each(data1, function(key, value) {
                $.each(value, function(key, value){
                    dataPoints2.push(value['nbProjet']);
                    
                        dataPoints.push(value['intitule']);
                        
                         date.push(value['annee']);
                    });

                 var dataset = {
                        label: dataPoints,
                        backgroundColor: color[i++],

                        data: dataPoints2
                    }
                    datasets.push(dataset);
                  

            });

            //console.log(color);
            //console.log(dataPoints);
            new Chart(document.getElementById("bar-chart-grouped2"), {


                type: 'bar',
                data: {
                labels: date,
               datasets: datasets
                },
                options: {
                    title: {
                        display: true,

                        text: ' Nombre des projets par équipe '
                    },
                    animationEnabled: true,
                    exportEnabled: true,
                }
            });


        });


    }
  /*  function getMessage1() { 
        $.getJSON('charts1', function(data1) {
           
         console.log(data1);
           
            var date = [];
            var type = [];
            var nbProjet = [];
            var color = ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"];
            var i = 0;
           
           $.each(data1, function(key, value) {
                $.each(value, function(key, value) {

                nbProjet.push(value['nbProjet']);
                type.push(value['intitule']);
                date.push(value['annee']);
                
                });
            });

           console.log(nbProjet);
           console.log(intitule);
           console.log(annee);

       new Chart(document.getElementById("bar-chart-grouped2"), {
    type: 'bar',
    data: {
      labels: ["1900", "1950", "1999", "2050"],
      datasets: [
        {
          label: "Africa",
          backgroundColor: "#3e95cd",
          data: [133,221,783,2478]
        }, {
          label: "Europe",
          backgroundColor: "#8e5ea2",
          data: [408,547,675,734]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Population growth (millions)'
      }
    }
});


        });


    }*/
 function getMessage2() {
        $.getJSON('charts2', function(data2) {
           
         //console.log(data2);
            var dataPoints2 = [];
            var datasets = [];
            var type = [];
            var cmp = [];
            
            var color = ["#3cba9f","#e8c3b9","#c45850","#558529","#2A2985"];
            var i = 0;
            $.each(data2, function(key, value) {
                $.each(value, function(key, value) {

                type.push(value['type']);
                cmp.push(value['cmp']);
                
                });
            });


            //console.log(type);
            //console.log(cmp);

            

new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: type,
      datasets: [{
       
        backgroundColor: ["#3cba9f","#e8c3b9","#c45850","#558529","#2A2985"],
        data: cmp
      }]
    },
    options: {
      title: {
        display: true,
        text: 'articles publiés'
      }
    }
});


        });
    }

    function getMessage3() {
        $.getJSON('charts3', function(data3) {
           
         console.log(data3);
            var dataPoints2 = [];
            var datasets = [];
            var intitule = [];
            var nbr = [];
           // var tmp = ["Poster", "Livre", "Article court", "Article long", "Publication(Revue)","Chapitre d un livre","Brevet"];
            var color = ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#558529","#2A2985"];
            var i = 0;
            $.each(data3, function(key, value) {
                $.each(value, function(key, value) {

                intitule.push(value['intitule']);
                nbr.push(value['nbr']);
                
                });
            });


            //console.log(intitule);
            //console.log(nbr);

            

new Chart(document.getElementById("pie-chart2"), {
    type: 'pie',
    data: {
      labels: intitule,
      datasets: [{
       
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: nbr
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Membres de laboratoire par équipe'
      }
    }
});


        });
    }
 
});/*

      function getMessage1() { 
        $.getJSON('charts1', function(data) {
           
         console.log(data);
            var dataPoints2 = [];
            var datasets = [];
            var date = [];
            var color = ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"];
            var i = 0;
            /*$.each(data, function(key, value) {
                color.push(dataset);
            });*/
       /*     $.each(data, function(key, value) {
                if (key != 'date') {
                    dataPoints2.push(key);
                    var tmp = key;
                    var dataPoints = [];
                    $.each(value, function(key, value2) {
                        dataPoints.push(value2);
                    });
                    var dataset = {
                        label: tmp,
                        backgroundColor: color[i++],

                        data: dataPoints
                    }
                    datasets.push(dataset);
                } else {
                    $.each(value, function(key, value3) {
                        date.push(value3['annee']);
                    });

                }

            });

            //console.log(color);
            //console.log(dataPoints);
            new Chart(document.getElementById("bar-chart-grouped2"), {


                type: 'bar',
                data: {
                    labels: date,
                    datasets: datasets
                },
                options: {
                    title: {
                        display: true,
                        text: 'Nombre des projets publiés par équipe'
                    },
                    animationEnabled: true,
                    exportEnabled: true,
                }
            });


        });


    }*/
       
   
