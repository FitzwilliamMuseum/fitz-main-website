<div class="container-fluid steppe p-3">

</div>
<div class="container-fluid bg-black">
  <div class="text-center text-white p-3 ">
    <h2 class="display-3 text-white steppe-link">
      <a class="text-white" href="{{ route('exhibition', ['gold-of-the-great-steppe']) }}" title="Learn about the exhibition">Gold of the Great Steppe</a>
    </h2>
    <a href="https://tickets.museums.cam.ac.uk/overview/goldofthegreatsteppe">Book your free tickets today</a>
    <a class="btn btn-outline-light" href="https://tickets.museums.cam.ac.uk/donate/contribute1?ct=2">Become part of something special, join our friends now</a>
  </div>
</div>
<style>
.steppe {
  min-height: 600px;
  background-image: url('https://fitz-cms-images.s3.eu-west-2.amazonaws.com/kazakh-compressed.jpg');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: 50% 50%;
}
.steppe-link {
  border-bottom: 2px solid currentColor;
}
.steppe-link > a:hover {
  color: grey!important;
}
</style>
