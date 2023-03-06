<?php include "partial/head.php";?>
<title>SAS - Dashboard</title>
  <body>


  <?php include "partial/navbar.php";?>
  <?php include "partial/sidebar.php";?>
  

        <section class="home-section mx-3 bg-light rounded shadow">
        <div class="card";>
             <div class="card-body">
           <div id="Mv">
            <div class="right shadow">
              <h3 id="h3_right"> Mission </h3>
              <p> “To produce self-motivated and self-directed individual who aims for 
                academic excellence, God-fearing, peaceful, wealthy, productive and successful citizens”<br> <br></p> 
            </div> 
            <div class="left shadow"> 
            <h3 id="h3_left"> Vision </h3>
              <p> ”Bestlink College of the Philippines is committed to provide and promote quality education, with a unique, m
                odern and researched-based curriculum with delivery systems geared towards excellence”</p>
            </div>
          </div>



          <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-4">
    <div class="row me-3"  id="announcements">
      <h6 id="fontDiv">ANNOUNCEMENTS</h6>
      <br>
      <cite contenteditable="true" id="cite"> Your announcement goes here</cite>
    </div>

                    </div><!-- End Left side columns -->

                    <!-- Right side columns -->
                    <div class="col-lg-8 shadow p-2">
                    <div class="row">

                                  
                                  <!-- // calendar -->
                                  <script>

                                    document.addEventListener('DOMContentLoaded', function() {
                      var calendarEl = document.getElementById('calendar');

                      var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        height: 650,
                        events: 'assets/php/fetchEvents.php',
                        
                        selectable: true,
                        select: async function (start, end, allDay) {
                          const { value: formValues } = await Swal.fire({
                            title: 'Add Event',
                            confirmButtonText: 'Submit',
                            showCloseButton: true,
                            showCancelButton: true,
                            html:
                              '<input id="swalEvtTitle" class="swal2-input" placeholder="Enter title">' +
                              '<input type="time" id="swalEvtTime" class="swal2-input" placeholder="Enter Time">' +
                              '<textarea id="swalEvtDesc" class="swal2-input" placeholder="Enter description"></textarea>',
                            focusConfirm: false,
                            preConfirm: () => {
                              return [
                                document.getElementById('swalEvtTitle').value,
                                document.getElementById('swalEvtTime').value,
                                document.getElementById('swalEvtDesc').value,
                              ]
                            }
                          });

                          if (formValues) {
                            // Add event
                            fetch("assets/php/eventHandler.php", {
                              method: "POST",
                              headers: { "Content-Type": "application/json" },
                              body: JSON.stringify({ request_type:'addEvent', start:start.startStr, end:start.endStr, event_data: formValues}),
                            })
                            .then(response => response.json())
                            .then(data => {
                              if (data.status == 1) {
                                Swal.fire('Event added successfully!', '', 'success');
                              } else {
                                Swal.fire(data.error, '', 'error');
                              }

                              // Refetch events from all sources and rerender
                              calendar.refetchEvents();
                            })
                            .catch(console.error);
                          }
                        },

                        eventClick: function(info) {
                          info.jsEvent.preventDefault();
                          
                          // change the border color
                          info.el.style.borderColor = 'red';


                          // info.remove();
                          
                          Swal.fire({
                            title: info.event.title,
                            icon: 'info',
                            html:'<p>'+info.event.extendedProps.time+'</p><p>'+info.event.extendedProps.description+'</p>',
                            showCloseButton: false,
                            showCancelButton: true,
                            showDenyButton: false,
                            cancelButtonText: 'Close',
                            confirmButtonText: 'Delete',
                            denyButtonText:'Edit',
                          }).then((result) => {
                            

                            if (result.value) {
                              // Delete event
                              console.log('deleted')

                              info.el.remove();

                              fetch("assets/php/eventHandler.php", {
                                method: "POST",
                                headers: { "Content-Type": "application/json" },
                                body: JSON.stringify({ request_type:'deleteEvent', event_id: info.event.id}),
                              })
                              .then(response => response.json())
                              .then(data => {
                                if (data.status == 1) {
                                  Swal.fire('Event deleted successfully!', '', 'success');
                                } else {
                                  Swal.fire(data.error, '', 'error');
                                }

                                // Refetch events from all sources and rerender
                                calendar.refetchEvents();
                              })
                              .catch(console.error);
                            } else if (result.isDenied) {
                              // Edit and update event
                              Swal.fire({
                                title: 'Edit Event',
                                html:
                                  '<input id="swalEvtTitle_edit" class="swal2-input" placeholder="Enter title" value="'+info.event.title+'">' +
                                  '<textarea id="swalEvtDesc_edit" class="swal2-input" placeholder="Enter description">'+info.event.extendedProps.description+'</textarea>' +
                                  '<input id="swalEvtURL_edit" class="swal2-input" placeholder="Enter URL" value="'+info.event.url+'">',
                                focusConfirm: false,
                                confirmButtonText: 'Submit',
                                preConfirm: () => {
                                return [
                                  document.getElementById('swalEvtTitle_edit').value,
                                  document.getElementById('swalEvtDesc_edit').value,
                                  document.getElementById('swalEvtURL_edit').value
                                ]
                                }
                              }).then((result) => {
                                if (result.value) {
                                  calendarEl.appendChild(info.el);
                                  // Edit event
                                  fetch("assets/php/eventHandler.php", {
                                    method: "POST",
                                    headers: { "Content-Type": "application/json" },
                                    body: JSON.stringify({ request_type:'editEvent', start:info.event.startStr, end:info.event.endStr, event_id: info.event.id, event_data: result.value})
                                  })
                                  .then(response => response.json())
                                  .then(data => {
                                    if (data.status == 1) {
                                      Swal.fire('Event updated successfully!', '', 'success');
                                    } else {
                                      Swal.fire(data.error, '', 'error');
                                    }

                                    // Refetch events from all sources and rerender
                                    calendar.refetchEvents();
                                  })
                                  .catch(console.error);
                                }
                              });
                            } else {
                              Swal.close();
                            }
                          });
                        }
                      });

                      calendar.render();
                    });

                    // document.addEventListener('DOMContentLoaded', function() {
                    //   var calendarEl = document.getElementById('calendar');

                    //   var calendar = new FullCalendar.Calendar(calendarEl, {
                    //       headerToolbar: {
                    //         left: 'today',
                    //         center: 'title',
                    //         right: 'prev,next'
                    //       },
                    //     initialView: 'dayGridMonth',
                    //       editable: true,
                    //       selectMirror: true,
                    //       selectable: true,
                    //       nowIndicator: true,
                    //     height: 600,
                    //     events: 'assets/php/fetchEvents.php',

                    //     eventClick: function(info) {
                    //       info.jsEvent.preventDefault();
                          
                    //       // change the border color
                    //       info.el.style.borderColor = '#7078f8';
                          
                    //       // show the event details
                    //       Swal.fire({
                    //         title: info.event.title,
                    //         icon: 'info',
                    //         html:'<p>'+info.event.extendedProps.time+'</p><p>'+info.event.extendedProps.description+'</p>',
                    //       });
                    //     }

                    //   });

                    //   calendar.render();
                    // });
                    </script>

                    <div class="container">
                      <div class="wrapper">
                      <div id="calendar"></div>
                      </div>
                    </div>



                        </div>
                    </div><!-- End Right side columns -->
                              </div>


                    



            </div>
          </div>
        </section>
      </div>
    </main>

   <?php include "partial/footer.php";?>





</html>
