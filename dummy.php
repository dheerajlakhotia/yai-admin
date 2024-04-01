   <!-- contact approval -->

   <div class="container mt-5">
       <h2>Contact</h2>

       <table class="table table-bordered mt-4">
           <thead>
               <tr>
                   <th scope="col">S.No.</th>
                   <th scope="col">Name</th>
                   <th scope="col">Actions</th>
               </tr>
           </thead>
           <tbody>
               <!-- Sample data; replace with dynamic data from your backend -->
               <tr>
                   <th scope="row">1</th>
                   <td>John Doe</td>
                   <td>
                       <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                           data-bs-target="#ContactModal">
                           See Massage <i class="bi bi-primery"></i>
                       </button>
                   </td>
               </tr>
               <tr>
                   <th scope="row">2</th>
                   <td>Jane Doe</td>
                   <td>
                       <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                           data-bs-target="#ContactModal">
                           See Massage <i class="bi bi-primery"></i>
                       </button>


                   </td>
               </tr>
           </tbody>
       </table>

   </div>
   <!-- Modal -->
   <div class="modal fade" id="ContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Massage</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <p><strong>Subject:</strong> Lorem ipsum dolor sit amet consectetur adipisicing
                       elit. Velit, unde.</p>
                   <p><strong>Massage:</strong> Lorem ipsum dolor sit amet consectetur adipisicing
                       elit.
                       Necessitatibus, magnam deleniti. Nam iure dignissimos ea culpa inventore eos
                       perspiciatis aperiam aut iste quidem nulla illum deleniti, ratione quisquam,
                       similique at dicta obcaecati, suscipit fuga praesentium architecto libero? Quas
                       tempora nulla architecto voluptatibus veniam earum, porro molestias amet
                       delectus maxime explicabo.</p>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
           </div>
       </div>
   </div>