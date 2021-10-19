<div class="container-fluid steppe p-3">

</div>
<div class="container-fluid bg-black">
  <div class="text-center text-white p-3 ">
    <h2 class="display-3 text-white steppe-link">
      <a class="text-white" href="{{ route('exhibition', ['gold-of-the-great-steppe']) }}" title="Learn about the exhibition">Gold of the Great Steppe</a>
    </h2>
    <p><a class="btn btn-outline-light mt-1 mb-1" href="https://tickets.museums.cam.ac.uk/overview/goldofthegreatsteppe">Book your free tickets today</a>  
    <a class="btn btn-outline-light" href="https://tickets.museums.cam.ac.uk/donate/contribute1?ct=2">Become part of something special, join our Friends now</a>
  </div>
</div>
<style>
.steppe {
  min-height: 400px;
  background-color: black;
  background-image: url('https://fitz-cms-images.s3.eu-west-2.amazonaws.com/kazakh-knife-sheath.jpg');
  background-repeat:no-repeat;
  background-size:contain;
  background-position:center;
}
@media screen and (max-width: 440px) {
  .steppe {
    min-height: 200px;
  }
}
.steppe-link {
  border-bottom: 2px solid currentColor;
}
.steppe-link > a:hover {
  color: grey!important;
}
</style>
