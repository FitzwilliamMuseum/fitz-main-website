
    @if($page['slug'] === 'adult-programming')
      @inject('learningController', 'App\Http\Controllers\learningController')
      @php
      $sessions = $learningController::adultsessions();
      @endphp
      @include('includes.structure.adult')
    @endif

    @if($page['slug'] === 'school-sessions')
      @inject('learningController', 'App\Http\Controllers\learningController')
      @php
      $sessions = $learningController::schoolsessions();
      @endphp
      @include('includes.structure.sessions')
    @endif

    @if($page['slug'] === 'young-people')
      @inject('learningController', 'App\Http\Controllers\learningController')
      @php
      $sessions = $learningController::youngpeople();
      @endphp
      @include('includes.structure.young')
    @endif

    @if($page['slug'] === 'families')
      @inject('learningController', 'App\Http\Controllers\learningController')
      @php
      $sessions = $learningController::families();
      @endphp
      @include('includes.structure.families')
    @endif

    @if($page['slug'] === 'about-learning-research')
      @inject('learningController', 'App\Http\Controllers\learningController')
      @php
      $research = $learningController::research();
      @endphp
      @include('includes.structure.research')
    @endif
