<div class="container">
  <div class="card bg-dark mb-3 col-md-12" >
    <div class="row no-gutters">
      <div class="col-md-8">
        <div class="card-body">
          <h2 class="lead display-4">
            <span class="text-white">Free to visit</span>
            <br/>
            <span class="text-white">Booking essential</span>
          </h2>
          <a class="btn btn-info btn-large" href="https://tickets.museums.cam.ac.uk/overview/generaladmission">Book free entry now</a>
          <h3 class="text-white mt-3 lead">Booking and ticketing assistance</h3>
          <p class="text-white mt-3">
            For assistance with booking, or for ticket enquiries, please contact us.
              <br />
              Box office open 10:00 - 17:00 Tuesday - Saturday, 12:00 - 17:00 Sunday. Closed Monday.
              <br/>
              @fa('phone') +44 (0)1223 333 230 @fa('envelope') <a href="mailto:tickets@museums.cam.ac.uk" class="text-white">tickets@museums.cam.ac.uk</a>
          </p>
        </div>
      </div>
      <div class="col-md-4">
        <img src="https://content.fitz.ms/fitz-website/assets/img_20190105_153947.jpg?key=directus-medium-crop" class="card-img-top" width="369" height="369" alt="Human touch">
      </div>
    </div>
  </div>
</div>
@if(!empty($measures['data']))
<div class="container-fluid bg-gdbo py-3 ">
  <div class="container">
    <div class="col-md-12 p-3 bg-white">
    <h3 class="text-black mt-3 lead">{{ $measures['data'][0]['title']}}</h3>
    @markdown($measures['data'][0]['text'])
    </div>
  </div>
</div>
@endif
