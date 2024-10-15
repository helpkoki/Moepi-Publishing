function test(e) {
  if (
    e.target.id === "popup" ||
    e.target.id === "start" ||
    e.target.id === "end" ||
    e.target.id === "fill" ||
    e.target.id === "filterValue"
  ) {
    //document.getElementById('popup').style.display="block";
  } else {
    document.getElementById("popup").style.display = "none";
  }
}

document.getElementById("page-top").addEventListener("click", test);

function redirect(status) {
  window.location.href = status;
}
function click() {}
console.log(calendar.getSelectedDate());

function openIncident(evt, type) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(type).style.display = "block";
  evt.currentTarget.className += " active";
}

//openIncident('PointerEvent', 'all')
// $("#all_clic").click();
document.getElementById("all_clic").click();
//document.getElementbyId('all_clic').onclick="";
function print() {
  $.ajax({
    url: "print.php",
    cache: false,
    success: function (html) {
      $("#print").html(html);
    },
  });
}

//Filtering by Company ID

function company() {
  fill();
}

//Filtering Data
function fill() {
  var company = document.getElementById("company").value;
  var id = document.getElementById("filterValue").value;
  //alert(company);
  if (id == 6) {
    /**
        const collection = document.getElementsByClassName("custome_b");
          for (let i = 0; i < collection.length; i++) {
                 collection[i].style.display = "block";
              } 
              
       **/
    document.getElementById("popup").style.display = "block";
  } else {
    document.getElementById("popup").style.display = "none";
    /**
       const collection = document.getElementsByClassName("custome_b");
          for (let i = 0; i < collection.length; i++) {
                 collection[i].style.display = "none";
        } 
        **/

    $.ajax({
      url: "filter_incidents.php",
      cache: false,
      data: { id: id, company: company },
      success: function (html) {
        $("#incident").html(html);
      },
    });

    $.ajax({
      url: "filter_types.php",
      cache: false,
      data: { id: id, company: company },
      success: function (html) {
        $("#display").html(html);
      },
    });

    $.ajax({
      url: "pie.php",
      type: "POST",
      data: "companyid=" + company,
      success: function (data) {
        $("#rePie").html(data);
      },
    });
  }
}
fill();
function getData() {
  var start = document.getElementById("start").value;
  var end = document.getElementById("end").value;
  var company = document.getElementById("company").value;

  if (start < end) {
    document.getElementById("start").style.border = "";
    document.getElementById("end").style.border = "";

    $.ajax({
      url: "between_incidents.php",
      cache: false,
      data: { start: start, end: end, company: company },
      success: function (html) {
        $("#incident").html(html);
      },
    });

    $.ajax({
      url: "between_types.php",
      cache: false,
      data: { start: start, end: end, company: company },
      success: function (html) {
        $("#display").html(html);
      },
    });
  } else {
    document.getElementById("start").style.border = "1px solid red";
    document.getElementById("end").style.border = "1px solid red";
  }
}









////



    function test(e) {
        if (e.target.id === "popup" || e.target.id === "start" || e.target.id === "end" || e.target.id === "fill" || e.target.id === "filterValue") {

            //document.getElementById('popup').style.display="block";
        }
        else {
            document.getElementById('popup').style.display = "none"
        }

    }

    document.getElementById("page-top").addEventListener("click", test);



    function redirect(status) {
        window.location.href = status;
    }
    function click() {
    } console.log(calendar.getSelectedDate());


    function openIncident(evt, type) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(type).style.display = "block";
        evt.currentTarget.className += " active";
    }

    //openIncident('PointerEvent', 'all')
    // $("#all_clic").click();
    document.getElementById("all_clic").click();
    //document.getElementbyId('all_clic').onclick="";
    function print() {
        $.ajax({
            url: "print.php",
            cache: false,
            success: function (html) {
                $("#print").html(html);
            },
        });
    }

    //Filtering by Company ID

    function company() {

        fill();
    }

    //Filtering Data
    function fill() {

        var company = document.getElementById('company').value
        var id = document.getElementById("filterValue").value;
        //alert(company);
        if (id == 6) {
            /**
             const collection = document.getElementsByClassName("custome_b");
               for (let i = 0; i < collection.length; i++) {
                      collection[i].style.display = "block";
                   } 
                   
            **/
            document.getElementById('popup').style.display = "block"



        }
        else {
            document.getElementById('popup').style.display = "none"
            /**
            const collection = document.getElementsByClassName("custome_b");
               for (let i = 0; i < collection.length; i++) {
                      collection[i].style.display = "none";
             } 
             **/


            $.ajax({
                url: "filter_incidents.php",
                cache: false,
                data: { id: id, company: company },
                success: function (html) {
                    $("#incident").html(html);
                },
            });


            $.ajax({
                url: "filter_types.php",
                cache: false,
                data: { id: id, company: company },
                success: function (html) {
                    $("#display").html(html);
                },
            });


            $.ajax({
                url: 'pie.php',
                type: "POST",
                data: 'companyid=' + company,
                success: function (data) {
                    $("#rePie").html(data);
                }
            });


        }

    }
    fill();
    function getData() {
        var start = document.getElementById("start").value;
        var end = document.getElementById("end").value;
        var company = document.getElementById('company').value

        if (start < end) {
            document.getElementById("start").style.border = "";
            document.getElementById("end").style.border = "";

            $.ajax({
                url: "between_incidents.php",
                cache: false,
                data: { start: start, end: end, company: company },
                success: function (html) {
                    $("#incident").html(html);
                },
            });

            $.ajax({
                url: "between_types.php",
                cache: false,
                data: { start: start, end: end, company: company },
                success: function (html) {
                    $("#display").html(html);
                },
            });

        }
        else {

            document.getElementById("start").style.border = "1px solid red";
            document.getElementById("end").style.border = "1px solid red";
        }

    }

    function view(id) {
        var x = document.getElementById(id);

        if (window.getComputedStyle(x).display === "none") {
            x.style.display = "block";
        }
        else {
            x.style.display = "none";
        }

    }

    function openSide() {
        document.getElementById("sideba").style.display = "block";
        document.getElementById("sidebarClose").style.display = "block";
        document.getElementById("sidebarToggleTop").style.display = "none";
    }

    function openClose() {
        document.getElementById("sideba").style.display = "none";
        document.getElementById("sidebarClose").style.display = "none";
        document.getElementById("sidebarToggleTop").style.display = "block";
    }

