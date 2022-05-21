{{-- https://stackoverflow.com/a/44242233 --}}
<div class="text-center">
    <button type="button" class="btn btn-dark btn-circle btn-xl mb-5" data-bs-toggle="collapse"
            data-bs-target="#expand-more" aria-expanded="false" aria-controls="expand-more">
    <span class="collapsed">
      @svg('fas-plus',['width'=>'15'])
    </span>
        <span class="expanded">
      @svg('fas-minus', ['width'=>'15'])
    </span>
    </button>
</div>
