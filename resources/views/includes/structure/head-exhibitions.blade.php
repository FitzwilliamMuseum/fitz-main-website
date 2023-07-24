<div class="head parallax">
    <div class="bg-overlay"></div>
    <div class="addon">
        <div class="wrapper">
            {{--
            "id" => 110
      "exhibition_narrative" => """
        Spanning almost 400 years, this display of prints and drawings explores some of the ways artists have responded to political violence and social injustice. Draw ▶

        The display asks us to think about how violence can be understood or appreciated through art. These artists bear witness to the collectivity of violence, but th ▶

        The display showcases a recent acquisition of 20 prints by contemporary artist, Marcelle Hanselaar, and is juxtaposed alongside other historic, modern, and cont ▶

        *Bearing Witness?* contains images of trauma, violence, and death.

        **Image: *Warring Couple* from the set *The Crying Game* by Marcelle Hanselaar, 2015. © MarcelleHanselaar**
        """
      "hero_image" => array:22 [▶]
      "hero_image_alt_text" => "Warring Couple, from the set The Crying Game, by Marcelle Hanselaar, 2015. ©MarcelleHanselaar"
      "exhibition_start_date" => "2023-01-10"
      "exhibition_end_date" => "2023-04-02"
      "meta_description" => "Display page for Bearing Witness? Violence and Trauma on Paper"
      "exhibition_title" => "Bearing Witness? Violence and Trauma on Paper"
 --}}
            <h1>{{ $exhibitions['data'][0]['exhibition_title'] }}</h1>
            <p>{{ $exhibitions['data'][0]['meta_description'] }}</p>
            <p>{{ $exhibitions['data'][0]['exhibition_start_date'] }} — {{ $exhibitions['data'][0]['exhibition_end_date'] }}</p>
        </div>
        <button>Book free tickets now</button>
    </div>
</div>

<style>
    .parallax {
        min-height: 83vh;
    }
    .bg-overlay {
        background-image: linear-gradient(to top, rgba(0,0,0, 1) 10%, transparent);
        width: 100%;
        height: 100%;
        position: absolute;
    }
    .addon {
        max-width: 1320px;
        padding: 0 16px 72px 16px;
        margin: 0 auto;
        width: 100%;
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        color: white;
        position: relative;
        z-index: 101;
    }
    .wrapper {
        width: 100%;
    }
    .wrapper h1 {
        color: #FFF;
        font-size: 80px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }
    .wrapper p {
        font-size: 24px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    .wrapper p:not(:last-of-type) {
        margin-bottom: 20px;
    }

    button {
        white-space: nowrap;
        font-size: 20px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        display: flex;
        padding: 16px;
        justify-content: flex-end;
        align-items: flex-start;
        background: white;
        color: #000;
        border: none;
        border-radius: 4px;
    }
</style>
