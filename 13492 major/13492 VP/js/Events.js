// chatbot.js

// Function to toggle the chatbox visibility
function toggleChatbox() {
  var chatBox = document.getElementById('chatBox');
  chatBox.style.display = chatBox.style.display === 'none' ? 'block' : 'none';
}

// Function to send a message
function sendMessage() {
  var userInput = document.getElementById('userInput').value;
  var chatBoxContent = document.getElementById('chatBoxContent');
  chatBoxContent.innerHTML += '<div class="message-container"><div class="user-message">' + userInput + '</div></div>';
  document.getElementById('userInput').value = '';
  chatBoxContent.innerHTML += '<div class="message-container"><div class="bot-message">Hello! Please stay connected. I will be available to assist you soon.</div></div>';
  chatBoxContent.scrollTop = chatBoxContent.scrollHeight; // Auto-scroll to bottom
}
  // Add click event listeners to dropdown buttons
  var dropdownBtns = document.getElementsByClassName("dropdown-btn");

  for (var i = 0; i < dropdownBtns.length; i++) {
    dropdownBtns[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
      } else {
        dropdownContent.style.display = "block";
      }
    });
  }
  //toggle function when i click on table so then the different table open
  function toggleTable(className) {
    var tables = document.getElementsByClassName("time_table_container");
    for (var i = 0; i < tables.length; i++) {
      tables[i].classList.remove("active");
    }
    document.getElementById(className).classList.add("active");
    
    var heads = document.getElementsByClassName("tt_head");
    for (var i = 0; i < heads.length; i++) {
      heads[i].classList.remove("active");
    }
    event.currentTarget.classList.add("active");
}

// bright change 
const but = document.getElementById('but');
const dashBack = document.getElementById('dash_back');

// Function to toggle brightness of the body
function toggleBrightness() {
    let currBrightness = localStorage.getItem('brightness') || "bright";

    if (currBrightness === "bright") {
        currBrightness = "dim";
    } else {
        currBrightness = "bright";
    }

    document.body.classList.toggle("dim", currBrightness === "dim");
    document.body.classList.toggle("bright", currBrightness === "bright");

    // Update localStorage with the current brightness
    localStorage.setItem('brightness', currBrightness);
}

but.addEventListener("click", toggleBrightness);

// Function to update dash_back height on window resize
function updateDashBackHeight() {
    dashBack.style.height = `${window.innerHeight}px`;
};

// Update dash_back height on page load
window.addEventListener("load", updateDashBackHeight);

// Update dash_back height on window resize
window.addEventListener("resize", updateDashBackHeight);

// On page load, apply the brightness mode stored in localStorage
window.addEventListener("load", function() {
    const savedBrightness = localStorage.getItem('brightness');
    if (savedBrightness) {
        document.body.classList.toggle("dim", savedBrightness === "dim");
        document.body.classList.toggle("bright", savedBrightness === "bright");
    }
});

// print time table 

    // Get all elements with class 'printButton' and attach click event listener
    var printButtons = document.querySelectorAll('.printButton');
    printButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var container = this.closest('.time_table_container');
            console.log("Container:", container);
            var table = container.querySelector('table');
            console.log("Table:", table);
            printTableData(table);
        });
    });

    function printTableData(table) {
        var newWin = window.open("");
        newWin.document.write("<html><head><title>Print</title>");
        newWin.document.write("<style>table, th, td { border: 1px solid black; border-collapse: collapse; padding: 8px; text-align: left; }</style>");
        newWin.document.write("</head><body>");
        newWin.document.write("<h2>Time Table</h2>");
        newWin.document.write("<table>");
        newWin.document.write("<thead>");
        newWin.document.write("<tr>");
        
        // Print table headers excluding "Edit & Delete" column
        var headers = table.querySelectorAll("thead th:not(:last-child)");
        headers.forEach(function(header) {
            newWin.document.write("<th>" + header.textContent + "</th>");
        });
        
        newWin.document.write("</tr>");
        newWin.document.write("</thead>");
        newWin.document.write("<tbody>");

        // Print table data excluding "Edit & Delete" column
        var rows = table.querySelectorAll("tbody tr");
        rows.forEach(function(row) {
            newWin.document.write("<tr>");
            var cells = row.querySelectorAll("td:not(:last-child)");
            cells.forEach(function(cell) {
                newWin.document.write("<td>" + cell.textContent + "</td>");
            });
            newWin.document.write("</tr>");
        });
        
        newWin.document.write("</tbody>");
        newWin.document.write("</table>");
        newWin.document.write("</body></html>");
        newWin.document.close();
        newWin.print();
    }

// print Result of students

    document.getElementById('print').addEventListener('click', function() {
        printData();
    });

    function printData() {
        var table = document.getElementById('dataTable');
        var html = table.outerHTML;
        var printWindow = window.open('', 'Results');
        printWindow.document.open();
        printWindow.document.write('<html><head><title>Student Results</title>');
        printWindow.document.write('<style>table, th, td { border: 1px solid black; border-collapse: collapse; padding: 8px; text-align: left; } @media print { .no-print { display: none; } }</style>');
        printWindow.document.write('</head><body>' + html + '</body></html>');
        printWindow.document.close();
        printWindow.print();
    }











