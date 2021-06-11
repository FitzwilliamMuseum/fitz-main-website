<div class="container">
  <h3 class="lead">Audio description</h3>

  <div class="col-12 shadow-sm p-3 mx-auto mb-3">
    <div class="shadow-sm p-3 mx-auto mb-3">
      <div class="plyr">
        <div class="embed-responsive audio-player">
          <audio id="player" controls class="embed-responsive-item">
            <source src="{{ $record['audio_guide']['data']['full_url'] }}" type="audio/aac">
            </audio>
          </div>
        </div>
      </div>

    </div>
  </div>
