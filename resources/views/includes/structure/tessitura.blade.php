<div class="col-12 shadow-sm p-3 mx-auto mb-3">
    <div class="text-center">
        <a title="Book tickets for this exhibition"
           href="https://tickets.museums.cam.ac.uk/overview/{{ $exhibition['tessitura_string'] }}"
           @isset($exhibition['button_class'])
               class="btn btn-lg btn-{{$exhibition['button_class']}} w-50"
           @else
               class="btn btn-lg btn-dark w-50"
            @endif
        >Book tickets</a>
    </div>
</div>
